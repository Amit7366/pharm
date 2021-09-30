@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
            <div class="widget">
                <a class="heading bn">Add Salary</a>

                <form class="row g-3 needs-validation mt-1" action="{{route('InsertopeningBalance')}}" method="post" novalidate>
                    @csrf
                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Balance</label>
                        <input type="text" class="form-control" id="validationCustom03" autocomplete="off" name="balance_amm" onkeypress="return validateNumber(event)" required>
                        <div class="invalid-feedback">
                            Please input your Amount.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Balance Add Date</label>
                        <input type="text" class="form-control" name="addDate" id="datepicker" placeholder="dd-mm-yy">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 10%">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
