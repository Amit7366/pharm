@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
        @include('auth.dashboards.users.chatbox')
        <!-- Optional Main Content Start -->
            <div class="widget" id="printTable">
                    <table style="width:100%;">
                        <tr>
                            <td>
                                <a class="heading bn">Invoice Details</a>
                                <p style="margin-bottom: 0;margin-top: 10px;"><span style="font-size: 17px">Date: </span> {{$total->invoice_date}}</p>
                                <p style="margin-bottom: 0"><span style="font-size: 17px">Total Amount: </span> {{$total->total}} TK.</p>
                                <p style="margin-bottom: 0"><span  style="font-size: 17px;">Discount: </span> <span style="color: tomato">{{$total->discount}}% </span></p>
                                <p style="margin-bottom: 0"><span  style="font-size: 17px;">Billed Amount: </span> <span>{{$total->billed_amm}} TK.</span></p>
                                <p style="margin-bottom: 0"><span  style="font-size: 17px">Paid Amount: </span> {{$total->amount_paid}} TK. </p>
                                <p style="margin-bottom: 0"><span  style="font-size: 17px">Due Amount: </span> {{$total->balance_due}} TK. </p>
                            </td>
                            <td style="text-align: right">
                                <h4 style="margin-bottom: 0;">{{$user->organization}}</h4>
                                <p>{{$user->address}}</p>
                                <p style="margin-bottom: 0;"><span style="font-size: 17px">Invoice No: </span> <span style="color: tomato"> {{$total->invoice_no}}</span> </p>
                                <p style="margin-bottom: 0;"><span style="font-size: 17px">Customer Name: </span> {{$total->customer_name}}</p>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-striped" style="width:100%;margin-top: 20px" border="1">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Medicine Name</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($invoice_details as $invoice_details)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$invoice_details->brand_name}}</td>
                                <td>{{$invoice_details->quantity}}</td>
                                <td>{{$invoice_details->pro_rate}}</td>
                                <td>{{$invoice_details->quantity*$invoice_details->pro_rate}} TK.</td>
                            </tr>
                        @empty
                        @endforelse


                        </tbody>
                    </table>

                <p style="position: fixed;bottom: 1px;left:50%;transform: translateX(-50%)">Powred By Pharmeex</p>
            </div>
            <button class="btn btn-success" style="margin-top: 10px" id="prnt_btn">Print</button>
            <!-- Optional Main Content End -->
        </div>
    </div>
@endsection
