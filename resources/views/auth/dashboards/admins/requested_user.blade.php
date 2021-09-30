@extends('auth.dashboards.admins.app')
@section('content')


    <div class="widget">
        <a class="heading ">Requested User</a>

        <div class="table-widget">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Organization</th>
                    <th>Address</th>
                    <th>Tahna</th>
                    <th>Zila</th>
                    <th>Zip Code</th>
                    <th>Plan</th>
                    <th>Joined At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($requested_users as $user)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$user->u_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->u_phone}}</td>
                        <td>{{$user->u_organization}}</td>
                        <td>{{$user->u_address}}</td>
                        <td>{{$user->u_thana}}</td>
                        <td>{{$user->u_zila}}</td>
                        <td>{{$user->u_zip}}</td>
                        <td>{{$user->u_plan}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <a href="{{url('admin/user/req/delete/'.$user->id)}}" id="delete"><span class="trash-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg></span></a>
                            @if($user->status == 0)
                            <a href="{{url('admin/user/update/'.$user->id)}}" class="btn btn-success">Approve</a>
                            @else
                                <a href="{{url('admin/user/ban/'.$user->id)}}" class="btn btn-danger">Pause</a>
                            @endif
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="12" class="text-center text-danger" style="font-size: 25px;"> No Data Found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional Main Content End -->

@endsection
