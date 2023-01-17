<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex">
            <h5 class="mb-4">Patient Info</h5>
        </div>
        <div class="row">
            <div class="col-6 form-group position-relative error-l-50">
                <label>Patient Name</label>
                <input
                    type="text"
                    name="patient_name"
                    value="{{ old('patient_name') }}"
                    class="form-control"
                    required="true"
                />
                <span
                    class="text-danger"
                    >{{ $errors-> first('patient_name')}}</span
                >
                <div class="invalid-tooltip">Patient Name is required!</div>
            </div>
            <div class="col-6 form-group position-relative error-l-50">
                <label>Age</label>
                <input
                    type="number"
                    step="any"
                    name="age"
                    value="{{ old('age') }}"
                    class="form-control"
                    required
                />
                <span class="text-danger">{{ $errors-> first('age')}}</span>
                <div class="invalid-tooltip">Age Name is required!</div>
            </div>
            <div class="col-6 form-group position-relative error-l-50">
                <label>Gender</label>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        name="gender"
                        value="{{ old('gender', '1') }}"
                        checked
                        id="male"
                        class="custom-control-input"
                    />
                    <label for="male" class="custom-control-label">Male</label>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        name="gender"
                        value="{{ old('gender', '2') }}"
                        id="fmale"
                        class="custom-control-input"
                    />
                    <label for="fmale" class="custom-control-label"
                        >Female</label
                    >
                </div>
            </div>
            <div class="col-6 form-group position-relative error-l-50">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control"
                />
                <span class="text-danger">{{ $errors-> first('email')}}</span>
                <div class="invalid-tooltip">Enter Valid Email!</div>
            </div>
            <div class="col-6 form-group position-relative error-l-50">
                <label>Phone No(Optional)</label>
                <input
                    type="tel"
                    name="phone_no"
                    value="{{ old('phone_no', '') }}"
                    class="form-control"
                />
                <span
                    class="text-danger"
                    >{{ $errors-> first('phone_no')}}</span
                >
                <div class="invalid-tooltip">Enter Valid Phone No!</div>
            </div>
            <div class="col-6 form-group position-relative error-l-50">
                <label>Referred By(Optional)</label>
                <input
                    type="text"
                    name="reffered_by"
                    value="{{ old('reffered_by', '') }}"
                    class="form-control"
                />
                <span
                    class="text-danger"
                    >{{ $errors-> first('reffered_by')}}</span
                >
                <div class="invalid-tooltip">Enter Valid Reffered By!</div>
            </div>
            <div class="col-6 form-group position-relative error-l-50">
                <label>Other Info(Optional)</label>
                <textarea
                    name="other_info"
                    class="form-control"
                    cols="30"
                    rows="3"
                    >{{ old("reffered_by", "") }}</textarea
                >
                <span
                    class="text-danger"
                    >{{ $errors-> first('reffered_by')}}</span
                >
                <div class="invalid-tooltip">Enter Valid Reffered By!</div>
            </div>
            <div class="col-6 form-group position-relative error-l-50">
                <label>Registration Date</label>
                <input type="datetime-local" value="{{old('register_date',date('Y-m-d')."T".date('H:i'))}}" name="register_date" 
                class="form-control">
                <span
                    class="text-danger"
                    >{{ $errors-> first('register_date')}}</span
                >
                <div class="invalid-tooltip">
                    Registration Date is required!
                </div>
            </div>
        </div>
    </div>
</div>
