@extends('auth.dashboards.users.app')
@section('content')


    <!--========== MAIN CONTENT AREA START =========-->
    <div class="layout mt-5">
        <div class="main_content content-widget">
            @include('auth.dashboards.users.chatbox')
            <div class="widget">
                <a class="heading">Request Medicine</a>

                <form class="row g-3 needs-validation mt-1" novalidate action="{{route('requestMedicine')}}" method="post">
                    @csrf
                    <div class="sub-content-widget">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="validationCustom03" class="form-label">Medicine Name</label>
                                <input type="text" class="form-control" name="medi_name" required>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom03" class="form-label">Generic</label>
                                <input type="text" class="form-control" name="generic" required>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom03" class="form-label">Company</label>
                                <input type="text" class="form-control" name="company" required>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit" style="margin-top: 32px">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Optional Main Content Start -->

            <!-- Optional Main Content End -->
        </div>
    </div>
    <!--========== MAIN CONTENT AREA END =========-->
@endsection
