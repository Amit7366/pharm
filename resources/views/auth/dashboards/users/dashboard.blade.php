@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">


            @include('auth.dashboards.users.chatbox')

            <div class="widget">
                <a class="heading">Quick Links</a>
                <div class="quick-links">
                    <div class="row mt-2">
                        <div class="col-md-2 col-sm-4 col-4">
                            <a href="{{route('NewStock')}}"><div class="quick-links-widget">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                                  <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                </svg></span> New Stock
                                </div></a>
                        </div>
                        <div class="col-md-2 col-sm-4 col-4">
                            <a href="{{url('user/sales')}}"><div class="quick-links-widget">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-dotted" viewBox="0 0 16 16">
                                                  <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                                </svg></span> New Sales
                                </div></a>
                        </div>
                        <div class="col-md-2 col-sm-4 col-4">
                            <a href="{{url('user/drug/view')}}"><div class="quick-links-widget">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>
                                                </span> Drug View
                                </div></a>
                        </div>
                        <div class="col-md-2 col-sm-4 col-4">
                            <a href="{{url('user/expire/medicine')}}"><div class="quick-links-widget">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
  <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
</svg></span> Expired
                                </div></a>
                        </div>
                        <div class="col-md-2 col-sm-4 col-4">
                            <a href="{{url('user/reports/daily')}}"><div class="quick-links-widget">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
  <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
  <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
</svg></span> Daily Sales
                                </div></a>
                        </div>
                        <div class="col-md-2 col-sm-4 col-4">
                            <a href="{{url('user/sale/manage')}}"><div class="quick-links-widget">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
  <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
</svg></span> Reports
                                </div></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Optional Main Content Start -->
            <div class="row">
                <div class="col-md-8 ">
                    <div class="main-content-widget">
                        <a class="heading">Performance</a>
                       <div class="row">
                           <div class="col-md-2 ms-auto">
                               <select id="select-box" class="float-end" style="width: 10px">
                                   <option value="1">Today</option>
                                   <option value="2">Yesterday</option>
                                   <option value="3">This Week</option>
                                   <option value="4">Last Week</option>
                                   <option value="5">This Month</option>
                                   <option value="6">Last Month</option>
                               </select>
                           </div>
                       </div>
{{--                        <a class="float-end">--}}
{{--                           Today--}}
{{--                            (<script>--}}
{{--                                var d = (new Date()).toString().split(' ').splice(1,3).join(' ');--}}

{{--                                document.write(d)</script>)--}}
{{--                        </a>--}}
{{--                        <a class="float-end daterange-m" id="reportrange">--}}
{{--                            <i class="fa fa-calendar"></i>&nbsp;--}}
{{--                            <span></span> <i class="fa fa-caret-down"></i>--}}
{{--                        </a>--}}



{{--                        Daily  Data--}}
                        <div class="row tab-content" id="tab-1">
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">

                                    <h5>Expense</h5>
                                    <p> ৳{{round($count,2) }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Revenue</h5>
                                    <p>৳ {{round($sales,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Profit</h5>
                                    <p>৳ {{ round($sales-($count+$balance_due),2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Due</h5>
                                    <p>৳ {{round($balance_due,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="chart-widget mt-2">
                                    <div id="chart">

                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        //Daily  Data End--}}
{{--                        //Yesterday Month Data--}}
                        <div class="row tab-content" id="tab-2">
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">

                                    <h5>Expense</h5>
                                    <p> ৳{{round($count_Y,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Revenue</h5>
                                    <p>৳ {{round($sales_Y,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Profit</h5>
                                    <p>৳ {{ round($sales_Y-($count_Y+$balance_due_Y),2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Due</h5>
                                    <p>৳ {{round($balance_due_Y,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="chart-widget mt-2">
                                    <div id="chart11">

                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        //Yesterday  Data End--}}

{{--                        //Weekly Data Start--}}
                        <div class="row tab-content" id="tab-3">
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">

                                    <h5>Expense</h5>
                                    <p> ৳{{round($count_w_This,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Revenue</h5>
                                    <p>৳ {{round($sales_W_This,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Profit</h5>
                                    <p>৳ {{ round($sales_W_This-($count_w_This+$balance_due_W_This),2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Due</h5>
                                    <p>৳ {{round($balance_due_W_This,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="chart-widget mt-2">
                                    <div id="chart12">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row tab-content" id="tab-4">
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">

                                    <h5>Expense</h5>
                                    <p> ৳{{round($count_w,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Revenue</h5>
                                    <p>৳ {{round($sales_W,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Profit</h5>
                                    <p>৳ {{ round($sales_W-($count_w+$balance_due_W),2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Due</h5>
                                    <p>৳ {{round($balance_due_W,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="chart-widget mt-2">
                                    <div id="chart13">

                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        //Weekly Data End--}}

{{--                        //Last Month Data Start--}}
                        <div class="row tab-content" id="tab-5">
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">

                                    <h5>Expense</h5>
                                    <p> ৳{{round($count_M,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Revenue</h5>
                                    <p>৳ {{round($sales_M,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Profit</h5>
                                    <p>৳ {{ round($sales_M-($count_M+$balance_due_M),2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Due</h5>
                                    <p>৳ {{round($balance_due_M,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="chart-widget mt-2">
                                    <div id="chart14">

                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        //Last Month Data End--}}



                        <div class="row tab-content" id="tab-6">
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">

                                    <h5>Expense</h5>
                                    <p> ৳{{round($count_M_L,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Revenue</h5>
                                    <p>৳ {{round($sales_M_L,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Profit</h5>
                                    <p>৳ {{ round($sales_M_L-($count_M_L+$balance_due_M_L),2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chart-widget mt-2">
                                    <h5>Due</h5>
                                    <p>৳ {{round($balance_due_M_L,2)}}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="chart-widget mt-2">
                                    <div id="chart15">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-content-widget ">
                        <a class="heading">Medicines</a>
                        <div id="chart2">
                        </div>
                    </div>
                    <div class="main-content-widget ">
                        <a class="heading">Grand Total </a>
                        <div class="mt-2 text-start">
{{--                            <span>Account Balance: </span><span class="float-end">৳ {{round($account_balance,2)}}</span> <br>--}}
{{--                            <span>Investment: </span><span class="float-end">৳@if($investment->total != NULL) {{round($investment->total,2)}}@else 0 @endif</span> <br>--}}
                            <span>Revenue: </span><span class="float-end">৳@if($total_revenue->totalrevenue != NULL) {{round($total_revenue->totalrevenue,2)}}@else 0 @endif</span><br>
                            <span>Profit: </span><span class="float-end">৳ {{round($profitdddddd,2)}}</span><br>
                            <span>Due: </span><span class="float-end">৳ @if($total_revenue->balance_due != NULL) {{round($total_revenue->balance_due,2)}}@else 0 @endif</span><br>
                        </div>
                    </div>
                    <div class="main-content-widget" style="margin-top: 9px;">
                        <a class="heading">Over View</a>
                        <div class="row mt-2 text-start">
                            <div class="col-md-6">
                                <div class="chart-widget">
                                    Requsted Medicine: 12
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="chart-widget">
                                    <a href="{{url('user/customers/manage')}}">Total Customer: {{$total_customer}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="main-content-widget">
                        <a class="heading">Expire Soon</a>
                        <div class="position-relative notification-widget">
                            @foreach($expire as $expaier)
                                <p class="w-100 text-warning"><span class="d-inline-block w-50 text-start">{{$expaier->brand_name}}</span><span class="d-inline-block w-50 text-end">({{$expaier->expire_date}})</span></p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-content-widget ">
                        <a class="heading">Low Stocks</a>
                        <div class="position-relative notification-widget">
                            @foreach($low_stock as $stock)
                                <p class="w-100 text-danger"><span class="d-inline-block w-50 text-start">{{$stock->brand_name}}</span><span class="d-inline-block w-50 text-end">({{$stock->stock}})</span></p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-content-widget">
                        {{--                    <div class="main-content-widget">--}}
                        {{--                        <a class="heading">Top Selling Drugs</a>--}}
                        {{--                        <div class="position-relative notification-widget">--}}
                        {{--                            @foreach($top_sales as $top_sales)--}}
                        {{--                                <p class="w-100 text-success"><span class="d-inline-block w-50 text-start">{{$top_sales->brand_name}}</span><span class="d-inline-block w-50 text-end">({{$top_sales->quantity}} sell)</span></p>--}}
                        {{--                            @endforeach--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        <a class="heading">Notifications</a>
                        <div class="position-relative notification-widget ">
                            <p class="text-info">Hey user, Your stock is about to end</p>
                            <p class="text-info">New order is placed</p>
                            <p class="text-info">You need to order some product</p>
                            <p class="text-info">Seclo 20 mg is selling in high speed</p>
                            <p class="text-info">Your plan is about to end</p>
                            <p class="text-info">We have some offer for you </p>
                            <p class="text-info">Your are a great Pharmacist</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Optional Main Content End -->
            <!-- Footer -content start -->
            <footer class="main-content-widget">
                <span class="text-start">Developed By ROIvisor Inc.</span>
                <span class="float-end" >&copy; Copyright 2021, Pharmeex Ltd.</span>
            </footer>
            <!-- Footer -content end -->
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>

        var options = {
            series: [{
                name: 'Today',
                color: '#3311DB',
                data: {!! json_encode($daily_data2) !!}
            }],
            chart: {
                toolbar: {
                    show: false,
                },
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'string',
                categories: {!! json_encode($daily_data) !!}
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        var options11 = {
            series: [ {
                name: 'Yesterday',
                color:'#ff4500',
                data: {!! json_encode($daily_data3) !!}
            }],
            chart: {
                toolbar: {
                    show: false,
                },
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'string',
                categories: {!! json_encode($yesterday_name) !!}
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart11 = new ApexCharts(document.querySelector("#chart11"), options11);
        chart11.render();

        var options12 = {
            series: [ {
                name: 'weekly',
                color:'#ff4500',
                data: {!! json_encode($daily_data_Weekly) !!}
            }],
            chart: {
                toolbar: {
                    show: false,
                },
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'string',
                categories: {!! json_encode($daily_data) !!}
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart12 = new ApexCharts(document.querySelector("#chart12"), options12);
        chart12.render();

        var options13 = {
            series: [ {
                name: 'Last Week',
                color:'#ff4500',
                data: {!! json_encode($daily_data_Last_Weekly) !!}
            }],
            chart: {
                toolbar: {
                    show: false,
                },
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'string',
                categories: {!! json_encode($last_week_name) !!}
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart13 = new ApexCharts(document.querySelector("#chart13"), options13);
        chart13.render();

        var options14 = {
            series: [ {
                name: 'This Month',
                color:'#ff4500',
                data: {!! json_encode($daily_data_This_Month) !!}
            }],
            chart: {
                toolbar: {
                    show: false,
                },
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'string',
                categories: {!! json_encode($month_name) !!}
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart14 = new ApexCharts(document.querySelector("#chart14"), options14);
        chart14.render();

        var options15 = {
            series: [ {
                name: 'Last Month',
                color:'#ff4500',
                data: {!! json_encode($daily_data_Last_Month) !!}
            }],
            chart: {
                toolbar: {
                    show: false,
                },
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'string',
                categories: {!! json_encode($last_month_name) !!}
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart15 = new ApexCharts(document.querySelector("#chart15"), options15);
        chart15.render();

        var options2 = {
            series:  {!! json_encode($test) !!},
            chart: {
                width: '100%',
                height:200,
                type: 'polarArea'
            },
            labels: {!! json_encode($test2) !!},
            fill: {
                opacity: 1
            },
            stroke: {
                width: 1,
                colors: undefined
            },
            yaxis: {
                show: false
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                polarArea: {
                    rings: {
                        strokeWidth: 0
                    },
                    spokes: {
                        strokeWidth: 0
                    },
                }
            },
            theme: {
                monochrome: {
                    enabled: true,
                    shadeTo: 'light',
                    shadeIntensity: 0.6
                }
            }
        };

        var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
        chart2.render();

    </script>

@endsection

