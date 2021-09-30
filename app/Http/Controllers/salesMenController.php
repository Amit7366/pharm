<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cart;
class salesMenController extends Controller
{
    public function index(){
        return view('auth.dashboards.salesmen.dashboard');
    }
    public function salesMenstock(){
        $supplier = DB::table('users')
                    ->where('users.id',\auth()->user()->id)
                    ->join('suplaier','users.user_id','suplaier.user_id')
                    ->get();

        $cart = Cart::content();
        $medicine = DB::table('medicine')
//                    ->join('medicine','medicine_infos.medicine_id','medicine.id')
//                    ->where('medicine_infos.user_id',\auth()->user()->id)
            ->get();
       // return response()->json($supplier);
        return view('auth.dashboards.salesmen.add_stocksMen',compact('medicine','cart','supplier'));
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
        $data['user_id'] = \auth()->user()->user_id;
        $data['total'] = $request->total_am;
        $data['discount'] = $request->discount_am;
        $data['billed_amm'] = $request->bill_am;
        $data['amount_paid'] = $request->amount_paid;
        $data['balance_due'] = $request->due_am;
        $calc = DB::table('medicine_infos')
            ->where('medicine_id','=',$medicine_name)
            ->where('user_id','=', auth()->user()->user_id);
        $result2 = $calc->first();
        $check = $calc->count();
        if ($check != 1){
            $final['medicine_id'] = $request->med_id;

            $date = date_create($request->ex_date);
            $ulta =  date_format($date,"Y-m-d");

            $final['expire_date'] = $ulta;
            $final['stock'] = $qty;
            $final['unit_price'] = $price;
            $final['user_id'] = auth()->user()->user_id;

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
                ->where('user_id',auth()->user()->user_id)
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
        $data['user_id'] = \auth()->user()->user_id;
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

    public function sales(){
        $count =  DB::table('sales')
            ->where('user_id','=',Auth::user()->user_id)
            ->where('medicine_id','=',NULL)->count();

        $cart = Cart::content();
        $medicine = DB::table('medicine_infos')
            ->join('medicine','medicine_infos.medicine_id','medicine.id')
            ->where('medicine_infos.user_id',\auth()->user()->user_id)
            ->get();
        return view('auth.dashboards.salesmen.new_sales_SM',compact('medicine','cart','count'));
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
        $data['user_id'] = \auth()->user()->user_id;
        $data['total'] = $qty*$price;
        $sub_dis = ($qty*$price)*($request->discount_am/100);
        $data['discount'] = $sub_dis;
        $data['billed_amm'] = $request->bill_am;
        $data['amount_paid'] = $request->amount_paid;
        $data['balance_due'] = $request->due_am;
        $calc = DB::table('medicine_infos')
            ->where('medicine_id','=',$medicine_name)
            ->where('user_id','=', auth()->user()->user_id);
        $result2 = $calc->first();
        $check = $calc->count();
        if ($check != 1){
            $final['medicine_id'] = $request->med_id;
            $final['stock'] = $qty;
            $final['user_id'] = auth()->user()->user_id;
            DB::table('medicine_infos')->insert($final);
        }else{
            $current_stock = $result2->stock;
            $final['stock'] = $current_stock - $qty;
            DB::table('medicine_infos')
                ->where('medicine_id',$medicine_name)
                ->where('user_id',auth()->user()->user_id)
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
        $data['user_id'] = \auth()->user()->user_id;
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
    public function new_sale_manage(){
        $sales =  DB::table('sales')
            ->where('salesMen_id','=',Auth::user()->id)
            ->where('user_id','=',Auth::user()->user_id)
            ->where('medicine_id','=',NULL)->orderBy('invoice_date','DESC')->get();
        //return response()->json($sales);
        return view('auth.dashboards.salesmen.sales-manage-SM',compact('sales'));
    }
    public function sele_details($invoice_no){
        $stock_details = DB::table('sales')
            ->where('salesMen_id','=',Auth::user()->id)
            ->where('user_id','=',Auth::user()->user_id)
            ->where('invoice_no',$invoice_no)
            ->where('medicine_id','!=',NULL)
            ->join('medicine','sales.medicine_id','medicine.id')
            ->select('sales.*','medicine.brand_name')->get();
        $total = DB::table('sales')
            ->where('salesMen_id','=',Auth::user()->id)
            ->where('user_id','=',Auth::user()->user_id)
            ->where('invoice_no',$invoice_no)
            ->where('medicine_id','=',NULL)->first();
        //return response()->json($data);
        return view('auth.dashboards.salesmen.sale-datails-SM',compact('stock_details','total'));
    }
    public function new_stock_manage(){
        $stocks =  DB::table('stocks')
//            ->where('user_id','=',Auth::user()->user_id)
           ->where('salesMen_id','=',Auth::user()->id)
            ->join('suplaier','stocks.customer_name','suplaier.id')
            ->where('medicine_id','=',NULL)->get();
       // return response()->json($stocks);
        return view('auth.dashboards.salesmen.stocks-manage-SM',compact('stocks'));
    }
    public function stock_details($invoice_no){
        $stock_details = DB::table('stocks')
            ->where('salesMen_id','=',Auth::user()->id)
            ->where('user_id','=',Auth::user()->user_id)
            ->where('invoice_no',$invoice_no)
            ->where('medicine_id','!=',NULL)
            ->join('medicine','stocks.medicine_id','medicine.id')
            ->select('stocks.*','medicine.brand_name')->get();

        $total = DB::table('stocks')
            ->where('invoice_no',$invoice_no)
            ->where('total','!=',NULL)->first();
        //return response()->json($stock_details);
        return view('auth.dashboards.salesmen.stock-details-SM',compact('stock_details','total'));
    }
    public function customerManage(){
        $customer = DB::table('sales')
            ->where('salesMen_id','=',Auth::user()->id)
            ->where('user_id','=',Auth::user()->user_id)
            ->where('medicine_id','=',NULL)
            ->orderBy('balance_due','DESC')
            ->get();
        //return response()->json($customer);
        return view('auth.dashboards.salesmen.customer-manage-SM',compact('customer'));
    }
}

