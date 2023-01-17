@extends('public_sec.home_layout')
@section('content')
<div class="container mt-5">
    <h3 style="text-align: center;
    font-size: 5em;
    color: black;">Available Test</h3>
    <table class="table test-details" id="example">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Test Name</th>
            <th scope="col">Test Price</th>
            <th scope="col">Test Duration</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($test as $key => $info)
            <tr>
                 <td>{{$key+1}}</td>
                <td>{{$info->name}}</td>
                <td>{{$info->price}}</td>
                <td>{{$info->duration}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>    
</div>	
@endsection