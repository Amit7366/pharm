@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
            <div class="widget">
                <a class="heading bn">Pay Due</a>

                <form class="row g-3 needs-validation mt-1" action="{{route('InsertDueAmount')}}" method="post" novalidate>
                    @csrf
                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Paid Amount</label>
                        <input type="text" class="form-control" id="validationCustom03" autocomplete="off" name="due_amm" onkeypress="return validateNumber(event)" required>
                        <input type="hidden" name="invoiceid" value="{{$customer->invoice_no}}">
                        <div class="invalid-feedback">
                            Please input your Amount.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" value="{{$customer->customer_name}}" readonly="readonly">
                        <div class="invalid-feedback">
                            Please input your Amount.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Due</label>
                        <input type="text" class="form-control" value="{{$customer->balance_due}}" readonly="readonly">
                        <div class="invalid-feedback">
                            Please input your Amount.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Balance Add Date</label>
                        <input type="text" class="form-control" name="PaidDate" id="datepicker" placeholder="dd-mm-yy">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 10%">Paid</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
