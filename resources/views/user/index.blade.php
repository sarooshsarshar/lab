@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-6">
        <h1>All User</h1>
    </div>
    <div class="col-6 text-right">
        <a href="{{route('user.create')}}" class="btn btn-outline-info">Add User</a>
    </div>
    <div class="col-12">
        <div class="separator mb-5"></div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-12 data-tables-hide-filter">
        <div class="card">
            <div class="card-body">

                <table class="data-table data-tables-pagination responsive nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>User Type</th>
                            <th>Creation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td></td>
                            <td>{{$user->first_name." ".$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                {{$user->status==1?"Active":"Inactive"}}
                            </td>
                            <td>
                                {{$user->user_type==1?"Admin":"User"}}
                            </td>
                            <td>
                                {{$user->created_at}}
                            </td>
                            <td>
                                <a href="{{route('user.show',$user->id)}}" class="btn btn-success">Update</a>
                                <a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection