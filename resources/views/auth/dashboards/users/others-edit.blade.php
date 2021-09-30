@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
            <div class="widget">
                <a class="heading bn">Add Other's Expense</a>

                <form class="row g-3 needs-validation mt-1" action="{{route('Updateother')}}" method="post" novalidate>
                    @csrf

                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Expense Detail's</label>
                        <input type="text" class="form-control" name="expen_details" value="{{$expen_details->expen_details}}" required >
                        <input type="hidden" class="form-control" name="id" value="{{$expen_details->id}}">
                        <div class="invalid-feedback">
                            Please input Expense Detail's.
                        </div>
                    </div>


                    <div class="col-md-3">
                        <label class="form-label">Expense Date</label>
                        <input type="text" class="form-control" name="expense_date" id="datepicker3" value="{{$expen_details->expen_date}}" placeholder="dd-mm-yy">
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Expense Amount</label>
                        <input type="text" class="form-control" id="validationCustom03" name="expen_amount" value="{{$expen_details->expen_amount}}" onkeypress="return validateNumber(event)" required>
                        <div class="invalid-feedback">
                            Please input Expense Amount.
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
