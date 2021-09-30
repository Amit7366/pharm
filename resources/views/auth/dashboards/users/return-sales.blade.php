@extends('auth.dashboards.users.app')
@section('content')


    <!--========== MAIN CONTENT AREA START =========-->
    <div class="layout mt-5">
        <div class="main_content content-widget">
            @include('auth.dashboards.users.chatbox')
            <div class="widget">
                <a class="heading">Return Sale</a>

                <form class="row g-3 needs-validation mt-1" novalidate action="{{route('returnSale')}}" method="post">
                    @csrf
                    <div class="sub-content-widget">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="validationCustom03" class="form-label">Brand Name</label>
                                <select class="js-example-basic-single" name="medi_name" required>
                                    <option selected disabled value="">Select Brand Name</option>
                                    @foreach($medicine1 as $med)
                                        <option value="{{$med->id}}" class="med_item">{{$med->brand_name}} ({{$med->strength}})</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom03" class="form-label">Quantity</label>
                                <input type="text" class="form-control" name="qtyy" required>
                            </div>
                                <input type="hidden" class="form-control" name="invoice_no" value="{{$med->invoice_no}}" required>

                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit" style="margin-top: 32px">Return Sale</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Optional Main Content Start -->

            <!-- Optional Main Content End -->
        </div>
    </div>
    <!--========== MAIN CONTENT AREA END =========-->
@endsection
