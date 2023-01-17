@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 col-lg-12 mb-5">
        <h5 class="mb-5">Update Profile</h5>
        <div class="card mb-4">
            <form method="post" action="{{route('profile.edit',$user_info->id)}}" class="needs-validation tooltip-label-right" novalidate>
                @csrf
                <div class="card-body">
                    <div class="d-flex">
                        <h5 class="mb-4">User Info</h5>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group position-relative error-l-50">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="{{old('first_name',$user_info->first_name)}}" class="form-control" required>
                            <span class="text-danger">{{$errors->first('first_name')}}</span>
                            <div class="invalid-tooltip">
                                First Name is required!

                            </div>
                        </div>
                        <div class="col-6 form-group position-relative error-l-50">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="{{old('last_name',$user_info->last_name)}}" class="form-control" required>
                            <span class="text-danger">{{$errors->first('last_name')}}</span>
                            <div class="invalid-tooltip">
                                Last Name is required!
                            </div>
                        </div>
                        <div class="col-6 form-group position-relative error-l-50">
                            <label>Email</label>
                            <input type="email" name="email" value="{{old('email',$user_info->email)}}" class="form-control" required>
                            <span class="text-danger">{{$errors->first('email')}}</span>
                            <div class="invalid-tooltip">
                                Email is required!
                            </div>
                        </div>
                        <div class="col-6 form-group position-relative error-l-50">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password if you want to chanage it ">
                            <span class="text-danger">{{$errors->first('password')}}</span>
                            <div class="invalid-tooltip">
                                Password is required!
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-0">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection