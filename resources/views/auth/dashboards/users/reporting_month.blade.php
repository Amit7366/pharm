@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
            @include('auth.dashboards.users.chatbox')

            <div class="widget">
                <a class="heading">Monthly Data</a>
                <div class="main-content-widget">
                    <div class="table-widget" style="overflow-x: scroll">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Date</th>
                                <th>Sales</th>
                                <th>Buying Price</th>
                                <th>Revenue</th>
                                <th>Profit</th>
                                <th>Due</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($monthly as $monthly)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>@foreach ($month as $key)
                                            @if($key->id == $monthly->month)
                                                {{$key->month_name}}
                                            @endif
                                        @endforeach</td>
                                    <td>{{round($monthly->quantity,2)}}</td>
                                    <td>{{round($monthly->buying_total,2)}}</td>
                                    <td>{{round($monthly->amount_paid,2)}}</td>
                                    <td>{{round($monthly->amount_paid-($monthly->buying_total+$monthly->balance_due),2)}}</td>
                                    <td>{{round($monthly->balance_due,2)}}</td>
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

