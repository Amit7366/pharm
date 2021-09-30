<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cart;


class UserController extends Controller
{
    public function index(){
        $daily_data = array();
        $daily_data2 = array();
        $daily_data3 = array();
        $daily_data_Weekly = array();
        $daily_data_Last_Weekly = array();
        $tod = date('Y-m-d');
        $date = new DateTime($tod);
        $createDate = $date->modify("-1 day");
        // $createDate = $date;
        $strip = $createDate->format('Y-m-d');

        //daily data Start
        $drugs = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_date',$tod)
            ->select(DB::raw('(sales.medicine_id) as medic_id'),
                DB::raw('SUM(quantity*buying_price) as buying_price'))
            ->groupBy('medic_id')
            ->get();
        $count = 0;
        foreach ($drugs as $drugs){
            $count +=$drugs->buying_price;
        }
        $sales =DB::table('sales')
            ->where('medicine_id','=',NULL)
            ->where('user_id',auth()->user()->id)
            ->where('invoice_date',$tod)
            ->sum('amount_paid');
        $balance_due =DB::table('sales')
            ->where('user_id',auth()->user()->id)
            ->where('invoice_date',$tod)
            ->sum('balance_due');
        //daily data End

        //Yesterday data start
        $drugs_y = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_date',$strip)
            ->select(DB::raw('(sales.medicine_id) as medic_id'),
                DB::raw('SUM(quantity*buying_price) as buying_price'))
            ->groupBy('medic_id')
            ->get();
        $count_Y = 0;
        foreach ($drugs_y as $drugs_y){
            $count_Y +=$drugs_y->buying_price;
        }
        //return response()->json($count);

        $sales_Y =DB::table('sales')
            ->where('medicine_id','=',NULL)
            ->where('user_id',auth()->user()->id)
            ->where('invoice_date',$strip)
            ->sum('amount_paid');
       //return response()->json($sales_Y);

        $balance_due_Y =DB::table('sales')
            ->where('user_id',auth()->user()->id)
            ->where('invoice_date',$strip)
            ->sum('balance_due');
        //Yesterday data End


           //This weekly data

        $drugs_w_This = DB::table('sales')
            ->where('user_id',Auth::user()->id)
            ->whereBetween('invoice_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->select(DB::raw('(sales.medicine_id) as medic_id'),
                DB::raw('SUM(quantity*buying_price) as buying_price'))
            ->groupBy('medic_id')
            ->get();
        $count_w_This = 0;
        foreach ($drugs_w_This as $drugs_w_This){
            $count_w_This +=$drugs_w_This->buying_price;
        }
        $sales_W_This =DB::table('sales')
            ->where('medicine_id','=',NULL)
            ->where('user_id',auth()->user()->id)
            ->whereBetween('invoice_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('amount_paid');

       // return response()->json($start_week);

        $balance_due_W_This =DB::table('sales')
            ->where('user_id',auth()->user()->id)
            ->whereBetween('invoice_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('balance_due');

        $data_W = DB::table('sales')
            ->where('user_id',Auth::user()->id)
            ->whereBetween('invoice_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->where('medicine_id','=',NULL)
            ->select('invoice_date','amount_paid','customer_name as cname' )
            //->groupBy('date','customer_name','invoice_date')
            ->take(10)
            ->get();
        $this_week_name = array();
        foreach ($data_W as $daily_item4){
            array_push($daily_data_Weekly,$daily_item4->amount_paid);
        }
        foreach ($data_W as $daily_item5){
            array_push($this_week_name,$daily_item5->cname);
        }
       //This weekly data end

       //Last weekly data start
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last saturday midnight",$previous_week);
        $end_week = strtotime("next friday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);

        $drugs_w = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_date',array($start_week, $end_week))
            ->select(DB::raw('(sales.medicine_id) as medic_id'),
                DB::raw('SUM(quantity*buying_price) as buying_price'))
            ->groupBy('medic_id')
            ->get();
        $count_w = 0;
        foreach ($drugs_w as $drugs_w){
            $count_w +=$drugs_w->buying_price;
        }

        $sales_W =DB::table('sales')
            ->where('medicine_id','=',NULL)
            ->where('user_id',auth()->user()->id)
            ->whereBetween('invoice_date',array($start_week, $end_week))
            ->sum('amount_paid');
        //return response()->json($sales_W);

        $balance_due_W =DB::table('sales')
            ->where('user_id',auth()->user()->id)
            ->whereBetween('invoice_date',array($start_week, $end_week))
            ->sum('balance_due');
        //Last weekly data end

        //This month Data Start
        $drugs_M = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->whereMonth('invoice_date', Carbon::now()->month)
            ->select(DB::raw('(sales.medicine_id) as medic_id'),
                DB::raw('SUM(quantity*buying_price) as buying_price'))
            ->groupBy('medic_id')
            ->get();
        $count_M = 0;
        foreach ($drugs_M as $drugs_M){
            $count_M +=$drugs_M->buying_price;
        }
        $sales_M =DB::table('sales')
            ->where('medicine_id','=',NULL)
            ->where('user_id',auth()->user()->id)
            ->whereMonth('invoice_date', Carbon::now()->month)
            ->sum('amount_paid');
        //return response()->json($sales_M);
        $balance_due_M =DB::table('sales')
            ->where('user_id',auth()->user()->id)
            ->whereMonth('invoice_date', Carbon::now()->month)
            ->sum('balance_due');
        //This month Data End

        //Last monthly data start
        $tod = date("Y-m-d");
        $date = new DateTime($tod);
        $createDateM = $date->modify("-1 month");
        // $createDate = $date;
        $stripM = $createDateM->format('m');
        $drugs_M_L = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->whereMonth('invoice_date',$stripM)
            ->select(DB::raw('(sales.medicine_id) as medic_id'),
                DB::raw('SUM(quantity*buying_price) as buying_price'))
            ->groupBy('medic_id')
            ->get();
        $count_M_L = 0;
        foreach ($drugs_M_L as $drugs_M_L){
            $count_M_L +=$drugs_M_L->buying_price;
        }
        $sales_M_L =DB::table('sales')
            ->where('medicine_id','=',NULL)
            ->where('user_id',auth()->user()->id)
            ->whereMonth('invoice_date',$stripM)
            ->sum('amount_paid');

        $balance_due_M_L =DB::table('sales')
            ->where('user_id',auth()->user()->id)
            ->whereMonth('invoice_date',$stripM)
            ->sum('balance_due');
        //Last monthly data end

        // chart all data start
        $daliy= DB::table('sales')
            ->where('user_id',Auth::user()->id)
            ->where('invoice_date',$tod)
            ->where('medicine_id','=',NULL)
            ->select('invoice_date','amount_paid','customer_name as cname' )
            //->groupBy('date','customer_name','invoice_date')
            //->take(10)
            ->get();
        $tod = date('Y-m-d');
        $date = new DateTime($tod);
        $createDate = $date->modify("-1 day");
        // $createDate = $date;
        $strip = $createDate->format('Y-m-d');
        $yesterday = DB::table('sales')
            ->where('user_id',Auth::user()->id)
            ->where('invoice_date',$strip)
            ->where('medicine_id','=',NULL)
            ->select('invoice_date','amount_paid','customer_name as cname' )
            //->groupBy('date','customer_name','invoice_date')
            //->take(10)
            ->get();
        //return response()->json($yesterday);
        $last_week = DB::table('sales')
            ->where('user_id',Auth::user()->id)
            ->whereBetween('invoice_date',array($start_week, $end_week))
            ->where('medicine_id','=',NULL)
            ->select('invoice_date','amount_paid','customer_name as cname' )
            //->groupBy('date','customer_name','invoice_date')
            //->take(10)
            ->get();
        $this_month = DB::table('sales')
            ->where('user_id',Auth::user()->id)
            ->whereMonth('invoice_date', Carbon::now()->month)
            ->where('medicine_id','=',NULL)
            ->select('invoice_date','amount_paid','customer_name as cname' )
            //->groupBy('date','customer_name','invoice_date')
            //->take(30)
            ->get();
        $last_month = DB::table('sales')
            ->where('user_id',Auth::user()->id)
            ->whereMonth('invoice_date', $stripM)
            ->where('medicine_id','=',NULL)
            ->select('invoice_date','amount_paid','customer_name as cname' )
            //->groupBy('date','customer_name','invoice_date')
            //->take(50)
            ->get();
       //return response()->json($last_month);
        $daily_data_This_Month  =array();
        $month_name  =array();
        $last_month_name  =array();
        $last_week_name  =array();
        $yesterday_name  =array();
        $daily_data_Last_Month  =array();
        foreach ($daliy as $daily_item){
            array_push($daily_data,$daily_item->cname);
        }
        foreach ($daliy as $daily_item2){
            array_push($daily_data2,$daily_item2->amount_paid);
        }
        foreach ($yesterday as $daily_item3){
            array_push($daily_data3,$daily_item3->amount_paid);
        }
        foreach ($yesterday as $daily_item3){
            array_push($yesterday_name,$daily_item3->cname);
        }
        foreach ($last_week as $daily_item4){
            array_push($daily_data_Last_Weekly,$daily_item4->amount_paid);
        }
        foreach ($last_week as $daily_item4){
            array_push($last_week_name,$daily_item4->cname);
        }
        foreach ($this_month as $daily_item5){
            array_push($daily_data_This_Month,$daily_item5->amount_paid);
        }
        foreach ($this_month as $daily_item7){
            array_push($month_name,$daily_item7->cname);
        }
        foreach ($last_month as $daily_item6){
            array_push($daily_data_Last_Month,$daily_item6->amount_paid);
        }
        foreach ($last_month as $daily_item8){
            array_push($last_month_name,$daily_item8->cname);
        }

        $test = array();
        $chart =DB::table('medicine_infos')
            ->where('stock','!=',0)
            ->where('user_id',auth()->user()->id)
            ->orderBy('stock', 'DESC')
            ->select('medicine_infos.*')
            //->take(5)
            ->get();
        foreach ($chart as $itm1){
            array_push($test,$itm1->stock);
        }
        $chart_level =DB::table('medicine_infos')
            ->where('stock','!=',0)
            ->where('user_id',auth()->user()->id)
            ->orderBy('stock', 'DESC')
            ->join('medicine','medicine_infos.medicine_id','medicine.id')
            ->select('medicine.*','medicine.brand_name')
            //->take(5)
            ->get();
        $test2 = array();
        foreach ($chart_level as $itm2){
            array_push($test2,$itm2->brand_name);
        }
        //chart all data end

        $low_stock = DB::table('medicine_infos')
            ->where('medicine_infos.user_id',Auth::user()->id)
            ->where('medicine_infos.stock','<=',100)
            ->join('medicine','medicine_infos.medicine_id','medicine.id')
            ->select('medicine_infos.stock','medicine_infos.medicine_id','medicine.brand_name')
            ->orderBy('medicine_infos.stock','ASC')
            //->take(5)
            ->get();
        //stock investment
//        $investment= DB::table('medicine_infos')
//            ->where('user_id',Auth::user()->id)
//            ->select(DB::raw('SUM(stock*unit_price) as total'))
//            ->first();
//        $account_balance2= DB::table('opening_balance')
//            ->where('user_id',Auth::user()->id)
//            ->count();
//        if ($account_balance2 == 0){
//            $account_balance = 0;
//        }else{
//            $account_balance= DB::table('opening_balance')
//                ->where('user_id',Auth::user()->id)
//                ->first();
//            $account_balance = $account_balance->amount;
//        }
        //return response()->json($account_balance);

        $total_revenue = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('medicine_id','=',NULL)
            ->select(DB::raw('SUM(amount_paid) as totalrevenue'),DB::raw('SUM(balance_due) as balance_due'))
            ->first();
        $buyprice1 = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('medicine_id','!=',NULL)
            ->select(DB::raw('SUM(quantity*buying_price) as buyprice'))
            ->first();

        $othersexpense = DB::table('othersexpense')
            ->where('user_id',Auth::user()->id)
            ->select(DB::raw('SUM(expen_amount) as expen_amount'))
            ->first();
//        $salary_amm = DB::table('expense')
//            ->where('user_id',Auth::user()->id)
//            ->select(DB::raw('SUM(salary_amm) as salary_amm'))
//            ->first();
        $shoprent = DB::table('shoprent')
            ->where('user_id',Auth::user()->id)
            ->select(DB::raw('SUM(paid_amount) as paid_amount'))
            ->first();
        $total_cost = $buyprice1->buyprice+$othersexpense->expen_amount
            +$shoprent->paid_amount;
        $profitdddddd = $total_revenue->totalrevenue - ($total_cost+$total_revenue->balance_due);

        //return response()->json($profitdddddd);

        $total_customer = DB::table('sales')
            ->where('medicine_id','=',NULL)
            ->where('user_id',auth()->user()->id)
            ->count('customer_name');
        //return response()->json($total_customer);
        //expire
        $month = $date->modify("+30 day");
        $tt = date("Y-m-d");
        $aa = $month->format('Y-m-d');
        $expire = DB::table('medicine_infos')
            ->join('medicine','medicine_infos.medicine_id','medicine.id')
            ->where('user_id',Auth::user()->id)
            ->whereBetween("expire_date",[$tt,$aa])
            ->get();
        //return response()->json($expire_over);

        return view('auth.dashboards.users.dashboard',compact('profitdddddd','total_revenue',
            'count','sales','balance_due','test','test2','daily_data',
            'daily_data2','month_name','last_month_name','last_week_name','yesterday_name','this_week_name',
            'daily_data3', 'daily_data_Weekly','daily_data_Last_Weekly','daily_data_This_Month','daily_data_Last_Month',
            'low_stock','total_customer','expire','count_Y','balance_due_Y','sales_Y',
            'count_w','sales_W','balance_due_W','count_w_This','sales_W_This',
            'balance_due_W_This',
            'count_M_L','sales_M_L','balance_due_M_L','sales_M','balance_due_M','count_M'));
    }

    public function expireMedicine(){

        $tod = date("d-m-Y");
        $date = new DateTime($tod);
        $months = $date->modify("-1 day");
        $aaa = $months->format('Y-m-d');
        $expire_over = DB::table('medicine_infos')
            ->join('medicine','medicine_infos.medicine_id','medicine.id')
            ->where('user_id',Auth::user()->id)
            ->where("expire_date",'<=',$aaa)
            ->get();
        //return response()->json($expire_over);
        return view('auth.dashboards.users.expire-medicine',compact('expire_over'));
    }

    public function NewStock(){
        $supplier = DB::table('suplaier')
//                    ->join('medicine','medicine_infos.medicine_id','medicine.id')
                    ->where('user_id',\auth()->user()->id)
            ->get();


        $cart = Cart::content();
        $medicine = DB::table('medicine')
//                    ->join('medicine','medicine_infos.medicine_id','medicine.id')
//                    ->where('medicine_infos.user_id',\auth()->user()->id)
            ->get();
        //return response()->json($medicine);
        return view('auth.dashboards.users.add_stocks',compact('medicine','cart','supplier'));
    }
    //sales crud start
    public function sales(){
        $count =  DB::table('sales')
            ->where('salesMen_id','=',Auth::user()->id)
            ->where('medicine_id','=',NULL)->count();

        $cart = Cart::content();
        $medicine = DB::table('medicine_infos')
            ->join('medicine','medicine_infos.medicine_id','medicine.id')
            ->where('medicine_infos.user_id',\auth()->user()->id)
            ->get();
        return view('auth.dashboards.users.new_sales',compact('medicine','cart','count'));
    }
    //sales crud end
    //New sales Men crud start
    public function add_salesMan(){
        return view('auth.dashboards.users.add_salesman');
    }
    public function salesMenInsert(Request $request){

        $user['name']= $request->first_name.' '.$request->last_name;
        $user['email']= $request->email;
        $user['role']= $request->role;
        $user['password']= \Hash::make($request->password);

        $data['first_name']= $request->first_name;
        $data['last_name']= $request->last_name;
        $data['nid']= $request->nid;
        $data['number']= $request->phone;
        $data['email']= $request->email;
        $data['password']= $request->password;
        $data['district']= $request->district;
        $data['thana']= $request->thana;
        $data['address']= $request->address;
        $data['user_id']= Auth::user()->id;

        $result = DB::table('sales_men')->insert($data);
        DB::table('users')->insert($user);

        if ($result){
            $noti = array(
                'message'=>'Sales Men Successfully Added',
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
    public function manage_salesMan(){
        $salesMen = DB::table('sales_men')->get();
        return view('auth.dashboards.users.view-salesman',compact('salesMen'));
    }
    public function salesMen_edit($id){
        $salesMen = DB::table('sales_men')->where('id',$id)->first();
        return view('auth.dashboards.users.edit-salesman',compact('salesMen'));
    }
    public function salesMenUpdate(Request $request){
//            $user['name']= $request->first_name.' '.$request->last_name;
//            $user['email']= $request->email;

        $data['first_name']= $request->first_name;
        $data['last_name']= $request->last_name;
        $data['nid']= $request->nid;
        $data['number']= $request->phone;
        $data['email']= $request->email;
        $data['password']= $request->password;
        $data['district']= $request->district;
        $data['thana']= $request->thana;
        $data['address']= $request->address;
        $data['user_id']= Auth::user()->id;

        $result = DB::table('sales_men')->where('id',$request->id)->update($data);
        if ($result){
            $noti = array(
                'message'=>'Sales Men Successfully Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('salesmenlist')->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->route('salesmenlist')->with($noti);
        }
    }
    public function salesMenDelete($id){
        $result = DB::table('sales_men')->where('id',$id)->delete();
        if ($result){
            $noti = array(
                'message'=>'Sales Men Successfully Deleted',
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
    //New sales Men crud end
    public function get_med_info(Request $request){
        $med_id = $request->medcine_id;
        $medcine = DB::table('medicine')
            ->join('generic','medicine.generic_name','generic.id')
            ->where('medicine.id',$med_id)
            ->first();
        return json_encode(array('data'=>$medcine));
    }
    public function get_med_info2(Request $request){
        $med_id = $request->medcine_id;
        $medcine = DB::table('medicine')
            ->join('generic','medicine.generic_name','generic.id')
            ->join('medicine_infos','medicine.id','medicine_infos.medicine_id')
            ->where('medicine.id',$med_id)
            ->first();
        return json_encode(array('data'=>$medcine));
    }
    public function add_new_stock(Request $request){
        $data = array();
        $qty = $request->qty;
        $rate = $request->rate;
        $data['id'] =$request->medcine_id;
        $data['name'] =$request->brand_name;
        $data['qty'] =$qty;
        $data['weight'] =0;
        $data['options']['size'] = $request->expire_date;
        $data['price'] =$rate;
        Cart::add($data);
        return json_encode(array('data'=>json_decode(Cart::content())));
    }
    public function add_new_sale(Request $request){
        $data = array();
        $name = $request->medcine_id;
        $medcine_id = $request->brand_name;
        $qty = $request->qty;
        $rate = $request->rate;
        $unit_price = $request->unit_price;
        $data['id'] =$name;
        $data['name'] =$medcine_id;
        $data['qty'] =$qty;
        $data['weight'] = 0;
        $data['price'] =$rate;
        $data['options']['buying_price'] =$unit_price;
        Cart::add($data);
        return json_encode(array('data'=>json_decode(Cart::content())));
    }
    public function new_stock_delete($id){
        Cart::remove($id);
        return redirect()->back();
    }
    public function new_sale_delete($id){

        //echo $id;
        Cart::remove($id);
        return redirect()->back();
    }
    public function plan($id){
        $plan =  $id;
        return view('test',compact('plan'));
    }
    public function add_req(Request $request){
        $data['u_name'] = $request->u_name;
        $data['u_email'] = $request->u_email;
        $data['u_phone'] = $request->u_phone;
        $data['u_organization'] = $request->u_organization;
        $data['u_address'] = $request->u_address;
        $data['u_thana'] = $request->u_thana;
        $data['u_zila'] = $request->u_zila;
        $data['u_zip'] = $request->u_zip;
        $data['u_plan'] = $request->u_plan;
        $result = DB::table('requested_users')->insert($data);
        if ($result){
            return back();
        }
    }
    public function new_stock_add(Request $request){
        $invoice_no = $request->invoice_number;
        $date = date_create($request->ex_date);
        $ulta =  date_format($date,"Y-m-d");
        $customer_name = $request->invoice_supplier;
        $medicine_name = $request->med_id;
        $qty = $request->qty;
        $price = $request->price;
        $expire = $request->ex_date;
        $data['invoice_no'] = $invoice_no;
        $data['invoice_date'] = $ulta;
        $data['customer_name'] = $customer_name;
        $data['medicine_id'] = $medicine_name;
        $data['quantity'] = $qty;
        $data['pro_rate'] = $price;
        $data['expire_date'] = $expire;
        $data['salesMen_id'] = \auth()->user()->id;
        $data['user_id'] = \auth()->user()->id;
        $data['total'] = $request->total_am;
        $data['discount'] = $request->discount_am;
        $data['billed_amm'] = $request->bill_am;
        $data['amount_paid'] = $request->amount_paid;
        $data['balance_due'] = $request->due_am;
        $calc = DB::table('medicine_infos')
            ->where('medicine_id','=',$medicine_name)
            ->where('user_id','=', auth()->user()->id);
        $result2 = $calc->first();
        $check = $calc->count();
        if ($check != 1){
            $final['medicine_id'] = $request->med_id;

            $date = date_create($request->ex_date);
            $ulta =  date_format($date,"Y-m-d");

            $final['expire_date'] = $ulta;
            $final['stock'] = $qty;
            $final['unit_price'] = $price;
            $final['user_id'] = auth()->user()->id;

            DB::table('medicine_infos')->insert($final);


        }else{
            $current_stock = $result2->stock;
            $final['stock'] = $current_stock + $qty;
            $final['unit_price'] = $price;

            $date = date_create($request->ex_date);
            $ulta =  date_format($date,"Y-m-d");
            $final['expire_date'] = $ulta;
            DB::table('medicine_infos')
                ->where('medicine_id',$medicine_name)
                ->where('user_id',auth()->user()->id)
                ->update($final);
        }
        DB::table('stocks')->insert($data);
    }
    public function new_stock_add2(Request $request){
        $invoice_no = $request->invoice_number;
        $date = date_create($request->ex_date);
        $ulta =  date_format($date,"Y-m-d");
        $customer_name = $request->invoice_supplier;
        $data['invoice_no'] = $invoice_no;
        $data['invoice_date'] = $ulta;
        $data['customer_name'] = $customer_name;
        $data['salesMen_id'] = \auth()->user()->id;
        $data['user_id'] = \auth()->user()->id;
        $data['total'] =   str_replace(',', '', $request->total_am);
        $data['discount'] = $request->discount_am;
        $data['billed_amm'] = $request->bill_am;
        $data['amount_paid'] = $request->amount_paid;
        $data['balance_due'] = $request->due_am;
        $result = DB::table('stocks')->insert($data);
//        $calc = DB::table('opening_balance')->where('user_id','=', auth()->user()->id);
//        $result2 = $calc->first();
//        $check = $calc->count();
//        if ($check != 1){
//            $final['user_id'] = auth()->user()->id;
//            $final['amount'] = $request->amount_paid;
//            $final['user_id'] = auth()->user()->id;
//            DB::table('opening_balance')->insert($final);
//        }else{
//            $current_stock = $result2->amount;
//            $final['amount'] = $current_stock - $request->amount_paid;
//            DB::table('opening_balance')
//                ->where('user_id',auth()->user()->id)
//                ->update($final);
//        }
        Cart::destroy();
        return json_encode(array('data'=>'success'));
    }
    public function new_sale_add(Request $request){
        $invoice_no = $request->invoice_number;
        $invoice_date = date_create($request->invoice_date);
        $ulta =  date_format($invoice_date,"Y-m-d");
        $customer_name = $request->invoice_supplier;
        $medicine_name = $request->med_id;
        $qty = $request->qty;
        $price = $request->price;
        $buying_price = $request->buying_price;
        $data['invoice_no'] = $invoice_no;
        $data['invoice_date'] = $ulta;
        $data['customer_name'] = $customer_name;
        $data['medicine_id'] = $medicine_name;
        $data['quantity'] = $qty;
        $data['pro_rate'] = $price;
        $data['buying_price'] = $buying_price;
        $data['salesMen_id'] = \auth()->user()->id;
        $data['user_id'] = \auth()->user()->id;
        $data['total'] = $qty*$price;
        $sub_dis = ($qty*$price)*($request->discount_am/100);
        $data['discount'] = $sub_dis;
        $data['billed_amm'] = $request->bill_am;
        $data['amount_paid'] = $request->amount_paid;
        $data['balance_due'] = $request->due_am;
        $calc = DB::table('medicine_infos')
            ->where('medicine_id','=',$medicine_name)
            ->where('user_id','=', auth()->user()->id);
        $result2 = $calc->first();
        $check = $calc->count();
        if ($check != 1){
            $final['medicine_id'] = $request->med_id;
            $final['stock'] = $qty;
            $final['user_id'] = auth()->user()->id;
            DB::table('medicine_infos')->insert($final);
        }else{
            $current_stock = $result2->stock;
            $final['stock'] = $current_stock - $qty;
            DB::table('medicine_infos')
                ->where('medicine_id',$medicine_name)
                ->where('user_id',auth()->user()->id)
                ->update($final);
        }
        DB::table('sales')->insert($data);
    }
    public function new_sale_add2(Request $request){
        $invoice_no = $request->invoice_number;
        $invoice_date = date_create($request->invoice_date);
        $ulta =  date_format($invoice_date,"Y-m-d");
        $customer_name = $request->invoice_supplier;
        $data['invoice_no'] = $invoice_no;
        $data['invoice_date'] = $ulta;
        $data['customer_name'] = $customer_name;
        $data['salesMen_id'] = \auth()->user()->id;
        $data['user_id'] = \auth()->user()->id;
        $data['total'] =   str_replace(',', '', $request->total_am);
        $data['discount'] = $request->discount_am;
        $data['billed_amm'] = $request->bill_am;
        $data['amount_paid'] = $request->amount_paid;
        $data['balance_due'] = $request->due_am;
        $data['custome_phn'] = $request->cust_mob;

//        $calc = DB::table('opening_balance')->where('user_id','=', auth()->user()->id);
//        $result2 = $calc->first();
//        $check = $calc->count();
//        if ($check != 1){
//            $final['user_id'] = auth()->user()->id;
//            $final['amount'] = $request->amount_paid;
//            $final['user_id'] = auth()->user()->id;
//            DB::table('opening_balance')->insert($final);
//        }else{
//            $current_stock = $result2->amount;
//            $final['amount'] = $current_stock + $request->amount_paid;
//            DB::table('opening_balance')
//                ->where('user_id',auth()->user()->id)
//                ->update($final);
//        }

        $result = DB::table('sales')->insert($data);
        Cart::destroy();
        return json_encode(array('data'=>'success'));
    }
    public function empty_cart(){
//            Cart::destroy();
//            return back();
        $calc = DB::table('medicine_infos')
            ->where('medicine_id','=',1)
            ->where('user_id','=', 9);
        $check = $calc->count();
        return $check;
    }
    public function MyAccount(){
        $users = DB::table('users')
            ->where('users.id',Auth::user()->id)
            ->join('plans','users.plan','plans.id')
            ->select('users.*','plans.plan_name','users.id as uid')
            ->first();
        $count =DB::table('medicine_infos')
            ->where('user_id','=',Auth::user()->id)
            ->select('medicine_infos.*')
            ->count();
        $invoice_no = DB::table('sales')
            ->where('user_id',Auth::user()->id)
            ->where('medicine_id','!=',NULL)
            ->count();

        $salesMen = DB::table('sales_men')
            ->where('user_id',Auth::user()->id)
            ->count();
        $Supplier = DB::table('suplaier')
            ->where('user_id',Auth::user()->id)
            ->count();
        // return response()->json($Supplier);
        return view('auth.dashboards.users.my-account',compact('users','count','invoice_no','salesMen','Supplier'));
    }
    public function new_stock_manage(){
        $stocks =  DB::table('stocks')
            ->join('suplaier','stocks.customer_name','suplaier.id')
            ->where('salesMen_id','=',Auth::user()->id)
            ->where('medicine_id','=',NULL)->get();
        //return response()->json($stocks);
        return view('auth.dashboards.users.stocks-manage',compact('stocks'));
    }
    public function stock_delete($invoice_no){
        $stocks =  DB::table('stocks')
            ->where('invoice_no',$invoice_no)
            ->where('medicine_id','!=',NULL)
            ->get();
        foreach ($stocks as $stocks12){
            $as = DB::table('medicine_infos')
                ->where('medicine_id',$stocks12->medicine_id)
                ->where('user_id','=',Auth::user()->id)
                ->first();
            $cheak = $as->stock - $stocks12->quantity;
            $data['stock'] = $cheak;
            DB::table('medicine_infos')
                ->where('medicine_id',$stocks12->medicine_id)
                ->where('user_id','=',Auth::user()->id)
                ->update($data);
        }
        $result= DB::table('stocks')->where('invoice_no',$invoice_no)->delete();
        if ($result){
            $noti = array(
                'message'=>'Your Stock Successfully Deleted',
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

    public function new_sale_manage(){
        $sales =  DB::table('sales')
            ->where('salesMen_id','=',Auth::user()->id)
            ->where('medicine_id','=',NULL)->get();
        return view('auth.dashboards.users.sales-manage',compact('sales'));
    }
    public function stock_details($invoice_no){
        $stock_details = DB::table('stocks')
            ->where('invoice_no',$invoice_no)
            ->where('medicine_id','!=',NULL)
            ->join('medicine','stocks.medicine_id','medicine.id')
            ->select('stocks.*','medicine.brand_name')->get();
        $total = DB::table('stocks')
            ->where('invoice_no',$invoice_no)
            ->where('total','!=',NULL)->first();
        //return response()->json($data);
        return view('auth.dashboards.users.stock-details',compact('stock_details','total'));
    }
    public function sele_details($invoice_no){
        $stock_details = DB::table('sales')
            ->where('invoice_no',$invoice_no)
            ->where('medicine_id','!=',NULL)
            ->join('medicine','sales.medicine_id','medicine.id')
            ->select('sales.*','medicine.brand_name')->get();
        $total = DB::table('sales')
            ->where('invoice_no',$invoice_no)
            ->where('medicine_id','=',NULL)->first();
        //return response()->json($data);
        return view('auth.dashboards.users.sale-datails',compact('stock_details','total'));
    }
    public function drug_view(){
        $drug_view =  DB::table('medicine_infos')
            ->where('stock','!=','0')
            ->where('user_id','=',Auth::user()->id)
            ->join('medicine','medicine_infos.medicine_id','medicine.id')
            ->join('generic','medicine.generic_name','generic.id')
            ->select('medicine_infos.*','medicine.brand_name','medicine.strength','medicine.retail_price','generic.gname')
            ->get();
        $drug_view_total =  DB::table('medicine_infos')
            ->where('stock','!=','0')
            ->where('user_id','=',Auth::user()->id)
            ->select(DB::raw('SUM(unit_price*stock) as total_price'),DB::raw('SUM(stock) as total_stock'))
            ->first();
        // return response()->json($drug_view_total);
        return view('auth.dashboards.users.drug_view',compact('drug_view','drug_view_total'));
    }
    public function test(){
//        $chart = DB::table("sales")
//            ->select(
//               DB::raw('sum(total) as sums'),
//               DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
//           )
//               ->groupBy('months')
//               ->get();


        $fd = DB::table('medicine')
            ->get();



        //return response()->json($fd);

        foreach ($fd as $fd){
            $data['created_by'] = 'admin';

            DB::table('medicine')
                ->update($data);
        }

    }
    public function dailyReports(){
        $daliy= DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->select(DB::raw('invoice_date as date'),
                DB::raw('SUM(amount_paid) as total'),
                DB::raw('SUM(quantity) as quantity'),
                DB::raw('SUM(balance_due) as balance_due'),
                DB::raw('SUM(quantity*buying_price) as buying_total'))
            ->groupBy('date')
            ->orderBy('date','DESC')
            ->get();
        //return response()->json($daliy);
        return view('auth.dashboards.users.reporting_date',compact('daliy'));
    }
    public function MonthlyReports(){
        $monthly = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->select(DB::raw('MONTH(invoice_date) as month'),
                DB::raw('SUM(amount_paid) as amount_paid'),
                DB::raw('SUM(quantity) as quantity'),
                DB::raw('SUM(balance_due) as balance_due'),
                DB::raw('SUM(quantity*buying_price) as buying_total'))
            ->groupBy('month')
            ->orderBy('month','DESC')
            ->get();
        $month = DB::table('months')->get();
        return view('auth.dashboards.users.reporting_month',compact('monthly','month'));
    }
//    public function CompanyReports(){
//        return view('auth.dashboards.users.reporting_com');
//    }
    public function DrugsReports(){
        $drugs = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->join('medicine','sales.medicine_id','medicine.id')
            ->select(DB::raw('(sales.medicine_id) as medic_id'),
                DB::raw('SUM(quantity*pro_rate) as total') ,
                DB::raw('SUM(quantity*buying_price) as buying_price') ,
                DB::raw('SUM(quantity) as quantity'),
                DB::raw('SUM(discount) as discount'),
                DB::raw('(medicine.brand_name) as brand_name'),
                DB::raw('(medicine.strength) as strength'))
            ->groupBy('medic_id','brand_name','strength')
            ->get();
        //return response()->json($drugs);
        return view('auth.dashboards.users.reporting_drug',compact('drugs'));
    }

    //account manage

    public function openingBalance(){
        return view('auth.dashboards.users.opening-balance');
    }
    public function InsertopeningBalance(Request $request){
        $data['amount']= $request->balance_amm;
        $data['balance_date']= $request->addDate;
        $data['user_id']= Auth::user()->id;
        $result = DB::table('opening_balance')->insert($data);
        if ($result){
            $noti = array(
                'message'=>'Opening Balance Successfully Deleted',
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
    //salary crud start
    public function manageSalary(){
        $salary_list = DB::table('expense')
            ->where('expense.user_id',Auth::user()->id)
            ->join('sales_men','expense.sales_men_id','sales_men.id')
            ->select('expense.*','sales_men.first_name','sales_men.last_name')
            ->orderBy('expense.id', 'DESC')
            ->get();
        $sales_men = DB::table('sales_men')->where('user_id',Auth::user()->id)->get();
        //return response()->json($salary_list);
        return view('auth.dashboards.users.salary-manage',compact('salary_list','sales_men'));
    }
    public function InsertSalary(Request $request){
        $data['sales_men_id']= $request->sales_name;
        $data['salary_amm']= $request->salary_amm;
        $data['salary_of_month']= $request->datepicker2;
        $data['salary_date']= $request->salary_paid;
        $data['user_id']= Auth::user()->id;
//
//        $calc = DB::table('opening_balance')->where('user_id','=', auth()->user()->id);
//        $result2 = $calc->first();
//        $check = $calc->count();
//        if ($check != 1){
//            $final['user_id'] = auth()->user()->id;
//            $final['amount'] = $request->salary_amm;
//            $final['user_id'] = auth()->user()->id;
//            DB::table('opening_balance')->insert($final);
//        }else{
//            $current_stock = $result2->amount;
//            $final['amount'] = $current_stock - $request->salary_amm;
//            DB::table('opening_balance')
//                ->where('user_id',auth()->user()->id)
//                ->update($final);
//        }
        $result= DB::table('expense')->insert($data);
        if ($result){
            $noti = array(
                'message'=>'Salary Successfully Deleted',
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
    public function SalaryEdit($id){
        $salary_list_edit = DB::table('expense')
            ->where('expense.user_id',Auth::user()->id)
            ->where('expense.id',$id)
            ->join('sales_men','expense.sales_men_id','sales_men.id')
            ->select('expense.*','sales_men.first_name','sales_men.last_name')
            ->first();
        $sales_men = DB::table('sales_men')->where('user_id',Auth::user()->id)->get();
        //return response()->json($salary_list);
        return view('auth.dashboards.users.salary-edit',compact('salary_list_edit','sales_men'));
    }
    public function UpdateSalary(Request $request){
        $data['sales_men_id']= $request->sales_name;
        $data['salary_amm']= $request->salary_amm;
        $data['salary_of_month']= $request->datepicker2;
        $data['salary_date']= $request->salary_paid;
        $data['user_id']= Auth::user()->id;
        $result= DB::table('expense')->where('id',$request->id)->update($data);
        if ($result){
            $noti = array(
                'message'=>'Salary Successfully Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('manageSalary')->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->route('manageSalary')->with($noti);
        }
    }
    public function DeleteSalary($id){
        $result = DB::table('expense')->where('id',$id)->delete();
        if ($result){
            $noti = array(
                'message'=>'Salary Successfully Deleted',
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
    //salary crud end

    //Rent crud start
    public function manageRent(){
        $rent_details = DB::table('shoprent')->where('user_id',Auth::user()->id)->get();
        return view('auth.dashboards.users.rent-manage',compact('rent_details'));
    }
    public function InsertRent(Request $request){
        $data['rent_of_month']= $request->Rent_f_month;
        $data['paid_month']= $request->Rent_paid;
        $data['paid_amount']= $request->Rent_amm;
        $data['user_id']= Auth::user()->id;

//        $calc = DB::table('opening_balance')->where('user_id','=', auth()->user()->id);
//        $result2 = $calc->first();
//        $check = $calc->count();
//        if ($check != 1){
//            $final['user_id'] = auth()->user()->id;
//            $final['amount'] = $request->Rent_amm;
//            $final['user_id'] = auth()->user()->id;
//            DB::table('opening_balance')->insert($final);
//        }else{
//            $current_stock = $result2->amount;
//            $final['amount'] = $current_stock - $request->Rent_amm;
//            DB::table('opening_balance')
//                ->where('user_id',auth()->user()->id)
//                ->update($final);
//        }

        $result= DB::table('shoprent')->insert($data);
        if ($result){
            $noti = array(
                'message'=>'Rent Paid Successfull',
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
    public function RentEdit($id){
        $rent_details_edit = DB::table('shoprent')
            ->where('id',$id)
            ->first();
        return view('auth.dashboards.users.rent-edit',compact('rent_details_edit'));
    }
    public function UpdateRent(Request $request){
        $data['rent_of_month']= $request->Rent_f_month;
        $data['paid_month']= $request->Rent_paid;
        $data['paid_amount']= $request->Rent_amm;
        $data['user_id']= Auth::user()->id;
        $result= DB::table('shoprent') ->where('id',$request->id)->update($data);
        if ($result){
            $noti = array(
                'message'=>'Rent Update Successfull',
                'alert-type'=>'success'
            );
            return redirect()->route('manageRent')->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->route('manageRent')->with($noti);
        }
    }
    public function DeleteRent($id){
        $result = DB::table('shoprent')->where('id',$id)->delete();
        if ($result){
            $noti = array(
                'message'=>'Rent Successfully Deleted',
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
    //rent crud end


    //other's crud start
    public function manageOthers(){
        $expen_details = DB::table('othersexpense')->where('user_id',Auth::user()->id)->get();
        return view('auth.dashboards.users.others-manage',compact('expen_details'));
    }
    public function Insertother(Request $request){
        $data['expen_details']= $request->expen_details;
        $data['expen_date']= $request->expense_date;
        $data['expen_amount']= $request->expen_amount;
        $data['user_id']= Auth::user()->id;

//        $calc = DB::table('opening_balance')->where('user_id','=', auth()->user()->id);
//        $result2 = $calc->first();
//        $check = $calc->count();
//        if ($check != 1){
//            $final['user_id'] = auth()->user()->id;
//            $final['amount'] = $request->expen_amount;
//            $final['user_id'] = auth()->user()->id;
//            DB::table('opening_balance')->insert($final);
//        }else{
//            $current_stock = $result2->amount;
//            $final['amount'] = $current_stock - $request->expen_amount;
//            DB::table('opening_balance')
//                ->where('user_id',auth()->user()->id)
//                ->update($final);
//        }

        $result= DB::table('othersexpense')->insert($data);
        if ($result){
            $noti = array(
                'message'=>'Expense Add Successfull',
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
    public function Editother($id){
        $expen_details = DB::table('othersexpense')->where('id',$id)->first();
        return view('auth.dashboards.users.others-edit',compact('expen_details'));
    }
    public function Updateother(Request $request){
        $data['expen_details']= $request->expen_details;
        $data['expen_date']= $request->expense_date;
        $data['expen_amount']= $request->expen_amount;
        $data['user_id']= Auth::user()->id;
        $result= DB::table('othersexpense')->where('id',$request->id)->update($data);
        if ($result){
            $noti = array(
                'message'=>'Expense Update Successfull',
                'alert-type'=>'success'
            );
            return redirect()->route('manageOthers')->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->route('manageOthers')->with($noti);
        }
    }
    public function Deleteother($id){
        $result = DB::table('othersexpense')->where('id',$id)->delete();
        if ($result){
            $noti = array(
                'message'=>'Expense Successfully Deleted',
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
    //other's crud end
    //account manage end

    //suplaier crud start

    public function addSuplaier(){
        return view('auth.dashboards.users.suplaier-add');
    }
    public function suplaierInsert(Request $request){
        $data['name']= $request->name;
        $data['position']= $request->position;
        $data['company']= $request->company;
        $data['email']= $request->email;
        $data['phone_num']= $request->phone;
        $data['user_id']= Auth::user()->id;
        $result = DB::table('suplaier')->insert($data);
        if ($result){
            $noti = array(
                'message'=>'Suplaier Successfully Deleted',
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
    public function manageSuplaier(){
        $suplaier = DB::table('suplaier')->where('user_id',Auth::user()->id)->get();
        // return  response()->json($suplaier);
        return view('auth.dashboards.users.suplaier-manage',compact('suplaier'));
    }
    public function suplaierEdit($id){
        $suplaier_edit = DB::table('suplaier')
            ->where('user_id',Auth::user()->id)
            ->where('id',$id)
            ->first();
        //return  response()->json($suplaier);
        return view('auth.dashboards.users.suplaier-edit',compact('suplaier_edit'));
    }
    public function suplaierUpdate(Request $request){
        $data['name']= $request->name;
        $data['position']= $request->position;
        $data['company']= $request->company;
        $data['email']= $request->email;
        $data['phone_num']= $request->phone;
        $data['user_id']= Auth::user()->id;
        $result= DB::table('suplaier')->where('id',$request->id)->update($data);
        if ($result){
            $noti = array(
                'message'=>'supplier Update Successfull',
                'alert-type'=>'success'
            );
            return redirect()->route('manageSuplaier')->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->route('manageSuplaier')->with($noti);
        }

    }
    public function suplaierDeleted($id){
        $result = DB::table('suplaier')->where('id',$id)->delete();
        if ($result){
            $noti = array(
                'message'=>'supplier Successfully Deleted',
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
    //suplaier crud end
    //ddddd
    public function dd(){
        $daliy= DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->select(DB::raw('MONTH(invoice_date) as month'),
                    DB::raw('SUM(amount_paid) as amount_paid'),
                    DB::raw('SUM(quantity) as quantity'),
                    DB::raw('SUM(balance_due) as balance_due'),
                    DB::raw('SUM(quantity*buying_price) as buying_total'))
            ->groupBy('month')
            ->orderBy('month','DESC')
            ->get();

          $month = DB::table('months')->get();
            //$monthname = date('F', strtotime($daliy->month));
            //return response()->json($daliy);
        return view('auth.dashboards.users.dd',compact('daliy','month'));
    }

    public function messages(Request $request){
        $data = array();
        $messages = $request->messages;
        $user_id = \auth()->user()->id;
        $data['from_id'] = $user_id;
        $data['message'] = $messages;
        $data['to_id'] = 0;
        $data['user_id'] = $user_id;
        $data['admin_id'] = $user_id;

        $result = DB::table('messages')->insert($data);
        return json_encode(array('data'=>$data));
    }
    public function get_messages(){
        $result = DB::table('messages')
            ->where('from_id',Auth::user()->id)
            ->orWhere('to_id',Auth::user()->id)
            ->get();

        //return response()->json($result);
        return json_encode(array('data'=>$result));
    }
    public function return_sales($invoice_no){
        $medicine1 = DB::table('sales')
            ->where('sales.user_id',\auth()->user()->id)
            ->where('sales.invoice_no',$invoice_no)
            ->where('medicine_id','!=',NULL)
            ->join('medicine','sales.medicine_id','medicine.id')
            ->get();
        //return response()->json($medicine1);
        return view('auth.dashboards.users.return-sales',compact('medicine1'));
    }
    public function returnSale(Request $request){
        $data['invoice']= $request->invoice_no;
        $data['medi_id']= $request->medi_name;
        $data['quantity']= $request->qtyy;
        $data['user_id']= Auth::user()->id;
        $result= DB::table('return')->insert($data);
        $a = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_no','=',$request->invoice_no)
            ->where('medicine_id','=',$request->medi_name)
            ->first();
        //return response()->json($a->quantity);
        $medi_info = DB::table('medicine_infos')
            ->where('user_id',Auth::user()->id)
            ->where('medicine_id','=',$request->medi_name)
            ->first();
        $stock['stock']= $medi_info->stock + $request->qtyy;
        $medi_info = DB::table('medicine_infos')
            ->where('user_id',Auth::user()->id)
            ->where('medicine_id','=',$request->medi_name)
            ->update($stock);

        $qqtyy = $a->quantity - $request->qtyy;
        $qqtyry = $qqty['quantity'] = $qqtyy;
        $qqt= $a->pro_rate * $qqtyry;
        $qqty['total'] = $qqt;
        $a = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_no','=',$request->invoice_no)
            ->where('medicine_id','=',$request->medi_name)
            ->update($qqty);

        $total = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_no','=',$request->invoice_no)
            ->where('medicine_id','!=',NULL)
            ->select(DB::raw('SUM(total) as total'))
            ->first();
        $qqtys['total'] = $total->total;
        DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_no','=',$request->invoice_no)
            ->where('medicine_id','=',NULL)
            ->update($qqtys);

        $total2 = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_no','=',$request->invoice_no)
            ->where('medicine_id','!=',NULL)
            ->select(DB::raw('SUM(total-discount) as atotal'))
            ->first();
        $billed_amm['billed_amm'] = $total2->atotal;
        DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_no','=',$request->invoice_no)
            ->where('medicine_id','=',NULL)
            ->update($billed_amm);

        $total3 = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_no','=',$request->invoice_no)
            ->where('medicine_id','=',NULL)
            ->select(DB::raw('SUM(billed_amm-balance_due) as paid_amm'))
            ->first();
        $paid_amm['amount_paid'] = $total3->paid_amm;
        DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_no','=',$request->invoice_no)
            ->where('medicine_id','=',NULL)
            ->update($paid_amm);
        return redirect()->back();
    }
    public function customerManage(){
        $customer = DB::table('sales')
            ->where('salesMen_id','=',Auth::user()->id)
            ->where('medicine_id','=',NULL)
            ->orderBy('balance_due','DESC')
            ->get();
        //return response()->json($customer);
        return view('auth.dashboards.users.customer-manage',compact('customer'));
        return view('auth.dashboards.users.customer-manage',compact('customer'));
    }
    public function paidDue($invoice_no){
        $customer = DB::table('sales')
            ->where('salesMen_id',Auth::user()->id)
            ->where('invoice_no',$invoice_no)
            ->where('balance_due','!=',NULL)
            ->first();
        return view('auth.dashboards.users.due-paid',compact('customer'));
    }
    public function InsertDueAmount(Request $request){

        $calc = DB::table('sales')
            ->where('user_id','=', auth()->user()->id)
            ->where('balance_due','!=',NULL)
            ->where('invoice_no',$request->invoiceid)
            ->first();
        $current_due = $calc->balance_due;
        $amount_paid = $calc->amount_paid;
        $final['balance_due'] = $current_due - $request->due_amm;
        $final['amount_paid'] = $amount_paid + $request->due_amm;
        $result =  DB::table('sales')
            ->where('user_id',auth()->user()->id)
            ->where('invoice_no','=',$request->invoiceid)
            ->where('balance_due','!=',NULL)
            ->update($final);
        if ($result){
            $noti = array(
                'message'=>'Due Amount'.' '. $request->due_amm .' '.'Successfully Paid',
                'alert-type'=>'success'
            );
            return redirect()->route('customerManage')->with($noti);
        }else{
            $noti = array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return redirect()->route('customerManage')->with($noti);
        }
    }
    public function invoice_list(){
        $invoice =  DB::table('sales')
            ->where('salesMen_id','=',Auth::user()->id)
            ->where('medicine_id','=',NULL)->get();
        $stocks =  DB::table('stocks')
            ->join('suplaier','stocks.customer_name','suplaier.id')
            ->where('salesMen_id','=',Auth::user()->id)
            ->where('medicine_id','=',NULL)->get();
        return view('auth.dashboards.users.invoice-list',compact('invoice','stocks'));
    }
    public function invoice_details($invoice_no){
        $invoice_details = DB::table('sales')
            ->where('invoice_no',$invoice_no)
            ->where('medicine_id','!=',NULL)
            ->join('medicine','sales.medicine_id','medicine.id')
            ->select('sales.*','medicine.brand_name')->get();
        $total = DB::table('sales')
            ->where('invoice_no',$invoice_no)
            ->where('medicine_id','=',NULL)->first();

        $user = DB::table('users')
            ->where('id',Auth::user()->id)->first();
        //return response()->json($data);
        return view('auth.dashboards.users.invoice-details',compact('invoice_details','total','user'));
    }
    //stock invoice details
    public function invoice_details2($invoice_no){
        $invoice_details = DB::table('stocks')
            ->where('invoice_no',$invoice_no)
            ->where('medicine_id','!=',NULL)
            ->join('medicine','stocks.medicine_id','medicine.id')
            ->select('stocks.*','medicine.brand_name')->get();
        $total = DB::table('stocks')
            ->where('invoice_no',$invoice_no)
            ->where('total','!=',NULL)->first();

        $user = DB::table('users')
            ->where('id',Auth::user()->id)->first();
        //return response()->json($data);
        return view('auth.dashboards.users.invoice-details2',compact('invoice_details','total','user'));
    }
    public function request_medicine(){
        return view('auth.dashboards.users.request-medicine');
    }
    public function requestMedicine(Request $request){
        $data['medi_name']= $request->medi_name;
        $data['generic_nam']= $request->generic;
        $data['company_nam']= $request->company;
        $data['user_id']= Auth::user()->id;
        $result= DB::table('requestmedi')->insert($data);
        if ($result){
            $noti = array(
                'message'=>'Medicine Request Successfully Added',
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
    public function payment(){
        $pay_info = Db::table('payments')
            ->where('user_id',Auth::user()->id)
            ->get();

        return view('auth.dashboards.users.payment',compact('pay_info'));
    }
    public function give_payment(Request $request){
        $num = $request->bkash;
        $trxid = $request->trxid;
        $user_id = Auth::user()->id;

        $data['bkash_number']= $num;
        $data['trxid']= $trxid;
        $data['user_id']= $user_id;

        $result= DB::table('payments')->insert($data);

        if ($result){
            $noti = array(
                'message'=>'Payment Information Successfully Received',
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

}
