@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
            <div class="widget">
                <a class="heading bn">Add Salary</a>

                <form class="row g-3 needs-validation mt-1" action="{{route('UpdateSalary')}}" method="post" novalidate>
                    @csrf
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Sales Men Name</label>
                        <select class="js-example-basic-single" name="sales_name" id="validationCustom04" required>
                            <option selected disabled>Sales Men Name</option>
                            @forelse($sales_men as $sales_men)
                                <option value="{{$sales_men->id}}" <?php if ($sales_men->id == $salary_list_edit->sales_men_id)echo 'selected';?>>{{$sales_men->first_name.' '.$sales_men->last_name}}</option>
                            @empty
                                <option value="" style="color: tomato">
                                    NO Sales Men
                                </option>
                            @endforelse

                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Salary Of Month</label>
                        <input type="text" class="form-control" name="datepicker2" id="datepicker2" value="{{$salary_list_edit->salary_of_month}}" autocomplete="off" placeholder="mm-yy" required >
                        <input type="hidden" class="form-control" name="id" value="{{$salary_list_edit->id}}">
                        <div class="invalid-feedback">
                            Please input Salary Paid Date.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Salary Paid Date</label>
                        <input type="text" class="form-control" name="salary_paid" id="datepicker3" value="{{$salary_list_edit->salary_date}}" placeholder="dd-mm-yy">
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Salary Amount</label>
                        <input type="text" class="form-control" id="validationCustom03" value="{{$salary_list_edit->salary_amm}}" autocomplete="off" name="salary_amm" onkeypress="return validateNumber(event)" required>
                        <div class="invalid-feedback">
                            Please input Salary Amount.
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
