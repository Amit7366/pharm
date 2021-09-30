@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
            <div class="widget">
                <a class="heading bn">Add Rent</a>

                <form class="row g-3 needs-validation mt-1" action="{{route('UpdateRent')}}" method="post" novalidate>
                    @csrf

                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Rent Of Month</label>
                        <input type="text" class="form-control" name="Rent_f_month" id="datepicker2" value="{{$rent_details_edit->rent_of_month}}" placeholder="mm-yy" required >
                        <input type="hidden" class="form-control" name="id" value="{{$rent_details_edit->id}}">
                        <div class="invalid-feedback">
                            Please input Rent Paid Date.
                        </div>
                    </div>


                    <div class="col-md-3">
                        <label class="form-label">Rent Paid Date</label>
                        <input type="text" class="form-control" name="Rent_paid" id="datepicker3" value="{{$rent_details_edit->paid_month}}" placeholder="dd-mm-yy">
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Rent Amount</label>
                        <input type="text" class="form-control" id="validationCustom03" name="Rent_amm" value="{{$rent_details_edit->paid_amount}}" onkeypress="return validateNumber(event)" required>
                        <div class="invalid-feedback">
                            Please input Rent Amount.
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
