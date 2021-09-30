@extends('auth.dashboards.admins.app')
@section('content')
<div class="widget">
    <a class="heading"> Medicine Manage</a>
    <div class="table-widget">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Serial</th>
                <th>Brand Name</th>
                <th>Retails Price</th>
                <th>Strength</th>
                <th>Pack Size</th>
                <th>Generic Name</th>
                <th>Doses Description</th>
                <th>Manufacturer</th>
                <th>Updated By</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($medicine as $medicine)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$medicine->brand_name}}</td>
                <td>৳ {{$medicine->retail_price}}</td>
                <td>{{$medicine->strength}}</td>
                <td>{{$medicine->pack_size}}</td>
                <td>{{$medicine->gname}}</td>
                <td>{{$medicine->doses_description}}</td>
                <td>{{$medicine->manu_name}}</td>
                <td>{{$medicine->created_by}}</td>

                <td>
                    <a href="{{url('admin/medicine/edit/'.$medicine->medi_id)}}"><span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></span></a>
                    <a href="{{url('admin/medicine/delete/'.$medicine->medi_id)}}" id="delete"><span class="trash-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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
@endsection
