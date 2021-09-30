@extends('auth.dashboards.admins.app')
@section('content')
    <div class="widget">
        <a class="heading">Request Medicine List</a>
        <div class="table-widget">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Brand Name</th>
                    <th>Generic Name</th>
                    <th>Company Name</th>
                    <th>User Id</th>
                    <th>Request Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($request_medi as $request_medi)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$request_medi->medi_name}}</td>
                        <td>{{$request_medi->generic_nam}}</td>
                        <td>{{$request_medi->company_nam}}</td>
                        <td>{{$request_medi->user_id}}</td>
                        <td>{{$request_medi->created_at}}</td>
                        <td>
                            <a href="{{url('admin/request/medicine/active/'.$request_medi->id)}}" type="submit" class="btn btn-success">Done</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center text-success">No Data Found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
