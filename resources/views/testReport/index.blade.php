@extends('layouts.app')

@section('content')
@include('testReport/searchFilter');
<div class="row">
    <div class="col-6">
        <h1>All Test Reports</h1>
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
                            <th>patient id</th>
                            <th>Patient Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_text as $info)
                            <tr>
                                <td>{{$info->patient_id}}</td>
                            <td>{{$info->patient_name}}</td>
                            <td>{{$info->age}}</td>
                            <td>{{$info->email}}</td>
                            <td>
                            <a href="{{route('testreport.print',$info->patient_id)}}" class="btn btn-info">Print</a>
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