@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
            @include('auth.dashboards.users.chatbox')
            <div class="widget">
                <p class="">Please <b>send money</b> to this number (<b>01759571918</b>) and Fill the form with your <b>Bkash Number</b> and <b>TrxID</b></p>
            </div>
            <div class="widget">
                <a class="heading">Payment Information</a>

                <form action="{{url('user/give-payment')}}" method="post" class="row g-3 needs-validation mt-1" novalidate>
                    @csrf
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Bkash Number</label>
                        <input type="number" class="form-control" name="bkash" id="validationCustom03" required>
                        <input type="hidden" value="4" name="role">
                        <div class="invalid-feedback">
                            Please input Bkash Number.
                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">TrxID</label>
                        <input type="text" class="form-control" name="trxid" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please input TrxID.
                        </div>

                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>

            <div class="widget-view">
                <a class="heading bn">Payment List</a>

                <div class="table-widget">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Bkash Number</th>
                            <th>TrxID</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($pay_info as $rent_details)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$rent_details->bkash_number}}</td>
                                <td>{{$rent_details->trxid}}</td>
                                <td>{{$rent_details->created_at}}</td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Optional Main Content Start -->

            <!-- Optional Main Content End -->
        </div>
    </div>
@endsection
