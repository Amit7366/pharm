@extends('auth.dashboards.salesmen.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
        <!-- Optional Main Content Start -->
            <div class="widget">
                <a class="heading bn">Stocks Report</a>
                <p style="margin-bottom: 0"><span style="font-size: 17px">Date: </span> {{$total->invoice_date}}</p>
                <p style="margin-bottom: 0"><span style="font-size: 17px">Total Amount: </span> {{$total->total}} TK.</p>
                <p style="margin-bottom: 0"><span  style="font-size: 17px;">Discount: </span> <span style="color: tomato">{{$total->discount}}% </span></p>
                <p style="margin-bottom: 0"><span  style="font-size: 17px;">Billed Amount: </span> <span>{{$total->billed_amm}} TK.</span></p>
                <p style="margin-bottom: 0"><span  style="font-size: 17px">Paid Amount: </span> {{$total->amount_paid}} TK. </p>
                <p style="margin-bottom: 0"><span  style="font-size: 17px">Due Amount: </span> {{$total->balance_due}} TK. </p>
                <div class="table-widget" style="overflow-x: scroll">
                    <table id="example" class="table table-striped" style="width:100%">
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
                        @forelse($stock_details as $stock_details)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$stock_details->brand_name}}</td>
                                <td>{{$stock_details->quantity}}</td>
                                <td>{{$stock_details->pro_rate}}</td>
                                <td>{{$stock_details->quantity*$stock_details->pro_rate}} TK.</td>
                            </tr>
                        @empty
                        @endforelse

                        </tbody>
                    </table>
                </div>

            </div>

            <!-- Optional Main Content End -->
        </div>
    </div>
@endsection
