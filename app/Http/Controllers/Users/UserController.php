<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\BloodReq;
use App\Models\Bloodstocks;
use App\Models\Company_Donation;
use App\Models\Events;
use App\Models\Joined_events;
use Auth;
use Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Donors;
use App\Models\User;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{
    //page directions
    public function homepage(){
        return view("users.pages.home")->with(['title'=>'BloodBank | home']);
    }
    public function aboutuspage(){
        return view('users.pages.aboutus')->with(['title'=>'BloodBank | About']);
    }
    public function contactuspage(){
        return view('users.pages.contactus')->with(['title'=>'BloodBank | Contact Us']);
    }
    public function loginpage(){
        return view('users.pages.login') ->with(['title'=>'BloodBank | Login Page']);
    }
    public function registerpage(){
        return view('users.pages.register')->with(['title'=>'BloodBank | Register Page']);
    }
    public function dashboard(){
        $breqs = BloodReq::orderBy('created_at','ASC')->get();
        $events = Events::orderBy('created_at','ASC')->get();
        return view('users.Bpages.dash')->with(['title'=>'BloodBank | Dashboad','bloodRequests'=>$breqs,'events'=>$events]);
    }
    public function donorpage($id,$bloodgroup){
        $user = User::findOrFail($id);
        $email = Auth::user()->email;
        if($user->email == $email){
            return redirect()->route('account.peopleinneed')->with('error','You cannot donate blood to your own request');
        }
        return view('users.bpages.DonorReg')->with(['title'=>'BloodBank | Donor Registration for'.$user->name,'id'=>$user->id,'bloodgroup'=>$bloodgroup]);
    }
    public function requestbloodpage(){
        $pending = BloodReq::where('user_id',Auth::user()->id)->where('is_approved','False')->orderBy('created_at','ASC')->get();
        return view('users.Bpages.Breq')->with(['title'=>'BloodBank | Request blood','pendingRequests'=>$pending]);
    }
    public function donNeedpage(){
        $breqs = BloodReq::with('user')->where('amount','>',0)->orderBy('created_at','ASC')->get();
        return view('users.Bpages.DonationReq')->with(['title'=>'BloodBank | People in need','breqs'=>$breqs]);
    }
    public function bloodstockspage(){
        $bstocks = Bloodstocks::orderBy('created_at','ASC')->get();
        return view('users.bpages.bstock')->with(['title'=>'BloodBank | Blood stocks','bstocks'=>$bstocks]);
    }
    public function eventspage(){
        $events = Events::with('user')->orderBy('created_at', 'ASC')->get();
        $jevents = Joined_events::with('user', 'events')->where('user_id', Auth::id())->orderBy('created_at', 'ASC')->get();
        return view('users.bpages.Events')->with([
            'title' => 'BloodBank | Events',
            'events' => $events,
            'joinedevents' => $jevents
        ]);
    }
    public function profilepage(){
        $user = Auth::user();
        return view('users.bpages.profile')->with(['title'=>'BloodBank | '.$user->name,'user'=>$user]);
    }
    public function companydonatepage(){
        return view('users.bpages.cpnydonate')->with(['title'=>'BloodBank | Company Donate Form']);
    }
    public function addeventpage(){
        return view('users.bpages.addevent')->with(['title'=>'BloodBank | Apply for event']);
    }
    public function company_donation(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'bloodgroup' => 'required',
            'amountofblood' => 'required|numeric|min:1'
        ]);
        if ($validator->fails()) {
            return redirect()->route('account.companydonationpage')->withInput()->withErrors($validator);
        }
        $donor = new Company_Donation();
        $donor->name = $request->name;
        $donor->phone = $request->phone;
        $donor->address = $request->address;
        $donor->bloodgroup = $request->bloodgroup;
        $donor->amountofblood = $request->amountofblood;
        $donor->donor_id = Auth::user()->id;
        $donor->save();
        $group = str_replace(['+', '-'], ['plus', 'minus'], $request->bloodgroup);
        $field = 'bloodgroup' . $group;
        $stock = Bloodstocks::first();
        if (!$stock) {
            $stock = new Bloodstocks();
            foreach ($stock->getFillable() as $col) {
                $stock->$col = 0;
            }
        }
        if (in_array($field, $stock->getFillable())) {
            $stock->$field += $request->amountofblood;
        }

        $stock->save();

        return redirect()->route('account.companydonationpage')->with('Success', 'Donation successful.');
    }
    public function addevent(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'phone'=>'required',
            'start_date' =>'required',
            'end_date' => 'required',
            'address'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($validator->passes()){
            $event = new Events();
            $event->name = $request->name;
            $event->phone=$request->phone;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->address = $request->address;
            $event->totaldonor =0;
            $event->is_approved = "False";
            $event->status = "Pending";
            $event->user_id = Auth::user()->id;
            $event->save();
            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time().'-'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/events'));
                $event->image = $imageName;
                $event->save();
            }
            return redirect()->route('account.eventpage')->with('Success','Event Apply successful please wait for admin approval');

        }else{
            return redirect()->route('account.applyeventpage')->withInput()->withErrors($validator);
        }
    }
    public function donor_reg($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'bloodgroup' => 'required',
            'amountofblood' => 'required|numeric|min:0.1'
        ]);

        if ($validator->fails()) {
            return redirect()->route('account.donorpage', ['id' => $id,'bloodgroup'=>$request->bloodgroup])->withInput()->withErrors($validator);
        }

        $bloodReq = BloodReq::where('user_id', $id)->where('bloodgroup', $request->bloodgroup)->where('amount', '>', 0)->latest()->first();
        if ($bloodReq && $request->amountofblood > $bloodReq->amount) {
            return redirect()->route('account.donorpage', ['id' => $id,'bloodgroup'=>$request->bloodgroup])->withInput()->with('error','You cannot donate more than requested');
        }
        $donor = new Donors();
        $donor->name = $request->name;
        $donor->phone = $request->phone;
        $donor->address = $request->address;
        $donor->bloodgroup = $request->bloodgroup;
        $donor->amountofblood = $request->amountofblood;
        $donor->to_user_id = $id;
        $donor->donor_id = Auth::user()->id;
        $donor->save();
        if ($bloodReq) {
            $bloodReq->amount = max(0, $bloodReq->amount - $request->amountofblood);
            if ($bloodReq->amount == 0) {
                $bloodReq->status = 'Completed';
            }
            $bloodReq->save();
        }
        return redirect()->route('account.peopleinneed')->with('Success', 'Successfully registered, and blood stock updated.');
    }

    public function blood_req(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'phone'=>'required',
            'bloodgroup'=>'required',
            'date'=>'required',
            'message'=>'required',
            'amount'=>'required'
        ]);
        if(Auth::user()){
            if($validator->passes()){
                $breq = new BloodReq();
                $breq->email = $request->email;
                $breq->phone = $request->phone;
                $breq->bloodgroup = $request->bloodgroup ;
                $breq->date = $request->date;
                $breq->amount = $request->amount;
                $breq->message = $request->message;
                $breq->status = "Pending";
                $user = Auth::user();
                $breq->user_id = $user->id;
                $breq->is_approved = "False";
                $breq->save();
                return redirect()->route('account.bloodrequestpage')->with('Success','Blood Request has been uploaded');
            }
            return redirect()->route('account.bloodrequestpage')->withInput()->withErrors($validator);
        }else {
            return redirect()->route('account.bloodrequestpage')->with('error','You are not authenticated. Please login first!');
        }
    }
    public function cancelevent($id){
        $event = Events::findOrFail($id);
        File::delete(public_path('uploads/events'.$event->image));
        $event->delete();
        return redirect()->route('account.eventpage')->with('Success','Your applied event post is cancelled successfully');
    }
    public function joinevent($id){
        $joined= new Joined_events();
        $event = Events::findOrFail($id);
        if($event->user_id != Auth::user()->id){
            $alreadyJoined = Joined_events::where('event_id', $id)->where('user_id', Auth::id())->exists();
            if ($alreadyJoined) {
                return redirect()->route('account.eventpage')->with('error','You have already joined this event.');
            }
            $u_id = Auth::user()->id;
            $joined->event_id = $id;
            $joined->user_id = $u_id;
            $joined->save();
            return redirect()->route('account.eventpage')->with('Success','You haved joined the event');
        }else{
            return redirect()->route('account.eventpage')->with('error','You cannot join your own event.');
        }
    }
}
