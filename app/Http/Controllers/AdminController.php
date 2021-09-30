<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index(){
        return view('auth.dashboards.admins.index');
    }
    function group(){
        $data = DB::table('users')->where('role','=',2)->get();
        return view('auth.dashboards.admins.group',compact('data'));
    }

    function AddMEdicine(){
        $menufac = DB::table('manufacturer')->get();
        $generic  = DB::table('generic')->get();
        return view('auth.dashboards.admins.add_medicine',compact('menufac','generic'));
    }
    public function medicineInsert(Request $request){
        $data['brand_name'] = $request->brand_name;
        $data['retail_price'] =  $request->retail_price;
        $data['strength'] =  $request->strength;
        $data['pack_size'] =  $request->pack_size;
        $data['generic_name'] =  $request->generic;
        $data['manufacturer'] =  $request->manufacturer;
        $data['doses_description'] =  $request->doses;
        $data['created_by'] = Auth::user()->name;
        $result = DB::table('medicine')->insert($data);
        if ($result){
            $noti = array(
                'message'=>'Medicine Successfully Added',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($noti);
        }
    }
    public function medicineList(){
        $medicine = DB::table('medicine')
            ->join('manufacturer','medicine.manufacturer','manufacturer.id')
            ->join('generic','medicine.generic_name','generic.id')
            ->select('medicine.*','manufacturer.manu_name','generic.gname','medicine.id as medi_id')
            ->get();

        return view('auth.dashboards.admins.medicine_list',compact('medicine'));
    }
    function medicine_edit($id){
        $edit_medicine = DB::table('medicine')
            ->where('medicine.id',$id)
            ->join('manufacturer','medicine.manufacturer','manufacturer.id')
            ->join('generic','medicine.generic_name','generic.id')
            ->select('medicine.*','manufacturer.manu_name','manufacturer.id as manu_id','generic.generic_name','generic.id as gene_id','medicine.id as medi_id')
            ->first();
        $menufac = DB::table('manufacturer')->get();
        $generic  = DB::table('generic')->get();
        //return response()->json($edit_medicine);,'manufacturer.manu_name'
        return view('auth.dashboards.admins.edit_medicine',compact('edit_medicine','menufac','generic'));
    }
    public function medicineUpdate(Request $request){
        $data['brand_name'] = $request->brand_name;
        $data['retail_price'] =  $request->retail_price;
        $data['strength'] =  $request->strength;
        $data['pack_size'] =  $request->pack_size;
        $data['generic_name'] =  $request->generic;
        $data['manufacturer'] =  $request->manufacturer;
        $data['created_by'] = Auth::user()->name;
        $result = DB::table('medicine')->where('id',$request->medi_id)->update($data);
        if ($result){
            $noti = array(
                'message'=>'Medicine Successfully Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('medicineList')->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->route('medicineList')->with($noti);
        }
    }
    public function medicinedelete($medi_id){
        $result = DB::table('medicine')->where('id',$medi_id)->delete();
        if ($result){
            $noti = array(
                'message'=>'Medicine Successfully Deleted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($noti);
        }
    }
    public function requestMedi(){
        $request_medi = DB::table('requestmedi')
            ->where('status','=',0)
            ->get();
        return view('auth.dashboards.admins.request-medicine',compact('request_medi'));
    }

    public function addMediActive($id){
        $data['status'] = 1;
        $result  = DB::table('requestmedi')->where('id','=',$id)->update($data);
        if ($result){
            $noti = array(
                'message'=>'Medicine Successfully Added',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($noti);
        }

    }
    //medicine crud end

    //manufacturer Part
    function addMenufactur(){
        $menufac = DB::table('manufacturer')->get();
        return view('auth.dashboards.admins.add_menufactur',compact('menufac'));
    }

    public function InsertMenuf(Request $request){
        $data['manu_name'] = $request->menufactur;
        $data['address'] = $request->menufacturAddress;
        $data['mobile'] = $request->mobile;
        $data['created_by'] = Auth::user()->name;
        $result = DB::table('manufacturer')->insert($data);
        if ($result){
            $noti = array(
                'message'=>'manufacturer Successfully Added',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($noti);
        }
    }

//generic Part
    public function generic(){
        $generic  = DB::table('generic')->get();
        return view('auth.dashboards.admins.generic',compact('generic'));
    }

    public function InsertGeneric(Request $request){
        $data['gname'] = $request->generic;
        $data['created_by'] = Auth::user()->name;
        $result = DB::table('generic')->insert($data);
        if ($result){
            $noti = array(
                'message'=>'Generic Successfully Added',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($noti);
        }
    }

//user crud start
    public function user_add(){
        return view('auth.dashboards.admins.add_user');
    }
    public function userInsert(Request $request){
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = \Hash::make($request->password);
        $data['make_pass'] = $request->password;
        $data['organization'] = $request->organization;
        $data['address'] = $request->address;
        $data['thana'] = $request->thana;
        $data['zila'] = $request->zila;
        $data['zip'] = $request->zip_code;
        $data['role'] = $request->role;
        $result = DB::table('users')->insert($data);
        if ($result){
            $noti = array(
                'message'=>'User Successfully Added',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($noti);
        }

    }
    public function user_manage(){
        $user = DB::table('users')->where('role','=',2)->get();
        return view('auth.dashboards.admins.user_list',compact('user'));
    }
    public function ruser_manage(){
        $requested_users  = DB::table('requested_users')->get();
        return view('auth.dashboards.admins.requested_user',compact('requested_users'));
    }
    public function user_edit($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view('auth.dashboards.admins.user_edit',compact('user'));
    }
    public function user_update(Request $request){
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['organization'] = $request->organization;
        $data['address'] = $request->address;
        $data['thana'] = $request->thana;
        $data['zila'] = $request->zila;
        $data['zip'] = $request->zip_code;

        $result = DB::table('users')->where('id', $request->id)->update($data);
        if ($result){
            $noti = array(
                'message'=>'User Successfully Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('user.manage')->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->route('user.manage')->with($noti);
        }
    }

    public function user_delete($id){
        $result = DB::table('users')->where('id',$id)->delete();
        if ($result){
            $noti = array(
                'message'=>'User Successfully Deleted',
                'alert-type'=>'success'
            );
            return redirect()->route('user.manage')->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->route('user.manage')->with($noti);
        }
    }
    public function Ruser_delete($id){
        $result = DB::table('requested_users')->where('id',$id)->delete();
       DB::table('users')->where('request_id',$id)->delete();
        if ($result){
            $noti = array(
                'message'=>'User Successfully Deleted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($noti);
        }
    }
    public function user_active($id){
        $details = DB::table('requested_users')->where('id',$id)->first();
       // return response()->json($details);
        $dataaa['status'] = 1;
        DB::table('requested_users')->where('id',$id)->update($dataaa);
        $data['name'] = $details->u_name;
        $data['email'] = $details->email;
        $data['phone'] = $details->u_phone;
        $data['password'] = \Hash::make($details->password);
        $data['make_pass'] = $details->password;
        $data['organization'] = $details->u_organization;
        $data['address'] = $details->u_address;
        $data['thana'] = $details->u_thana;
        $data['zila'] = $details->u_zila;
        $data['zip'] = $details->u_zip;
        $data['plan'] = $details->u_plan;
        $data['request_id'] = $details->id;
        $data['referral_code'] = $details->referral_code;
        $data['role'] = 2;
        DB::table('users')->insert($data);
        return redirect()->back();
    }
    public function user_ban($id){
        $details = DB::table('requested_users')->where('id',$id)->first();
       // return response()->json($details);
        $dataaa['status'] = 0;
        DB::table('requested_users')->where('id',$id)->update($dataaa);
        $plan['plan']= 0;
        $plan['email']= 'blank';
        DB::table('users')->where('request_id',$id)->update($plan);
        return redirect()->back();
    }

    //user crud end


    // preparation crud start
    public function preparation(){
        $preparation = DB::table('preparation')->get();
        return view('auth.dashboards.admins.preparation',compact('preparation'));
    }
    public function InsertPreparation(Request $request){
        $data['prepa_name']= $request->preparation;
        $result = DB::table('preparation')->insert($data);
        if ($result){
            $noti = array(
                'message'=>'Preparation Successfully Deleted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($noti);
        }
    }

    public function user_view($id){
        return view('auth.dashboards.admins.user_view');
    }
    // preparation crud end

    public function userlist(){
        $data = DB::table('users')
            ->where('role',2)
            ->get();

        return view('auth.dashboards.admins.message-list',compact('data'));
    }
    public function usermessage($id){
//        $data = DB::table('messages')
//            ->where('user_id',$id)
//            ->get();

        $data = DB::table('messages')
            ->where('from_id',$id)
            ->orWhere('to_id',$id)
            ->get();

        return view('auth.dashboards.admins.message-area',compact('data'));

    }

    public function message(Request $request){
        $data = array();
        $messages = $request->messages;
        $user_id = \auth()->user()->id;
        $data['from_id'] = $user_id;
        $data['message'] = $messages;
        $data['to_id'] = $request->userid;
        $data['user_id'] = $request->userid;
        $data['admin_id'] = $user_id;

        $result = DB::table('messages')->insert($data);
        return json_encode(array('data'=>$data));
    }
    public function get_messages(Request $request){
        $result = DB::table('messages')
            ->where('from_id',$request->userid)
            ->orWhere('to_id',$request->userid)
            ->get();


        //return response()->json($result);
        return json_encode(array('data'=>$result));
    }

    public function payments(){
        $result = DB::table('payments')
            ->join('users','payments.user_id','users.id')
            ->select('payments.*','users.name')
            ->get();

        return view('auth.dashboards.admins.payments',compact('result'));
    }
}
