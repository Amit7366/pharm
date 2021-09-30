@extends('auth.dashboards.salesmen.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">

            <div class="widget">
                <a class="heading">Customer List</a>
                <div class="main-content-widget">
                    <div class="table-widget" style="overflow-x: scroll">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Due amount</th>
                                <th>Invoice No</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($customer as $customer)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$customer->customer_name}}</td>
                                    <td>{{$customer->balance_due}}</td>
                                    <td><a href="">{{$customer->invoice_no}}</a></td>
{{--                                    @if($customer->balance_due == 0)--}}
{{--                                        <td><a class="btn btn-success">No Due</a></td>--}}
{{--                                    @else--}}
{{--                                        <td><a href="{{url('user/due/paid/'.$customer->invoice_no)}}" class="btn btn-danger">Paid</a></td>--}}
{{--                                    @endif--}}
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- Optional Main Content Start -->

            <!-- Optional Main Content End -->
            <!-- Footer -content start -->
            <footer class="main-content-widget">
                <span class="text-start">Developed By ROIvisor Inc.</span>
                <span class="float-end" >&copy; Copyright 2021, Pharmeex Ltd.</span>
            </footer>
            <!-- Footer -content end -->
        </div>
    </div>
@endsection

