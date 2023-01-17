@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-6">
        <h1>All Group</h1>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                data-backdrop="static" data-target="#addGroup">Add Group</button>
    </div>
    @include('group.create')
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
                            <th>Group Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $key => $info)
                        <tr>
                        <td>{{$key+1}}</td>
                            <td>{{$info->name}}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                            data-backdrop="static" data-target="#updateGroup{{$info->id}}">Update Group</button>
                            <a href="{{ route('group.delete' , $info->id) }}" class="btn btn-danger">Delete</a>    
                        </td>
                        </tr>
                        @include('group.update')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection