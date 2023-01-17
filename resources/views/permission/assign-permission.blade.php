@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-6">
        <h1>Assign Permission To role</h1>
    </div>
    <div class="col-12">
        <div class="separator mb-5"></div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-12 data-tables-hide-filter">
        <div class="card">
            <form method="post" action="{{route('assignpermission.store')}}" class="needs-validation tooltip-label-right" novalidate>
                @csrf
                <div class="card-body">
                    <!-- Role -->
                    <div class="row">
                        <div class="col-12 form-group position-relative error-l-50">
                            <label>Select Role</label>
                            <select name="role_id" class="form-control">
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->first('role_id')}}</span>
                            <div class="invalid-tooltip">
                                Role Field is required
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 form-group position-relative error-l-50">
                            <label>Select Permission</label>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                <div class="mb-4 col-3">
                                    <div class="custom-control custom-checkbox mb-4">
                                        <input type="checkbox" value="{{$permission->id}}" name="permissions[]" class="custom-control-input" id="permission{{$permission->id}}">
                                        <label class="custom-control-label" for="permission{{$permission->id}}">{{$permission->name}}</label>
                                    </div>
                                </div>
                                @endforeach
                                <span class="text-danger">{{$errors->first('permissions')}}</span>
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