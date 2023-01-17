@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-6">
        <h1>Approved Booking</h1>
        <a href="{{ route('booking.list') }}" class="btn btn-success">Pending Booking</a>
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
                            <th>Patient Name</th>
                            <th>Patient Email</th>
                            <th>Patient Phone</th>
                            <th>Address</th>
                            <th>Booking Type</th>
                            <th>Test List</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking as $key => $info)
                        <tr>
                        <td>{{$key+1}}</td>
                            <td>{{$info->name}}</td>
                            <td>{{$info->email}}</td>
                            <td>{{$info->phone}}</td>
                            <td>{{$info->address}}</td>
                            <td>{{$info->booking_type == 1 ? "Home Sampling" : "Pre Booking"}}</td>
                            <td>
                                @foreach ($info->booking_test as $item)
                                    {{ $item->test->name . " ,  " }}
                                @endforeach
                            </td>
                            <td>{{$info->date}}</td>
                            <td>{{$info->time}}</td>
                            <td>{{"Approved"}}</td>
                            <td>
                                <a href="{{ route('booking.complete' , $info->id) }}" class="btn btn-primary">Complete Order</a>
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