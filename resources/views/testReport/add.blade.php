@extends('layouts.app')

@section('content')
<div class="row">
    @include('testReport/staticTest')
<form method="post" action="{{route('testreport.save')}}" class="needs-validation tooltip-label-right">
    @csrf
    <div class="col-12 col-lg-12 mb-5">
        <h5 class="mb-5">Add Test Report</h5>
            @include('testReport/patientInfo')
            @include('testReport/testList')
         <div class="row">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
</form>
</div>

@endsection