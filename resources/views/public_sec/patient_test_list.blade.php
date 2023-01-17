@extends('public_sec.home_layout')
@section('content')
<div class="container mt-5">
    <div>
      @if (!session("status"))
  <div class="alert alert-secondary" role="alert">
    {{ session("message") }}
  </div>
@endif
        <h3 style="text-align: center;
        font-size: 5em;
        color: black;">Search Test</h3>
        <form action="{{ route('test.patient.list') }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Registration No</label>
              <input type="text" required class="form-control" name="reg_no" aria-describedby="emailHelp" placeholder="Registration No">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Pin</label>
              <input type="number" required class="form-control" name="pin" placeholder="Pin">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>	
@endsection