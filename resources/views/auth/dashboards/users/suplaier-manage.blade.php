
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
                <a class="heading">Supplier List</a>
                <a class="float-end daterange-m" id="reportrange">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i></a>

                <div class="main-content-widget">

                    <div class="table-widget" style="overflow-x: scroll">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                             <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($suplaier as $suplaier)
                           <tr>
                               <td>{{$loop->index+1}}</td>
                               <td>{{$suplaier->name}}</td>
                               <td>{{$suplaier->position}}</td>
                               <td>{{$suplaier->company}}</td>
                               <td>{{$suplaier->email}}</td>
                               <td>{{$suplaier->phone_num}}</td>
                               <td>
                                   <a href="{{url('user/supplier/edit/'.$suplaier->id)}}"><span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></span></a>
                                   <a href="{{url('user/supplier/delete/'.$suplaier->id)}}" id="delete"><span class="trash-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg></span></a>
                               </td>
                           </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-danger text-center" style="font-size: 20px;font-weight: bold">No Suplaier Data</td>
                                </tr>
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

