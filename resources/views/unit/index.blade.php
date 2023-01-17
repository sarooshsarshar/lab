@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-6">
        <h1>All Unit</h1>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                data-backdrop="static" data-target="#addUnit">Add Unit</button>
    </div>
    @include('unit.create')
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
                            <th>Unit Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $key => $info)
                        <tr>
                        <td>{{$key+1}}</td>
                            <td>{{$info->unit_name}}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                            data-backdrop="static" data-target="#updateUnit{{$info->id}}">Update Unit</button>
                            <a href="{{ route('unit.delete' , $info->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @include('unit.update')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection