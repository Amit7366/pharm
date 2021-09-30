@extends('auth.dashboards.users.app')
@section('content')
            <div class="layout mt-5">
                <div class="main_content content-widget">

                    <div id="mySidenav" class="sidenav">

                                <div class="chat-top">
                                    <h3>Pharmeex Support Team</h3>
                                    <p>We help your business grow by connecting you to your customers.</p>
                                </div>
                                <div class="user-massage-widget">

                                        <div class="chat-content-lft">
                                        <div class="chat-profile-widget">
                                            <img src="../assets/img/profile.jpg">
                                        </div>
                                        <div class="chat-content-widget">
                                            <p>We help your business grow by connecting you to your customers. We help your business grow by connecting you to your customers.</p>
                                        </div>
                                    </div>
                                    <div class="chat-content-rgt">

                                        <div class="chat-content-widget-rgt">
                                            <p>We help your business grow by connecting you to your customers. We help your business grow by connecting you to your customers.</p>
                                        </div>


                                    </div>
                                    <div class="chat-content-lft">
                                        <div class="chat-profile-widget">
                                            <img src="../assets/img/profile.jpg">
                                        </div>
                                        <div class="chat-content-widget">
                                            <p>We help your business grow by connecting you to your customers. We help your business grow by connecting you to your customers.</p>
                                        </div>
                                    </div>
                                    <div class="chat-content-rgt">

                                        <div class="chat-content-widget-rgt">
                                            <p>We help your business grow by connecting you to your customers. We help your business grow by connecting you to your customers.</p>
                                        </div>



                                    </div>

                                </div>
                                <div class="user-message-input w-100">
                                    <pre></pre>
                                    <textarea placeholder="Type Your Message Here....."></textarea>
                                </div>

                        </div>




                        <span class="side_btn" onclick="openNav()"><i class="fab fa-telegram-plane"></i></span>
                        <span class="side_btn2" onclick="closeNav()"><i class="fas fa-chevron-down"></i></span>




                    <div class="widget">
                        <a class="heading">Company Wise</a>
                        <a class="float-end daterange-m" id="reportrange">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i></a>

                    <div class="main-content-widget">

                                                <div class="table-widget">
                            <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Company Name</th>
                                    <th>Sales</th>
                                    <th>Expenses</th>
                                    <th>Revenue</th>
                                    <th>Profit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Beximco Limited</td>
                                    <td>50</td>
                                    <td>4034</td>
                                    <td>132</td>
                                    <td>12332</td>

                                </tr>

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
