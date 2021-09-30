@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
            <div class="widget">
                <a class="heading bn">Add Rent</a>

                <form class="row g-3 needs-validation mt-1" action="{{route('InsertRent')}}" method="post" novalidate>
                    @csrf

                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Rent Of Month</label>
                        <input type="text" class="form-control" name="Rent_f_month" id="datepicker2" placeholder="mm-yy" required >
                        <div class="invalid-feedback">
                            Please input Rent Paid Date.
                        </div>
                    </div>


                    <div class="col-md-3">
                        <label class="form-label">Rent Paid Date</label>
                        <input type="text" class="form-control" name="Rent_paid" id="datepicker" placeholder="dd-mm-yy">
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom03" class="form-label">Rent Amount</label>
                        <input type="text" class="form-control" id="validationCustom03" name="Rent_amm" onkeypress="return validateNumber(event)" required>
                        <div class="invalid-feedback">
                            Please input Rent Amount.
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <!-- Optional Main Content Start -->

            <div class="widget-view">
                <a class="heading bn">Rent Paid List</a>

                <div class="table-widget">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Rent Of Month</th>
                            <th>Rent Paid Date</th>
                            <th>Rent Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($rent_details as $rent_details)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$rent_details->rent_of_month}}</td>
                                <td>{{$rent_details->paid_month}}</td>
                                <td>{{$rent_details->paid_amount}}</td>
                                <td>
                                    <a href="{{url('user/rent/edit/'.$rent_details->id)}}"><span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></span></a>
                                    <a href="{{url('user/rent/delete/'.$rent_details->id)}}" id="delete"><span class="trash-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg></span></a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Optional Main Content End -->
        </div>
    </div>
@endsection
