@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-6">
        <h1>All Test</h1>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                data-backdrop="static" data-target="#addTest">Add Test</button>
    </div>
    @include('test.create')
    <div class="col-12">
        <div class="separator mb-5"></div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-12 data-tables-hide-filter">
        <div class="card">
            <div class="card-body">

                <table class="data-table data-tables-pagination responsive nowrap" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Test Name</th>
                            <th>Test Price</th>
                            <th>Duration</th>
                            <th>Reference Range</th>
                            <th>Unit</th>
                            <th>Group Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($test as $key => $info)
                        <tr>
                        <td>{{$key+1}}</td>
                            <td>{{$info->test_name}}</td>
                            <td>{{$info->test_price}}</td>
                            <td>{{$info->test_duration}}</td>
                            <td>{{$info->prference_range}}</td>
                            <td>{{$info->unit_name}}</td>
                            <td>{{$info->group_name}}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                            data-backdrop="static" data-target="#updateTest{{$info->id}}">Update Test</button>
                            </td>
                        </tr>
                        @include('test.update')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection