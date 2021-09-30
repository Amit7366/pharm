@extends('auth.dashboards.users.app')
@section('content')

    <div class="layout mt-5">
        <div class="main_content content-widget">
    <div class="widget">
        <a class="heading">Add Supplier </a>
        <form action="{{route('suplaierInsert')}}" method="post" class="row g-3 needs-validation mt-1" novalidate>
            @csrf
                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label"> Name</label>
                        <input type="text" class="form-control" name="name" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please Provide Your Name.
                        </div>

                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Position</label>
                        <input type="text" name="position" class="form-control" id="validationCustom03" autocomplete="off" required>
                        <div class="invalid-feedback">
                            Please Provide Your Position.
                        </div>
                    </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Company Name</label>
                <input type="text" name="company" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please Provide Your Company Name.
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
            <div class="col-12">
                <button class="btn btn-success btn-medix" type="submit">Save</button>
            </div>
        </form>
    </div>
        </div>
    </div>
@endsection
