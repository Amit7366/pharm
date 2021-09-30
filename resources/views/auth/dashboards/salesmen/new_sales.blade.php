@extends('auth.dashboards.users.app')
@section('content')


    <!--========== MAIN CONTENT AREA START =========-->
    <div class="layout mt-5">
        <div class="main_content content-widget">
            @include('auth.dashboards.users.chatbox')
            <div class="widget">
                <a class="heading">New Sale</a>

                <form class="row g-3 needs-validation mt-1" novalidate>
                    <div class="sub-content-widget">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="validationCustom03" class="form-label">Brand Name</label>
                                <select class="js-example-basic-single" name="state" id="med_list2" required>
                                    <option selected disabled value="">Select Brand Name</option>
                                    @foreach($medicine as $med)
                                        <option value="{{$med->id}}" class="med_item">{{$med->brand_name}} ({{$med->strength}})</option>
                                    @endforeach

                                </select>
                                <input type="hidden" id="brand_name">
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom03" class="form-label">Generic</label>
                                <input type="text" class="form-control" id="generic" readonly required>

                            </div>
                                <input type="hidden" class="form-control" id="stock" readonly required>
                            {{--                        <div class="col-md-2">--}}
                            {{--                            <label for="validationCustom03" class="form-label">Expire Date</label>--}}
                            <input type="hidden" class="form-control" id="expire" readonly required>
                            {{--                        </div>--}}

                            <div class="col-md-2">
                                <label for="validationCustom03" class="form-label">Quantity</label>
                                <input type="text" class="form-control" id="qty" autocomplete="off" onkeypress="return validateNumber(event)" required>
                                <label style="visibility: hidden;color: red;margin-top: 10px" id="mseg"></label>
                            </div>
                            <div class="col-md-2" id="dfdf">
                                <label for="validationCustom03" class="form-label">Rate</label>
                                <input type="text" class="form-control" id="rate" onkeypress="return validateNumber(event)" autocomplete="off" required>

                            </div>
                            <input type="hidden" class="form-control" id="unit_price"  required>

                            <div class="col-md-2">
                                <button class="btn btn-primary addbtn2" type="submit" id="addSale" style="visibility: hidden">Add To Sale</button>
                            </div>

                        </div>
                    </div>
                    <div class="sub-content-widget">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" style="overflow-x: scroll">
                                    <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Price</th>
                                        <th scope="col float-end">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody id="main_content">
                                    @forelse($cart as $product)
                                        <tr class="items">
                                            <th scope="row">{{$loop->index+1}}</th>
                                            <td class="name">{{$product->name}}</td>
                                            <input type="hidden" class="med_id" value="{{$product->id}}">
                                            <td class="qty">{{$product->qty}}</td>
                                            <td class="buying_price" style="display: none">{{$product->options->buying_price}}</td>
                                            <td class="price">{{$product->price}}</td>
                                            <td class="subtotal">{{$product->subtotal}}</td>
                                            <td><a href="newsaledelete/{{$product->rowId}}" id="delete"><span class="trash-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
</svg></span></a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-success text-center" style="font-size: 20px">No Sales Add!</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <table class="balance float-end">
                                    <tr>
                                        <th><span>Total</span></th>
                                        <td><span data-prefix>৳</span><span id="total_am">{{Cart::total()}}</span></td>
                                    </tr>
                                    <tr>
                                        <th><span>Discount</span></th>
                                        <td><span contenteditable id="discount_am" style="padding: 2px 65px;border-bottom: 1px solid gray;padding-left: 0;"></span><span data-prefix>%</span></td>
                                    </tr>
                                    <tr>
                                        <th><span>Billed Amount</span></th>
                                        <td><span data-prefix>৳</span><span id="bill_am">0.00</span></td>
                                    </tr>
                                    <tr>
                                        <th><span>Amount Paid</span></th>
                                        <td><span data-prefix>৳</span><span contenteditable id="amount_paid" style="padding: 2px 65px;border-bottom: 1px solid gray;padding-left: 0;"></span></td>
                                    </tr>
                                    <tr>
                                        <th><span>Balance Due</span></th>
                                        <td><span data-prefix>৳</span><span id="due_am">0</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="sub-content-widget">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="validationCustom03" class="form-label">Invoice Number</label>
                                <input type="text" class="form-control" value="{{$count+1}}" id="invoice_number" autocomplete="off" >

                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom03" class="form-label">Invoice Date</label>
                                <input type="text" class="form-control" id="datepicker" placeholder="dd-mm-yy" required >
                                <div class="invalid-feedback">
                                    Please input Invoice Date.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom03" class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="invoice_supplier" required >
                                <div class="invalid-feedback">
                                    Please input drug supplier.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label  class="form-label">Customer Mobiler</label>
                                <input type="text" class="form-control" id="cust_mob" placeholder="Optional" >
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary btn-medix" id="save_btn2" type="submit"  style="visibility:hidden;">Save</button>
                        <button class="btn btn-primary" type="submit">Print</button>
                    </div>
                </form>
            </div>
            <!-- Optional Main Content Start -->
            <!-- Optional Main Content End -->
        </div>
    </div>
    <!--========== MAIN CONTENT AREA END =========-->
@endsection
