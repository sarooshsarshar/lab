@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-6">
        <h1>All Permission</h1>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight">Add Permission</button>
    </div>
    @include('permission.permission.add')
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
                            <th>Permission Name</th>
                            <th>Permission Title</th>
                            <th>Permission Des</th>
                            <th>Creation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td></td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->display_name}}</td>
                            <td>{{$permission->description}}</td>
                            <td>{{$permission->created_at}}</td>
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