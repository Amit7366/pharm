
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
                <a class="heading">Drug View</a>

                <p style="margin-bottom: 0"><span style="font-size: 17px">Total Stock: </span> {{$drug_view_total->total_stock}} ps.</p>
                <p style="margin-bottom: 0"><span  style="font-size: 17px;">Total price: </span> <span>{{$drug_view_total->total_price}} TK.</span></p>
                <div class="main-content-widget">

                    <div class="table-widget" style="overflow-x: scroll">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Strength</th>
                                <th>Generic</th>
                                <th>Stock</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Expected Profit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($drug_view as $drug_view)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$drug_view->brand_name}}</td>
                                    <td>{{$drug_view->strength}}</td>
                                    <td>{{$drug_view->gname}}</td>
                                    <td>{{$drug_view->stock}}</td>
                                    <td>{{$drug_view->unit_price * $drug_view->stock}}</td>
                                    <td>{{$drug_view->retail_price * $drug_view->stock}}</td>
                                    <td>{{$drug_view->retail_price * $drug_view->stock - $drug_view->unit_price * $drug_view->stock}}</td>
                                </tr>

                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <table>
                        <tr>
                            <td>fdg</td>
                        </tr>
                    </table>
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

