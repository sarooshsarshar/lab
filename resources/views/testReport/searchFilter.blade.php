<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex">
            <h5 class="mb-4">Search Patient</h5>
        </div>
        <form method="post" action="{{route('testreport.search')}}" class="needs-validation tooltip-label-right">
            @csrf
            <div class="row">
                <div class="col-6 form-group">
                    <label>Registration No</label>
                    <input type="text" name="registration_no" value="{{ Request::input('registration_no') }}" class="form-control" />
                </div>
                <div class="col-6 form-group">
                    <label>Patient Name</label>
                    <input type="text" name="patient_name" value="{{ Request::input('patient_name') }}" class="form-control" />
                </div>
                <div class="col-12 form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>