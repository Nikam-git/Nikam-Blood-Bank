<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodReq;
use App\Models\Bloodstocks;
use App\Models\Company_Donation;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Models\Donors;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function loginpage(){
        return view('admin.pages.login')->with(['title'=>'BloodBank | Admin Login']);
    }
    public function dash(){
        $donors = Donors::orderBy('created_at','ASC')->get();
        $breqs = BloodReq::orderBy('created_at','ASC')->get();
        $bstocks = Bloodstocks::orderBy('created_at','ASC')->get();
        return view('admin.pages.dash')->with(['title'=>'BloodBank Admin| Dashboard','donors'=>$donors,'breqs'=>$breqs,'bstocks'=>$bstocks]);
    }
    public function donorspage(){
        $donors = Donors::with(['user', 'receiver'])->orderBy('created_at','ASC')->get();
        return view('admin.pages.donors')->with(['title'=>'BloodBank Admin | Donors List', 'donors'=>$donors]);
    }
    public function bloodreqpage(){
        $breqs = BloodReq::orderBy('created_at','ASC')->get();
        return view('admin.pages.bloodreq')->with(['title'=>'BloodBank Admin| Blood Request List','breqs'=>$breqs]);
    }
    public function approveBloodreq($id){
        $breq = BloodReq::findOrFail($id);
        $breq->is_approved = "True";
        $breq->save();
        return redirect()->route('admin.bloodrequestspage')->with('Success','You have approved the blood request');
    }
    public function cancelBloodreq($id){
        $breq = BloodReq::findOrFail($id);
        $breq->delete() ;
        return redirect()->route('admin.bloodrequestspage')->with('Success','The request has been is disapproved');
    }
    public function dorequestpage(){
        // return view('admin.page.')->with();
    }
    public function bloodstockspage(){
        $bstocks = Bloodstocks::orderBy('created_at','ASC')->get();
        $cds = Company_Donation::orderBy('created_at','ASC')->get();
        return view('admin.pages.bloodstock')->with(['title'=>'BloodBank Admin| Blood Stock','bstocks'=>$bstocks,'companydonations'=>$cds]);
    }
    public function addBloodstockpage(){
        return view('admin.pages.addBlood')->with(['title'=>'BloodBank Admin| Add blood stock']);
    }

    public function addBloodstock(Request $request){
        $validator = Validator::make($request->all(), [
            'bloodgroup' => 'required',
            'amountofblood' => 'required|numeric|min:1'
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.addbloodpage')->withInput()->withErrors($validator);
        }
        $group = strtolower(str_replace('+','plus', str_replace('-','minus', $request->bloodgroup)));
        $field = 'bloodgroup' . ucfirst($group);
        $bstock = Bloodstocks::first();
        if (!$bstock) {
            $bstock = new Bloodstocks();
            foreach ($bstock->getFillable() as $col) {
                $bstock->$col = 0;
            }
        }
        if (in_array($field, $bstock->getFillable())) {
            $bstock->$field += $request->amountofblood;
        }
        $bstock->save();
        return redirect()->route('admin.addbloodpage')->with('Success', 'Blood successfully added to the stocklist');
    }

    public function eventspage(){
        $events = Events::orderBy('created_at','ASC')->get();
        return view('admin.pages.events')->with(['title'=>'BloodBank Admin| events','events'=>$events]);
    }
    public function addEventpage(){
        return view('admin.pages.addevent')->with('BloodBank Admin| add event');
    }
    public function approveevent($id){
        $event = Events::findOrFail($id);
        $event->is_approved = "True";
        $event->save();
        return redirect()->route('admin.eventlists')->with('Success','Event has been approved');
    }
    public function cancelevent($id){
        $event = Events::findOrFail($id);
        File::delete(public_path('uploads/events'.$event->image));
        $event->delete();
        return redirect()->route('admin.lists')->with('Success','Your applied event post is cancelled successfully');
    }
    public function addEvent(Request $request){
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
            $event->is_approved = "True";
            $event->status = "Pending";
            $event->user_id = Auth::guard('admin')->user()->id;
            $event->save();
            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time().'-'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/events'));
                $event->image = $imageName;
                $event->save();
            }
            return redirect()->route('admin.eventlists')->with('Success','Event Apply successful please wait for admin approval');

        }else{
            return redirect()->route('admin.addEventpage')->withInput()->withErrors($validator);
        }
    }
}
