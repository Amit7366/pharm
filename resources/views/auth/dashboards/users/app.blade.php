<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RTK1J24RST"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-RTK1J24RST');
</script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dataTables.bootstrap5.min.js')}}" rel="stylesheet">
    <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title>Pharmeex - Modern Pharmecy Management Software</title>
</head>
<body>
<div class="page-wrapper toggled">
    <div class="wrapper">
        <!--==================== SIDEBAR AREA START HERE ===================-->
        <!--==================== SIDEBAR AREA START HERE ===================-->
        <div class="sidebar">
            <div class="bg_shadow"></div>
            <div class="sidebar_inner">


                <div class="profile_info side-logo">
                    <a href="{{url('user/dashboard')}}">
                        <img src="{{url('assets/img/logo.png')}}" alt="">
                    </a>
                </div>

                <div class="shadow-sidebar">
                    <div class="scroll-list">
                        <div class="ex1">
                            <ul class="el-tab siderbar_menu el-dashboard">
                                <li class="active el-side">
                                    <a href="{{url('user/dashboard')}}" class="{{ Request::is('user/dashboard') ? 'el-side-dash' : '' }}">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-grid-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z" />
                                            </svg>
                                        </div>
                                        <div class="">Dashboard</div>
                                    </a>
                                </li>
                                <li class="sidebar-dropdown @if(Request::is('user/reports/daily') || Request::is('user/reports/drugs')) active @endif">
                                    <a href="#" class="">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M0 0h1v15h15v1H0V0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5z" />
                                            </svg>
                                        </div>
                                        <div class="title">Reporting</div>

                                    </a>
                                    <ul class="accordion">
                                        <li><a href="{{route('dailyReports')}}" class="{{ Request::is('user/reports/daily') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i class="far fa-circle"></i></span> Daily</a></li>
                                        <li><a href="{{route('MonthlyReports')}}" class="{{ Request::is('user/reports/monthly') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i class="far fa-circle"></i></span> Monthly</a></li>
                                        {{--                                        <li><a href="{{route('CompanyReports')}}"><span class="circle-icon"><i class="far fa-circle"></i></span> Company</a></li>--}}
                                        <li><a href="{{route('DrugsReports')}}" class="{{ Request::is('user/reports/drugs') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i class="far fa-circle"></i></span> Drug</a></li>

                                    </ul>
                                </li>
                                <li class="sidebar-dropdown  @if(Request::is('user/sales') || Request::is('user/sale/manage'))
                                    active
@endif">
                                    <a href="#">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-dash" viewBox="0 0 16 16">
  <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>
                                        </div>
                                        <div class="title">Sales</div>

                                    </a>
                                    <ul class="accordion">
                                        <li><a href="{{url('user/sales')}}" class="{{ Request::is('user/sales') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i
                                                        class="far fa-circle"></i></span>New Sales</a></li>
                                        <li><a href="{{url('user/sale/manage')}}"class="{{ Request::is('user/sale/manage') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i
                                                        class="far fa-circle"></i></span> Sales Manage</a></li>

                                    </ul>

                                </li>
                                <li class="sidebar-dropdown @if(Request::is('user/stock/new') || Request::is('user/stock/manage')|| Request::is('user/request/medicine'))
                                    active

@endif">
                                    <a href="#">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
  <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>
                                        </div>
                                        <div class="title">Stocks</div>

                                    </a>
                                    <ul class="accordion">
                                        <li><a href="{{route('NewStock')}}"  class="{{ Request::is('user/stock/new') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i
                                                        class="far fa-circle"></i></span>New Stock</a></li>

                                        <li><a href="{{route('stockMange')}}" class="{{ Request::is('user/stock/manage') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i
                                                        class="far fa-circle"></i></span> Stock Manage</a></li>
                                        <li><a href="{{route('request.medicine')}}"  class="{{ Request::is('user/request/medicine') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i
                                                        class="far fa-circle"></i></span>Request Medicine</a></li>

                                    </ul>

                                </li>
                                <li class="sidebar-dropdown @if(Request::is('user/customers/manage'))
                                    active

