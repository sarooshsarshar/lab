@extends('public_sec.home_layout')
@section('content')
<div class="container mt-5">
    <div>
        <h3 style="text-align: center;
        font-size: 5em;
        color: black;">Book Test</h3>
                    @if (session("status"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session("message") }}
                    </div>
                    @endif                    
        <form action="{{ route('test.patient.book.save') }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Select Test</label>
                <select class="test-multiple form-control" name="tests[]" multiple="multiple">
                    @foreach ($test as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
              </div>
            <div class="form-group">
              <label >Patient Name</label>
              <input type="text" required class="form-control" name="name" aria-describedby="emailHelp" placeholder="Patient Name">
            </div>
            <div class="form-group">
              <label >Patient Email</label>
              <input type="email" required class="form-control" name="email" placeholder="Patient Email">
            </div>
            <div class="form-group">
                <label >Patient Phone</label>
                <input type="phone" required class="form-control" name="phone" placeholder="Patient Phone">
            </div>
            <div class="form-group">
                <label >Address</label>
                <input type="phone" required class="form-control" name="address" placeholder="Address">
            </div>
            <div class="form-group">
                <label >Select Date</label>
                <input type="date" value="{{ date('Y-m-d') }}" required class="form-control" name="date">
            </div>
            <div class="form-group">
                <label >Select Time</label>
                <input type="time" required class="form-control" name="time">
            </div>
            <div class="form-group">
                <label >Booking Type</label>
                <select name="booking_type" class="form-control">
                    <option value="1">Home Sampling</option>
                    <option selected value="2">Pre booking</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>	
@endsection