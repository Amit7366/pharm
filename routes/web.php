<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('request/account', function () {
//    $data = DB::table('plans')->get();
//    return view('request-account',compact('data'));
//})->name('requestAccount');

Route::get('request/account', [App\Http\Controllers\pagesController::class, 'requestaccount'])->name('requestAccount');
Route::post('request/user', [App\Http\Controllers\pagesController::class, 'requestUser'])->name('requestUser');

Route::get('thank/you',[\App\Http\Controllers\pagesController::class,'thankyou']);
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function (){
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function (){
    Route::get('dashboard',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.dashboard');
//medicine crud start
    Route::get('medicine/add',[\App\Http\Controllers\AdminController::class,'AddMEdicine'])->name('AddMEdicine');
    Route::post('medicine',[\App\Http\Controllers\AdminController::class,'medicineInsert'])->name('medicineInsert');
    Route::get('medicine/manage',[\App\Http\Controllers\AdminController::class,'medicineList'])->name('medicineList');
    Route::get('medicine/edit/{medi_id}',[\App\Http\Controllers\AdminController::class,'medicine_edit']);
    Route::post('medicine/update',[\App\Http\Controllers\AdminController::class,'medicineUpdate'])->name('medicineUpdate');
    Route::get('medicine/delete/{medi_id}',[\App\Http\Controllers\AdminController::class,'medicinedelete']);
    Route::get('request/medicine',[\App\Http\Controllers\AdminController::class,'requestMedi'])->name('requestMedi');
    Route::get('request/medicine/active/{id}',[\App\Http\Controllers\AdminController::class,'addMediActive'])->name('addMediActive');

    //medicine crud end
    //user crud start
    Route::get('user/add',[\App\Http\Controllers\AdminController::class,'user_add']);
    Route::post('user',[\App\Http\Controllers\AdminController::class,'userInsert'])->name('userInsert');
    Route::get('user/manage',[\App\Http\Controllers\AdminController::class,'user_manage'])->name('user.manage');
    Route::get('ruser/manage',[\App\Http\Controllers\AdminController::class,'ruser_manage'])->name('ruser.manage');
    Route::get('user/edit/{id}',[\App\Http\Controllers\AdminController::class,'user_edit']);
    Route::post('user/update',[\App\Http\Controllers\AdminController::class,'user_update'])->name('userUpdate');
    Route::get('user/delete/{id}',[\App\Http\Controllers\AdminController::class,'user_delete']);
    Route::get('user/req/delete/{id}',[\App\Http\Controllers\AdminController::class,'Ruser_delete']);
    Route::get('user/update/{id}',[\App\Http\Controllers\AdminController::class,'user_active']);
    Route::get('user/ban/{id}',[\App\Http\Controllers\AdminController::class,'user_ban']);

    //user crud end

// preparation crud start
     Route::get('preparation',[\App\Http\Controllers\AdminController::class,'preparation']);
     Route::post('preparation/insert',[\App\Http\Controllers\AdminController::class,'InsertPreparation'])->name('InsertPreparation');
//preparation creud end

//manufacturer creud start
    Route::get('manufacturer',[\App\Http\Controllers\AdminController::class,'addMenufactur']);
    Route::post('manufactureryy',[\App\Http\Controllers\AdminController::class,'InsertMenuf'])->name('InsertMenuf');
//manufacturer creud end

//generic creud start
    Route::get('generic',[\App\Http\Controllers\AdminController::class,'generic']);
    Route::post('generic/insert',[\App\Http\Controllers\AdminController::class,'InsertGeneric'])->name('InsertGeneric');
    Route::get('group',[\App\Http\Controllers\AdminController::class,'group']);
//generic creud end


    Route::get('user/view/{id}',[\App\Http\Controllers\AdminController::class,'user_view']);

      Route::get('userlist',[\App\Http\Controllers\AdminController::class,'userlist']);
    Route::get('usermessage/{id}',[\App\Http\Controllers\AdminController::class,'usermessage']);
    Route::post('messages',[\App\Http\Controllers\AdminController::class,'message']);


    Route::get('user/payments',[\App\Http\Controllers\AdminController::class,'payments']);



});

Route::group(['prefix'=>'salesmen','middleware'=>['isSalesMen','auth','PreventBackHistory']],function (){
    Route::get('dashboard',[\App\Http\Controllers\salesMenController::class,'index'])->name('salesmen.dashboard');
    Route::get('sales',[\App\Http\Controllers\salesMenController::class,'sales']);
    Route::get('salesMen/stock/add',[\App\Http\Controllers\salesMenController::class,'salesMenstock'])->name('SalesMenNewStock');
    Route::post('add-new-stock',[\App\Http\Controllers\salesMenController::class,'add_new_stock']);
    Route::get('get-med-info',[\App\Http\Controllers\salesMenController::class,'get_med_info']);
    Route::get('get-med-info2',[\App\Http\Controllers\salesMenController::class,'get_med_info2']);
    Route::post('add-new-sale',[\App\Http\Controllers\salesMenController::class,'add_new_sale']);
    Route::get('stock/newstockdelete/{id}',[\App\Http\Controllers\salesMenController::class,'new_stock_delete']);
    Route::get('newsaledelete/{id}',[\App\Http\Controllers\salesMenController::class,'new_sale_delete']);
    Route::post('stock/add',[\App\Http\Controllers\salesMenController::class,'new_stock_add']);
    Route::post('stock/add2',[\App\Http\Controllers\salesMenController::class,'new_stock_add2']);
    Route::post('sale/add',[\App\Http\Controllers\salesMenController::class,'new_sale_add']);
    Route::post('sale/add2',[\App\Http\Controllers\salesMenController::class,'new_sale_add2']);
    Route::get('stock/empty',[\App\Http\Controllers\salesMenController::class,'empty_cart']);
    Route::get('sale/manage',[\App\Http\Controllers\salesMenController::class,'new_sale_manage'])->name('saleMange');
    Route::get('sale/details/{invoice_no}',[\App\Http\Controllers\salesMenController::class,'sele_details']);
    Route::get('newsaledelete/{id}',[\App\Http\Controllers\salesMenController::class,'new_sale_delete']);

    Route::get('stock/manage',[\App\Http\Controllers\salesMenController::class,'new_stock_manage'])->name('SalesMenstockMange');
    Route::get('stock/delete/{invoice_no}',[\App\Http\Controllers\salesMenController::class,'stock_delete'])->name('stock_delete');
    Route::get('stock/details/{invoice_no}',[\App\Http\Controllers\salesMenController::class,'stock_details']);

    Route::get('customers/manage',[\App\Http\Controllers\salesMenController::class,'customerManage'])->name('customerManageSM');
});

Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']],function (){
    Route::get('dashboard',[\App\Http\Controllers\UserController::class,'index'])->name('user.dashboard');
    Route::get('stock/new',[\App\Http\Controllers\UserController::class,'NewStock'])->name('NewStock');
    Route::get('sales',[\App\Http\Controllers\UserController::class,'sales']);
    Route::get('expire/medicine',[\App\Http\Controllers\UserController::class,'expireMedicine'])->name('expireMedicine');
    //return sales
    Route::get('return/sales/{invoice_no}',[\App\Http\Controllers\UserController::class,'return_sales']);
    Route::post('return/sales/insert',[\App\Http\Controllers\UserController::class,'returnSale'])->name('returnSale');
    //customer crud
    Route::get('customers/manage',[\App\Http\Controllers\UserController::class,'customerManage'])->name('customerManage');
    Route::get('request/medicine',[\App\Http\Controllers\UserController::class,'request_medicine'])->name('request.medicine');
    Route::post('request/medicine/insert',[\App\Http\Controllers\UserController::class,'requestMedicine'])->name('requestMedicine');
    //customer

    //add salesMan start
    Route::get('add/salesMan',[\App\Http\Controllers\UserController::class,'add_salesMan']);
    Route::post('salesMan/Insert',[\App\Http\Controllers\UserController::class,'salesMenInsert'])->name('salesMenInsert');
    Route::get('manage/salesMan',[\App\Http\Controllers\UserController::class,'manage_salesMan'])->name('salesmenlist');
    Route::get('salesMen/edit/{id}',[\App\Http\Controllers\UserController::class,'salesMen_edit']);
    Route::post('salesMen/update',[\App\Http\Controllers\UserController::class,'salesMenUpdate'])->name('salesMenUpdate');
    Route::get('salesMen/delete/{id}',[\App\Http\Controllers\UserController::class,'salesMenDelete']);
    Route::get('get-med-info',[\App\Http\Controllers\UserController::class,'get_med_info']);
    Route::get('get-med-info2',[\App\Http\Controllers\UserController::class,'get_med_info2']);
    Route::post('add-new-stock',[\App\Http\Controllers\UserController::class,'add_new_stock']);
    Route::get('stock/newstockdelete/{id}',[\App\Http\Controllers\UserController::class,'new_stock_delete']);
    Route::post('stock/add',[\App\Http\Controllers\UserController::class,'new_stock_add']);
    Route::post('stock/add2',[\App\Http\Controllers\UserController::class,'new_stock_add2']);

    Route::get('my/account',[\App\Http\Controllers\UserController::class,'MyAccount'])->name('MyAccount');

    Route::get('stock/manage',[\App\Http\Controllers\UserController::class,'new_stock_manage'])->name('stockMange');
    Route::get('stock/delete/{invoice_no}',[\App\Http\Controllers\UserController::class,'stock_delete'])->name('stock_delete');

    Route::get('stock/details/{invoice_no}',[\App\Http\Controllers\UserController::class,'stock_details']);
    Route::get('stock/empty',[\App\Http\Controllers\UserController::class,'empty_cart']);
    Route::get('drug/view',[\App\Http\Controllers\UserController::class,'drug_view']);

    Route::post('add-new-sale',[\App\Http\Controllers\UserController::class,'add_new_sale']);
    Route::post('sale/add',[\App\Http\Controllers\UserController::class,'new_sale_add']);
    Route::post('sale/add2',[\App\Http\Controllers\UserController::class,'new_sale_add2']);
    Route::get('sale/manage',[\App\Http\Controllers\UserController::class,'new_sale_manage'])->name('saleMange');
    Route::get('sale/details/{invoice_no}',[\App\Http\Controllers\UserController::class,'sele_details']);
    Route::get('newsaledelete/{id}',[\App\Http\Controllers\UserController::class,'new_sale_delete']);

    Route::get('test',[\App\Http\Controllers\UserController::class,'test']);
    Route::get('dd',[\App\Http\Controllers\UserController::class,'dd']);
    //Due Paid
    Route::get('due/paid/{invoice_no}',[\App\Http\Controllers\UserController::class,'paidDue']);
    Route::post('due/paid/insert',[\App\Http\Controllers\UserController::class,'InsertDueAmount'])->name('InsertDueAmount');

    //suplaier crud start
    Route::get('supplier/add',[\App\Http\Controllers\UserController::class,'addSuplaier'])->name('addSuplaier');
    Route::post('supplier/insert',[\App\Http\Controllers\UserController::class,'suplaierInsert'])->name('suplaierInsert');
    Route::get('supplier/manage',[\App\Http\Controllers\UserController::class,'manageSuplaier'])->name('manageSuplaier');
    Route::get('supplier/edit/{id}',[\App\Http\Controllers\UserController::class,'suplaierEdit'])->name('suplaierEdit');
    Route::post('supplier/update',[\App\Http\Controllers\UserController::class,'suplaierUpdate'])->name('suplaierUpdate');
    Route::get('supplier/delete/{id}',[\App\Http\Controllers\UserController::class,'suplaierDeleted'])->name('suplaierDeleted');

    //suplaier crud end

    Route::get('reports/daily',[\App\Http\Controllers\UserController::class,'dailyReports'])->name('dailyReports');
        Route::get('reports/monthly',[\App\Http\Controllers\UserController::class,'MonthlyReports'])->name('MonthlyReports');
    Route::get('reports/company',[\App\Http\Controllers\UserController::class,'CompanyReports'])->name('CompanyReports');
    Route::get('reports/drugs',[\App\Http\Controllers\UserController::class,'DrugsReports'])->name('DrugsReports');

//Accounts Details
    Route::get('invoice/manage',[\App\Http\Controllers\UserController::class,'invoice_list'])->name('invoice_list');
    Route::get('invoice/details/{invoice_no}',[\App\Http\Controllers\UserController::class,'invoice_details'])->name('invoice_details');
    Route::get('invoice/details2/{invoice_no}',[\App\Http\Controllers\UserController::class,'invoice_details2'])->name('invoice_details2');



    Route::get('salary/manage',[\App\Http\Controllers\UserController::class,'manageSalary'])->name('manageSalary');
    Route::post('salary/insert',[\App\Http\Controllers\UserController::class,'InsertSalary'])->name('InsertSalary');
    Route::get('salary/edit/{id}',[\App\Http\Controllers\UserController::class,'SalaryEdit'])->name('SalaryEdit');
    Route::post('salary/update',[\App\Http\Controllers\UserController::class,'UpdateSalary'])->name('UpdateSalary');
    Route::get('salary/delete/{id}',[\App\Http\Controllers\UserController::class,'DeleteSalary'])->name('DeleteSalary');

    Route::get('rent/manage',[\App\Http\Controllers\UserController::class,'manageRent'])->name('manageRent');
    Route::post('rent/insert',[\App\Http\Controllers\UserController::class,'InsertRent'])->name('InsertRent');
    Route::get('rent/edit/{id}',[\App\Http\Controllers\UserController::class,'RentEdit'])->name('RentEdit');
    Route::post('rent/update',[\App\Http\Controllers\UserController::class,'UpdateRent'])->name('UpdateRent');
    Route::get('rent/delete/{id}',[\App\Http\Controllers\UserController::class,'DeleteRent'])->name('DeleteRent');


    Route::get('others/manage',[\App\Http\Controllers\UserController::class,'manageOthers'])->name('manageOthers');
    Route::post('others/insert',[\App\Http\Controllers\UserController::class,'Insertother'])->name('Insertother');
    Route::get('others/edit/{id}',[\App\Http\Controllers\UserController::class,'Editother'])->name('Editother');
    Route::post('others/update',[\App\Http\Controllers\UserController::class,'Updateother'])->name('Updateother');
    Route::get('others/delete/{id}',[\App\Http\Controllers\UserController::class,'Deleteother'])->name('Deleteother');


    Route::get('opening/balance',[\App\Http\Controllers\UserController::class,'openingBalance'])->name('openingBalance');
    Route::post('opening/balance/insert',[\App\Http\Controllers\UserController::class,'InsertopeningBalance'])->name('InsertopeningBalance');
    //Accounts Details End

    //add salesMan end

    Route::post('messages',[\App\Http\Controllers\UserController::class,'messages'])->name('messages');
    Route::get('get-messages',[\App\Http\Controllers\UserController::class,'get_messages'])->name('get.messages');
    Route::get('payment',[\App\Http\Controllers\UserController::class,'payment'])->name('payment');
    Route::post('give-payment',[\App\Http\Controllers\UserController::class,'give_payment']);


});



Route::group(['prefix'=>'management','middleware'=>['isManagement','auth','PreventBackHistory']],function (){
    Route::get('dashboard',[\App\Http\Controllers\ManagementController::class,'index'])->name('management.dashboard');

});


Route::get('plan/{id}',[\App\Http\Controllers\UserController::class,'plan']);
Route::post('add-req',[\App\Http\Controllers\UserController::class,'add_req']);
