@extends('auth.dashboards.admins.app')
@section('content')
    <div class="widget">
        <form action="{{route('userInsert')}}" method="post" class="row g-3 needs-validation mt-1" novalidate>
            @csrf
            <div class="sub-content-widget">
                <div class="row">

                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label"> Name</label>
                        <input type="text" class="form-control" name="name" id="validationCustom03" required>
                        <input type="hidden" name="role" value="2">
                        <div class="invalid-feedback">
                            Please Provide Your Name.
                        </div>

                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please Provide Your Valid Email.
                        </div>

                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please Provide Your Phone Number.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="validationCustom03" autocomplete="off" required>
                        <div class="invalid-feedback">
                            Please Provide Your Password.
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-content-widget">
                <div class="row">
                    <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Organization Name</label>
                        <input type="text" name="organization" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please Provide Your Organization Name.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please input Your Address.
                        </div>

                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Thana</label>
                        <input type="text" class="form-control" name="thana" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please input Your Thana name.
                        </div>

                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Zila</label>
                        <input type="text" class="form-control" name="zila" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please input Your Zila name.
                        </div>

                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" name="zip_code" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please input Your Zip Code.
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary btn-medix" type="submit">Save</button>
            </div>
        </form>
   </div>
@endsection
