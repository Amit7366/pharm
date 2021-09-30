@extends('auth.dashboards.users.app')
@section('content')
            <div class="layout mt-5">
                <div class="main_content content-widget">
                    @include('auth.dashboards.users.chatbox')

                    <div class="widget">
                        <a class="heading">Date Wise</a>
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
                            @forelse($daliy as $daliy)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$daliy->date}}</td>
                                    <td>{{$daliy->quantity}}</td>
                                    <td>{{round($daliy->buying_total)}}</td>
                                    <td>{{$daliy->total}}</td>
                                    <td class="text-success">{{$daliy->total - $daliy->buying_total}}</td>
                                    <td class="text-danger">{{$daliy->balance_due }}</td>

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

