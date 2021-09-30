@extends('auth.dashboards.users.app')
@section('content')
<div class="layout mt-5">
    <div class="main_content content-widget">
        @include('auth.dashboards.users.chatbox')
        <div class="widget">
            <a class="heading">Drugs Wise</a>

            <div class="main-content-widget">

                <div class="table-widget" style="overflow-x: scroll">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Brand Name</th>
                            <th>Strength</th>
                            <th>Sales</th>
                            <th>Price</th>
                            <th>Revenue</th>
                            <th>Profit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @forelse($drugs as $drugs)
                            <td>{{$loop->index+1}}</td>
                                <td>{{$drugs->brand_name}}</td>
                                <td>{{$drugs->strength}}</td>
                                <td>{{$drugs->quantity}}</td>
                                <td>{{$drugs->buying_price}}</td>
                                <td>{{$drugs->total}}</td>
                                <td>{{($drugs->total-$drugs->buying_price)-$drugs->discount}}</td>
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