@endif">
                                    <a href="#">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                            </svg>
                                        </div>
                                        <div class="title">Customers</div>
                                    </a>
                                    <ul class="accordion">
                                        {{--                                        <li><a href="#"><span class="circle-icon"><i--}}
                                        {{--                                                        class="far fa-circle"></i></span>New Customer</a></li>--}}
                                        <li><a href="{{route('customerManage')}}"class="{{ Request::is('user/customers/manage') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i
                                                        class="far fa-circle"></i></span> Customer Manage</a></li>
                                    </ul>
                                </li>

                                <li class="sidebar-dropdown @if(Request::is('user/supplier/add') || Request::is('user/supplier/manage'))
                                    active

@endif">
                                    <a href="#">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
  <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
</svg>
                                        </div>
                                        <div class="title">Supplier</div>
                                    </a>
                                    <ul class="accordion">
                                        <li><a href="{{route('addSuplaier')}}"class="{{ Request::is('user/supplier/add') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i
                                                        class="far fa-circle"></i></span>Add Supplier</a></li>
                                        <li><a href="{{route('manageSuplaier')}}"class="{{ Request::is('user/supplier/manage') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i
                                                        class="far fa-circle"></i></span>Manage Supplier</a></li>
                                    </ul>
                                </li>

                                <!--<li class="sidebar-dropdown">-->
                                <!--    <a href="#">-->
                                <!--        <div class="icon">-->
                                <!--            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">-->
                                <!--                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>-->
                                <!--            </svg>-->
                                <!--        </div>-->
                                <!--        <div class="title">Sales Man</div>-->

                                <!--    </a>-->
                                <!--    <ul class="accordion">-->
                            <!--        <li><a href="{{url('user/add/salesMan')}}"><span class="circle-icon"><i-->
                                <!--                        class="far fa-circle"></i></span>New Sales Man</a></li>-->
                            <!--        <li><a href="{{url('user/manage/salesMan')}}"><span class="circle-icon"><i-->
                                <!--                        class="far fa-circle"></i></span> Sales Man Manage</a></li>-->

                                <!--    </ul>-->

                                <!--</li>-->
                                <li class="sidebar-dropdown @if(Request::is('user/invoice/manage') || Request::is('user/salary/manage')|| Request::is('user/rent/manage')|| Request::is('user/others/manage')|| Request::is('user/opening/balance'))
                                    active

@endif">
                                    <a href="#">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
  <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
