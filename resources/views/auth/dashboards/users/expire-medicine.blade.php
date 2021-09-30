@extends('auth.dashboards.users.app')
@section('content')
    <div class="layout mt-5">
        <div class="main_content content-widget">
        @include('auth.dashboards.users.chatbox')
        <!-- Optional Main Content Start -->
            <div class="widget">
                <a class="heading bn">Expire Medicine  List</a>
                        <div class="table-widget" style="overflow-x: scroll">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Medicine Name</th>
                                    <th>Quantity</th>
                                    <th>Expire Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($expire_over as $expire_over)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$expire_over->brand_name}}</td>
                                        <td>{{$expire_over->stock}}</td>
                                        <td>{{$expire_over->expire_date}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-success">No Expire Medicine!</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
            </div>
            <!-- Optional Main Content End -->
        </div>
    </div>
@endsection
