@extends('auth.dashboards.admins.app')
@section('content')

            <div class="widget-2">
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="main-content-widget">
                            <a class="heading">Users Informations</a>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>User ID:</h5>
                                        <p>0015</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Account Created</h5>
                                        <p>25/08/2021 (Wednesday)</p>
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
                                        <p>Mohammad AlAmin</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Email Address</h5>
                                        <p>mohammad@pharmeex.com</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Phone Number</h5>
                                        <p>01631806631</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Refered By</h5>
                                        <p>NUll</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="main-content-widget">
                            <a class="heading">Organization Informations</a>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Organization Name</h5>
                                        <p>Aushodghor</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Address</h5>
                                        <p>Boyel More, Tekipara, Madhupur, Tangail</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Total Sales Person</h5>
                                        <p>5</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Number Of Medicine</h5>
                                        <p>525362</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Number Of Invoice</h5>
                                        <p>253</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-widget mt-3">
                                        <h5>Supplier</h5>
                                        <p>25</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-content-widget ">
                            <a class="heading">Users Plan</a>
                            <a class="upload-btn float-end"><span></span> Edit</a>

                            <div class="chart-widget mt-3">
                                <div class="plan-widget">

                                    <h5>Plan Using : Starter</h5>
                                    <p>500/Month (7 Days Free Trial)</p>
                                    <h5>Next Billing</h5>
                                    <p>01/09/2021 (Wednesday) </p>
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

@endsection
