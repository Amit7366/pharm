@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
            @include('auth.dashboards.users.chatbox')
            <div class="widget">
                <a class="heading">Personal Information</a>

                <form action="{{route('salesMenUpdate')}}" method="post" class="row g-3 needs-validation mt-1" novalidate>
                    @csrf
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{$salesMen->first_name}}" id="validationCustom03" required>
                        <input type="hidden" value="4" name="role">
                        <div class="invalid-feedback">
                            Please input first name.
                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{$salesMen->last_name}}" id="validationCustom03" required>
                        <input type="hidden" name="id" value="{{$salesMen->id}}">
                        <div class="invalid-feedback">
                            Please input last name.
                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">NID/Others Govt ID</label>
                        <input type="text" class="form-control" name="nid" value="{{$salesMen->nid}}" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please input valid NID/Others Govt ID.
                        </div>

                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="{{$salesMen->number}}" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please input phone number.
                        </div>

                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email" value="{{$salesMen->email}}" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please input Email Address.
                        </div>

                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">District</label>
                        <select class="form-select" name="district" id="validationCustom04" required>
                            <option selected disabled value="">Select District</option>
                            <option value="Tangail">Tangail</option>
                            <option value="Jamalpur">Jamalpur</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select valid district.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Thana</label>
                        <select class="form-select" name="thana" id="validationCustom04" required>
                            <option selected disabled value="">Select Thana</option>
                            <option value="Madhupur">Madhupur</option>
                            <option value="Ghatail">Ghatail</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select valid thana.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Address</label>
                        <input type="text" class="form-control"  value="{{$salesMen->address}}" name="address" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please input Address.
                        </div>

                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <!-- Optional Main Content Start -->

            <!-- Optional Main Content End -->
        </div>
    </div>
@endsection
