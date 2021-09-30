<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pagesController extends Controller
{
    public function requestaccount(){
        $data = DB::table('plans')->get();
        return view('request-account',compact('data'));
    }
    public function requestUser(Request $request){
        $request->validate([
            'name' =>['required'],
            'email' =>['required','string','email','max:255','unique:requested_users'],
            'phone' =>['required'],
            'organization' =>['required'],
            'address' =>['required'],
            'upzila' =>['required'],
            'district' =>['required'],
            'zipcode' =>['required'],
            'plans' =>['required'],
            'password' =>['required'],
        ]);
        $data['u_name'] = $request->name;
        $data['email'] = $request->email;
        $data['u_phone'] = $request->phone;
        $data['u_organization'] = $request->organization;
        $data['u_address'] = $request->address;
        $data['u_thana'] = $request->upzila;
        $data['u_zila'] = $request->district;
        $data['u_zip'] = $request->zipcode;
        $data['u_plan'] = $request->plans;
        $data['password'] = $request->password;
        $data['referral_code'] = $request->refarence_code;
        //return response()->json($data);


        $check = DB::table('requested_users')->insert($data);
        if ($check){
            return view('thankyou');
        }else{
            return back()->with('message','Email All Ready Used');
        }

    }
    public function thankyou(){
        return view('thankyou');
    }
}
