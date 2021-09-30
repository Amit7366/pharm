@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
            @include('auth.dashboards.users.chatbox')
            <div class="widget-2">
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="main-content-widget">
                            <a class="heading">Users Informations</a>
                            <a class="upload-btn float-end"><span></span> Edit</a>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>User ID: </h5>
                                        <p>{{ str_replace('-','',\Carbon\Carbon::parse($users->created_at)->format('h-m-s'))}} </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Account Created</h5>
                                        <p>{{\Carbon\Carbon::parse($users->created_at)->format('d-m-Y')}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Approved By</h5>
                                        <p>Amit Sigha</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Full Name</h5>
                                        <p>{{$users->name}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Email Address</h5>
                                        <p>{{$users->email}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Phone Number</h5>
                                        <p>{{$users->phone}}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Referred By</h5>
                                        <p>NUll</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="main-content-widget">
                            <a class="heading">Organization Information</a>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Organization Name</h5>
                                        <p>{{$users->organization}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Address</h5>
                                        <p>{{$users->address.', '.$users->thana.', '.$users->zila}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Total Sales Person</h5>
                                        <p>{{$salesMen}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Number Of Medicine</h5>
                                        <p>{{$count}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Number Of Invoice</h5>
                                        <p>{{$invoice_no}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Supplier</h5>
                                        <p>{{$Supplier}}</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-content-widget ">
                            <a class="heading">Users Plan</a>
                            <div class="chart-widget mt-3">
                                <div class="plan-widget">

                                    <h5>Plan Using : Starter</h5>
                                    <p>{{$users->plan_name}}</p>
                                    <h5>Next Billing</h5>
                                    <p>{{\Carbon\Carbon::parse($users->email_verified_at)->format('d-m-Y')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -content start -->
            <footer class="main-content-widget">
                <span class="text-start">Developed By ROIvisor Inc.</span>
                <span class="float-end" >&copy; Copyright 2021, Pharmeex Ltd.</span>
            </footer>
            <!-- Footer -content end -->
        </div>
    </div>






    <!-- Optional Main Content End -->


@endsection
