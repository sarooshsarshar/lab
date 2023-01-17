@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-6">
        <h1>All Role</h1>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight">Add Role</button>
    </div>
    @include('permission.role.add')
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
                            <th>Role Name</th>
                            <th>Role Title</th>
                            <th>Role Des</th>
                            <th>Creation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td></td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>{{$role->description}}</td>
                            <td>{{$role->created_at}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection