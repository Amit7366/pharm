@extends('auth.dashboards.admins.app')
@section('content')


    <div class="widget-view">
        <a class="heading bn">All Payments Information</a>

        <div class="table-widget">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>User Name</th>
                    <th>Bkash Number</th>
                    <th>TrxID</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @forelse($result as $user)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->bkash_number}}</td>
                        <td>{{$user->trxid}}</td>
                        <td>{{$user->created_at}}</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center text-danger" style="font-size: 25px;font-weight: bold"> No Data Found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional Main Content End -->

@endsection
