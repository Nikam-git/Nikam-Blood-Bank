<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'email|required',
            'password'=>'required'
        ]);
        $user = User::where('email',$request->email)->first();
        if($validator->passes()){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->route('account.dashboard')->with('Success','Logged successfully! Welcome '.Auth::user()->name);
            }
            else{
                return redirect()->route('account.loginpage')->withInput()->with('error','Either email or password is wrong.');
            }
        }else {
            return redirect()->route('account.loginpage')->withInput()->withErrors($validator);
        }
    }
    public function register(Request $request){
        $validator =Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'address'=>'required',
            'phonenumber'=>'required|integer',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ]);
        if ($validator->passes()){
            $user= new User();
            $user->name = $request->name ;
            $user->email=$request->email;
            $user->phone_number = $request->phonenumber;
            $user->address = $request->address;
            $user->role='user';
            $user->password=Hash::make($request->password);
            $user->save();
            return redirect()->route('account.loginpage')->with('Success','You have registered successfully');

        }else{
            return redirect()->route('account.registerpage')->withInput()->withErrors($validator);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('account.loginpage')->with('Success');
    }
}
