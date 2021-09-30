@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
        @include('auth.dashboards.users.chatbox')
        <!-- Optional Main Content Start -->
            <div class="widget">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Sale</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Stock</button>

                </div>
                <a class="heading bn">Invoice List</a>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-widget" style="overflow-x: scroll">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Invoice Number</th>
                                    <th>Customer Name</th>
                                    <th>Total Amount</th>
                                    <th>Receive Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($invoice as $invoice)
                                    <tr>
                                        <td>{{$invoice->invoice_no}}</td>
                                        <td>{{$invoice->customer_name}}</td>
                                        <td>{{$invoice->total}} TK.</td>
                                        <td>{{$invoice->invoice_date}}</td>
                                        <td>
                                            <a href="{{url('user/invoice/details/'.$invoice->invoice_no)}}"><span class="view-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg></span></a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="table-widget" style="overflow-x: scroll">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Invoice Number</th>
                                    <th>Supplier Name</th>
                                    <th>Total Amount</th>
                                    <th>Receive Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($stocks as $stocks)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$stocks->invoice_no}}</td>
                                        <td>{{$stocks->name}}</td>
                                        <td>{{$stocks->total}} TK.</td>
                                        <td>{{$stocks->invoice_date}}</td>
                                        <td>
                                            <a href="{{url('user/invoice/details2/'.$stocks->invoice_no)}}"><span class="view-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg></span></a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>




            </div>

            <!-- Optional Main Content End -->
        </div>
    </div>
@endsection