</svg>
                                        </div>
                                        <div class="title">Accounts</div>

                                    </a>
                                    <ul class="accordion">
                                        <li><a href="{{route('invoice_list')}}"class="{{ Request::is('user/invoice/manage') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i class="far fa-circle"></i></span>Invoice</a></li>
{{--                                        <li><a href="{{route('manageSalary')}}"class="{{ Request::is('user/salary/manage') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i class="far fa-circle"></i></span>Salary</a></li>--}}
                                        <li><a href="{{route('manageRent')}}"class="{{ Request::is('user/rent/manage') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i class="far fa-circle"></i></span>Rent</a></li>
                                        <li><a href="{{route('manageOthers')}}"class="{{ Request::is('user/others/manage') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i class="far fa-circle"></i></span>Other's</a></li>
                                        <li><a href="{{route('openingBalance')}}"class="{{ Request::is('user/opening/balance') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i class="far fa-circle"></i></span>Opening Balance</a></li>
                                    </ul>

                                </li>

                                {{--                                <li class="sidebar-dropdown">--}}
                                {{--                                    <a href="#">--}}
                                {{--                                        <div class="icon">--}}
                                {{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">--}}
                                {{--                                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>--}}
                                {{--                                            </svg>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="title">Payroll</div>--}}

                                {{--                                    </a>--}}

                                {{--                                </li>--}}
                                {{--                                <li class="sidebar-dropdown">--}}
                                {{--                                    <a href="#">--}}
                                {{--                                        <div class="icon">--}}
                                {{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">--}}
                                {{--                                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>--}}
                                {{--                                            </svg>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="title">Directory</div>--}}

                                {{--                                    </a>--}}

                                {{--                                </li>--}}

                                <li class="sidebar-dropdown @if(Request::is('user/my/account')|| Request::is('user/payment'))
                                    active

@endif">
                                    <a href="#">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                            </svg>
                                        </div>
                                        <div class="title">Setting</div>

                                    </a>
                                    <ul class="accordion">
                                        <li><a href="{{route('MyAccount')}}"class="{{ Request::is('user/my/account') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i
                                                        class="far fa-circle"></i></span>My Account</a></li>
                                        <li><a href="{{url('user/payment')}}"class="{{ Request::is('user/payment') ? 'el-side-dash text-white' : '' }}"><span class="circle-icon"><i class="far fa-circle"></i></span> Payment</a></li>
                                    </ul>

                                </li>
                                 <li class="active el-side">
                                    <a href="https://youtu.be/EcI1VeerE_k" target="_blank" class="">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-play" viewBox="0 0 16 16">
                                                <path d="M6 10.117V5.883a.5.5 0 0 1 .757-.429l3.528 2.117a.5.5 0 0 1 0 .858l-3.528 2.117a.5.5 0 0 1-.757-.43z"/>
                                                <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </div>
                                        <div class="">Video Tutorial</div>
                                    </a>
                                </li>
                            </ul>
                            <div class="side-logout">
                                <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg>
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==================== SIDEBAR AREA END HERE ===================-->

        <!--==================== SIDEBAR AREA END HERE ===================-->


        <!--========== HEADER AREA START =========-->
        <div class="navbar-area">
            <nav class="navbar navbar-expand navbar-light main-header bg-white topbar fixed-top">


                <!-- <a href="#" class="logo">EXOTICLEAD</a> -->

                <div class="hamburger">
                    <i class="fas fa-bars"></i>
                </div>

                <div class="form-group has-search top-search ">
                    <input type="text" class="" placeholder="Search">
                </div>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav home-nav-list ms-auto">
                    <!--========= SEARCH AREA =========-->

                    <li class="nav-item dropdown menu-item no-arrow search-top ">
                        <a href="#" class="search-btn">
                            <div class="icon-bg search-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                     class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </div>
                        </a>
                        <div class="search-box search-elem">
                            <button class="search-close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path
                                        d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
                                </svg>
                            </button>
                            <div class="inner row">
                                <div class="small-12 columns">
                                    <label class="placeholder" for="search-field">Search</label>
                                    <input type="text" id="search-field">
                                    <button class="submit" type="submit">Search</button>
                                </div>
                            </div>
                        </div>

                    </li>

                    <!-- Nav Item - Country -->
                    <li class="nav-item dropdown menu-item no-arrow ">

                        <a class="drop-icon me-3" href="#" role="button" id="dropdownMenuLink"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="icon-bg flgs">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z"/>
                                </svg>
                            </div>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item flg_itm" href="#">
                                <span class="dfd"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i></span>

                                <span>English</span>
                            </a>
                            <a class="dropdown-item flg_itm" href="#">
                                <span class="dfd"><i class="fas fa-train fa-sm fa-fw mr-2 text-gray-400"></i></span>
                                <span>Bangla</span>
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>




                        </div>

                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown menu-item no-arrow ">

                        <a class="drop-icon me-3" href="#" role="button" id="dropdownMenuLink"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="icon-bg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                </svg>
                            </div>

                        </a>

                    </li>


                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown menu-item no-arrow ">
                        <!-- <button class="right-side-button" @click="rightSide = !rightSide">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            </button> -->
                        <a href="#" class="right-side-button" @click="rightSide = !rightSide">
                            <div class="icon-bg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                     class="bi bi-chat" viewBox="0 0 16 16">
                                    <path
                                        d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                </svg>
                            </div>

                        </a>

                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow nav-fprofile pfofile-dropdown header-profile">

                        <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <!-- <span class="me-2 d-none d-lg-inline text-gray-600 small">Abdullah Al Mamun</span> -->
                            <img class="img-profile " src="{{asset('assets/img/profile.jpg')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile({{\Illuminate\Support\Facades\Auth::user()->name}})
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>


                        </div>
                    </li>

                </ul>

            </nav>
        </div>
        <!--========== HEADER AREA END =========-->

@yield('content')




    </div>
</div>




<!-- Optional JavaScript; choose one of the two! -->


<!--jQuery-->
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

<!--Popper JS-->
<script src="{{asset('assets/js/popper.min.js')}}"></script>

<!--Bootstrap JS-->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!--Popper JS-->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('assets/js/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/select2.min.js')}}"></script>


<script src="{{asset('assets/js/custom-apexcharts.js')}}"></script>
<script src="{{asset('assets/js/test.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<!--Main JS-->
<script src="{{asset('assets/js/main.js')}}"></script>

<script src="{{asset('assets/js/script.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
        @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case "success":
            toastr.success("{{Session::get('message')}}");
            break;
        case "error":
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>
<script>
    function validateNumber(e) {
        const pattern = /^[0-9]$/;
        return pattern.test(e.key )
    }
</script>
<script>
    $("#datepicker2").datepicker( {
        format: "mm-yyyy",
        startView: "months",
        minViewMode: "months"
    });
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

    $(document).ready(function() {
        closeNav();
        $('#datepicker').datepicker({
            dateFormat: 'dd-mm-yy'
            });
            $('#expire_date').datepicker({
            dateFormat: 'dd-mm-yy'
            });
        $('#datepicker').datepicker('setDate', 'today');
        $('.side_btn2').css('display','none');
        $( "#datepicker" ).datepicker({
            dateFormat: 'dd-mm-yy',
            onSelect: function(dateText, inst) {
                $(inst).val(dateText); // Write the value in the input
            }
        });
        $( "#expire_date" ).datepicker({
            dateFormat: 'dd-mm-yy',
            onSelect: function(dateText, inst) {
                $(inst).val(dateText); // Write the value in the input
            }
        });


        $('.js-example-basic-single').select2();
        $('select').select2({
            width: '100%'
        });
    });
</script>
<script>
    $(document).on('click','#delete', function (e) {
        e.preventDefault();
        var link=$(this).attr('href');
        swal({
            title: "Are you want to delete?",
            Text: "Once Delete, This will be Permanently Delete!",
            icon: "warning",
            buttons:true,
            dangerMode:true,
        })
            .then((willDelete)=>{
                if(willDelete){
                    window.location.href=link;
                }else{
                    swal("Safe Data!");
                }
            })
    })
</script>
<script>

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<script>
    function openNav() {
        $('#mySidenav').animate({height:561},200);
        $('.side_btn2').css('display','block');
        $('.side_btn').css('display','none');

        var dfdf = $('.user-massage-widget').prop("scrollHeight")
        //console.log(dfdf);
        $( ".user-massage-widget" ).scrollTop(dfdf);
    }
    function closeNav() {
        $('#mySidenav').css({height:0},200);
        $('.side_btn2').css('display','none');
        $('.side_btn').css('display','block');
    }
</script>
{{--select change function--}}
<script>
    $(document).ready(function() {
        $(".user-massage-widget").stop().animate({ scrollTop: $(".user-massage-widget")[0].scrollHeight}, 1000);
       });
</script>
<script>
    $(document).ready(function() {


        $('.tab-content').hide();
//show the first tab content
        $('#tab-1').show();

        $('#select-box').change(function () {
            dropdown = $('#select-box').val();
            //first hide all tabs again when a new option is selected
            $('.tab-content').hide();
            //then show the tab content of whatever option value was selected
            $('#' + "tab-" + dropdown).show();
        });


        var i = 0;
        $(".subtotal").each(function() {
            i = i + parseFloat($(this).text());
        });
        $('#bill_am').text(i.toFixed(2));
        $("#due_am").text(i.toFixed(2));
        $('#med_list').on('change', function() {
            var med_id = this.value ;
            //var med_id = $("#med_list").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = "/user/get-med-info";
            //console.log(cid);
            $.ajax({
                type:'get',
                url:url,
                data:{medcine_id:med_id},
                dataType: 'json',
                success:function(dataResult){
                    console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData = '';
                    // $.each(resultData,function(index,row){});
                    $('#generic').val(resultData.gname);
                    $('#brand_name').val(resultData.brand_name);
                }
            });
        });
        $('#med_list2').on('change', function() {
            var med_id = this.value ;
            //var med_id = $("#med_list").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = "/user/get-med-info2";
            //console.log(cid);
            $.ajax({
                type:'get',
                url:url,
                data:{medcine_id:med_id},
                dataType: 'json',
                success:function(dataResult){
                    var resultData = dataResult.data;
                    var bodyData = '';
                    // $.each(resultData,function(index,row){});
                    $('#generic').val(resultData.gname);
                    $('#stock').val(resultData.stock);
                    $('#brand_name').val(resultData.brand_name);
                    $('#expire').val(resultData.brand_name);
                    $('#rate').val(resultData.retail_price);
                    $('#unit_price').val(resultData.unit_price);
                    //$('#rate').val(resultData.retail_price);
                }
            });
        });
        $('#rate').keyup(function () {
            var value = $(this).val();
            if (value != '' && value != 0){
                $('#addbutton').css('visibility','visible');
            }else{
                $('#addbutton').css('visibility','hidden');
            }
        });
        $('#qty').keyup(function () {
            var value = $(this).val();
            var stock = parseInt($('#stock').val());
            if (value != '' && value != 0){
                $('#addSale').css('visibility','visible');
            }else{
                $('#addSale').css('visibility','hidden');
                $('#mseg').css('visibility','hidden');
            }
            if (stock >= parseInt(value)){
                $('#mseg').css('visibility','hidden');
                $('#addSale').css('visibility','visible');
            }else{
                $('#mseg').text('Your Stock is Low. Current Stock '+ stock);
                $('#mseg').css('visibility','visible');
                $('#addSale').css('visibility','hidden');
            }
        });
        //stock save button
        $(".addbtn").on("click", function() {
            $("#main_content").empty();
            var med_id = $("#med_list").val();
            var qty = $("#qty").val();
            var rate = $("#rate").val();
            var brand_name = $("#brand_name").val();
            var expire_date = $("#expire_date").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = "/user/add-new-stock";
            $.ajax({
                type:'post',
                url:url,
                data:{
                    medcine_id:med_id,
                    qty:qty,
                    rate:rate,
                    brand_name:brand_name,
                    expire_date:expire_date,

                },
                dataType: 'json',
                success:function(dataResult){

                    console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData = '';
                    var indexs = 1;
                    $.each(resultData,function(index,row){

                        bodyData +="<tr  class=\"items\">" +
                            "<th scope=\"row\">"+indexs+"</th>" +
                            "<td class=\"name\">"+row.name+"</td>" +
                            "<td class=\"ex_date\">"+row.options.size+"</td>" +
                            "<input type='hidden' class=\"med_id\" value='"+row.id+"'>" +
                            "<td class=\"qty\">"+row.qty+"</td>\n" +
                            "<td class=\"price\">"+row.price+"</td>\n" +
                            "<td class='subtotal'>"+row.subtotal+"</td>\n" +
                            "<td><a href='newstockdelete/"+index+"'  id=\"delete\">" +
                            "<span class=\"trash-icon\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">\n" +
                            "<path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z\"/>\n" +
                            "<path fill-rule=\"evenodd\" d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z\"/>\n" +
                            "</svg></span></a>\n" +
                            "</td>" +
                            "</tr>"

                        indexs = indexs +1;
                    });
                    $("#main_content").append(bodyData);

                    $('#total_am').load(location.href+' #total_am');

                    var i = 0;
                    $( ".subtotal" ).each(function() {
                        i = i + parseFloat($(this).text());
                    });
                    $('#bill_am').text(i);
                    $("#due_am").text(i);
                    $('#qty').val('');
                    $('#generic').val('');
                    $('#rate').val('');
                }
            });
        });
        //stock save button
        // sale save button
        $(".addbtn2").on("click", function() {
            $("#main_content").empty();
            var med_id = $("#med_list2").val();
            var qty = $("#qty").val();
            var rate = $("#rate").val();
            var brand_name = $("#brand_name").val();
            var unit_price = $("#unit_price").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = "/user/add-new-sale";

            //console.log(cid);

            $.ajax({
                type:'post',
                url:url,
                data:{
                    medcine_id:med_id,
                    qty:qty,
                    rate:rate,
                    brand_name:brand_name,
                    unit_price:unit_price,

                },
                dataType: 'json',
                success:function(dataResult){


                    var resultData = dataResult.data;
                    var bodyData = '';
                    var indexs = 1;
                    $.each(resultData,function(index,row){

                        bodyData +="<tr  class=\"items\">" +
                            "<th scope=\"row\">"+indexs+"</th>" +
                            "<td class=\"name\">"+row.name+"</td>" +
                            "<input type='hidden' class=\"med_id\" value='"+row.id+"'>" +
                            "<td class=\"qty\">"+row.qty+"</td>\n" +
                            "<td class=\"buying_price\"  style=\"display: none\">"+row.options.buying_price+"</td>" +
                            "<td class=\"price\">"+row.price+"</td>\n" +
                            "<td class='subtotal'>"+row.subtotal+"</td>\n" +
                            "<td><a href='newsaledelete/"+index+"' id=\"delete\">" +
                            "<span class=\"trash-icon\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">\n" +
                            "<path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z\"/>\n" +
                            "<path fill-rule=\"evenodd\" d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z\"/>\n" +
                            "</svg></span></a>\n" +
                            "</td>" +
                            "</tr>"
                    });
                    $("#main_content").append(bodyData);

                    $('#total_am').load(location.href+' #total_am');

                    var i = 0;
                    $( ".subtotal" ).each(function() {
                        i = i + parseFloat($(this).text());
                    });
                    $('#bill_am').text(i);
                    $("#due_am").text(i);
                    $('#qty').val('');
                    $('#generic').val('');
                    $('#rate').val('');
                }
            });
        });
        // sale save button
        // discount add button
        $("#discount_am").keyup(function(){
            var i = 0;
            $( ".subtotal" ).each(function() {
                i = i + parseFloat($(this).text());
            });
            var discount = parseFloat($(this).text());
            var total = parseFloat(i);
            var discount_main = total*(discount/100);
            var billed = total-discount_main;
            $('#bill_am').text(billed.toFixed(2));
            $('#due_am').text(billed.toFixed(2));
        });
        // discount add button
        // amount paid add button
        $("#amount_paid").keyup(function(){
            var billed = parseFloat($('#bill_am').text());
            var paid = parseFloat($(this).text());
            var due = billed - paid;
            $("#due_am").text(due.toFixed(2));
        });
        // amount paid add button
        //message button
        $(document).on('keypress',function(e) {
            if(e.which == 13) {
                var msg = $("#my_msg").val();
                $("#my_msg").val('');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var url = "/user/messages";
                $.ajax({
                    type:'post',
                    url:url,
                    data:{
                        messages:msg,
                    },
                    dataType: 'json',
                    success:function(dataResult){
                        get_message();
                    }
                });
                var dfdf = $('.user-massage-widget').prop("scrollHeight")

                //console.log(dfdf);
                $( ".user-massage-widget" ).scrollTop(dfdf);
            }
        });
        $("#send_btn").click(function(){
            var msg = $("#my_msg").val();
            $("#my_msg").val('');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = "/user/messages";
            $.ajax({
                type:'post',
                url:url,
                data:{
                    messages:msg,
                },
                dataType: 'json',
                success:function(dataResult){
                    get_message();
                }
            });
            var dfdf = $('.user-massage-widget').prop("scrollHeight")

            //console.log(dfdf);
            $( ".user-massage-widget" ).scrollTop(dfdf);
        });
        //message button
    });


     function get_message(){
        //$(".user-massage-widget").empty();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var url = "/user/get-messages";
        $.ajax({
            type:'get',
            url:url,
            data:{

            },
            dataType: 'json',
            success:function(dataResult){
                //console.log(dataResult);
                var test = dataResult.data;

                var bodyData = '';

                $.each(test,function(index,row){

                    if(row.from_id == row.user_id){
                        $(".user-massage-widget").append('<div class="chat-content-rgt chrtdiv">\n' +
                            '\n' +
                            '                        <div class="chat-content-widget-rgt">\n' +
                            '                            <p>'+row.message +'</p>\n' +
                            '                        </div>\n' +
                            '\n' +
                            '\n' +
                            '                    </div>');

                    }else if (row.to_id == row.user_id){
                        $(".user-massage-widget").append('<div class="chat-content-lft chrtdiv">\n' +
                            '                        <div class="chat-profile-widget">\n' +
                            '                            <img src="../assets/img/profile.jpg">\n' +
                            '                        </div>\n' +
                            '                        <div class="chat-content-widget">\n' +
                            '                            <p>'+row.message+'</p>\n' +
                            '                        </div>\n' +
                            '                    </div>');

                    }
                });
                //$('.user-massage-widget').animate({scrollTop: $('.user-massage-widget').prop("scrollHeight")}, 100);
                var dfdf = $('.user-massage-widget').prop("scrollHeight")

                //console.log(dfdf);
                $( ".user-massage-widget" ).scrollTop(dfdf);

            }
        });

    }
</script>
<script>
    $(document).ready(function () {

                $(".user-massage-widget").stop().animate({ scrollTop: $(".user-massage-widget")[0].scrollHeight}, 1000);
        get_message();


        setInterval(function() {

            var numItems = $('.chrtdiv').length;

            // var numItems = numItems -10;
            //
            for (var i =1; i<=numItems; i++) {
                $('.user-massage-widget').find('.chrtdiv').remove();
            }

            //console.log(numItems);
            get_message();
            var objDiv = document.getElementsByClassName("user-massage-widget");
            objDiv.scrollTop = objDiv.scrollHeight;
        }, 5000);

        $('input').keyup(function () {
            var test  = $('#invoice_number').val();
            var test2  = $('#invoice_supplier').val();
            if (test == '' && test2 == ''){
                $("#save_btn").css('visibility','hidden');
                $("#save_btn2").css('visibility','hidden');
            }else{
                $("#save_btn").css('visibility','visible');
                $("#save_btn2").css('visibility','visible');
            }
        });

        // stock save btn
        $("#save_btn").on("click", function() {
            var invoice_number = $('#invoice_number').val();
            var invoice_date = $('#datepicker').val();
            var invoice_supplier = $('#invoice_supplier').val();
            var total_am = $('#total_am').text();
            var discount_am = $('#discount_am').text();
            var bill_am = $('#bill_am').text();
            var amount_paid = $('#amount_paid').text();
            var due_am = $('#due_am').text();

            $(".items").each(function() {
                var medicine_name = $(this).find('.name').text();
                var med_id = $(this).find('.med_id').val();
                var qty = $(this).find('.qty').text();
                var price = $(this).find('.price').text();
                var subtotal = $(this).find('.subtotal').text();
                var ex_date = $(this).find('.ex_date').text();

                //alert(med_id);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var url = "/user/stock/add";

                $.ajax({
                    type:'post',
                    url:url,
                    data:{
                        invoice_number:invoice_number,
                        invoice_date:invoice_date,
                        invoice_supplier:invoice_supplier,
                        medicine_name:medicine_name,
                        qty:qty,
                        price:price,
                        subtotal:subtotal,
                        med_id:med_id,
                        ex_date:ex_date,
                    },
                    dataType: 'json',
                    success:function(){

                    }
                });
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = "/user/stock/add2";
            $.ajax({
                type:'post',
                url:url,
                data:{
                    invoice_number:invoice_number,
                    total_am:total_am,
                    invoice_date:invoice_date,
                    invoice_supplier:invoice_supplier,
                    discount_am:discount_am,
                    bill_am:bill_am,
                    amount_paid:amount_paid,
                    due_am:due_am,
                },
                dataType: 'json',
                success:function(dataResult){

                    location.reload(true);
                }

            });

        });
        // stock save btn
        // sale save btn
        $("#save_btn2").on("click", function() {
            var invoice_number = $('#invoice_number').val();
            var invoice_date = $('#datepicker').val();
            var invoice_supplier = $('#invoice_supplier').val();
            var total_am = $('#total_am').text();
            var discount_am = $('#discount_am').text();
            var bill_am = $('#bill_am').text();
            var amount_paid = $('#amount_paid').text();
            var due_am = $('#due_am').text();
            var cust_mob = $('#cust_mob').val();

            $(".items").each(function() {
                var medicine_name = $(this).find('.name').text();
                var med_id = $(this).find('.med_id').val();
                var qty = $(this).find('.qty').text();
                var price = $(this).find('.price').text();
                var subtotal = $(this).find('.subtotal').text();
                var buying_price = $(this).find('.buying_price').text();

                //alert(med_id);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var url = "/user/sale/add";

                $.ajax({
                    type:'post',
                    url:url,
                    data:{
                        invoice_number:invoice_number,
                        invoice_date:invoice_date,
                        invoice_supplier:invoice_supplier,
                        medicine_name:medicine_name,
                        qty:qty,
                        price:price,
                        subtotal:subtotal,
                        med_id:med_id,
                        buying_price:buying_price,
                        discount_am:discount_am,
                    },
                    dataType: 'json',
                    success:function(dataResult){
                        var resultData = dataResult.data;
                        var bodyData = '';
                        $.each(resultData,function(index,row){

                        });
                    }
                });
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = "/user/sale/add2";
            $.ajax({
                type:'post',
                url:url,
                data:{
                    invoice_number:invoice_number,
                    total_am:total_am,
                    cust_mob:cust_mob,
                    invoice_date:invoice_date,
                    invoice_supplier:invoice_supplier,
                    discount_am:discount_am,
                    bill_am:bill_am,
                    amount_paid:amount_paid,
                    due_am:due_am,
                },
                dataType: 'json',
                success:function(dataResult){

                    location.reload(true);
                }

            });

        });
        // sale save btn


    });
    // function check_val() {
    //
    // }
    // function gfdg() {
    //     alert('fdfdfd');
    // }
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
    $(function() {


        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });
</script>
<script>
    function play() {
        var audio = document.getElementById("audio");
        audio.play();
    }

</script>
<script>
    function printData()
    {
        var divToPrint=document.getElementById("printTable");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    $('#prnt_btn').on('click',function(){
        printData()
    })
</script>

</body>
</html>
