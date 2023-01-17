<div id="account__html" class="d-none">
    <div class="card mb-4 test-rec" >
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="mb-4">Test Info</h5>
            </div>
            <div class="test__html" >
                <div class="row">
                    <div class="col-12 form-group position-relative error-l-50">
                        <label>Select Test</label>
                        <select name="test_group[]" id="test-group" class="form-control test-group">
                            @foreach ($groups as $info)
                                <option value="{{$info["id"]}}">{{$info["name"]}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors-> first('patient_name')}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="font-weight-bold">Test Name</label>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">REFERENCE RANGE</label>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">UNIT</label>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">OTHER</label>
                    </div>
                </div>
        
                <div class="test-list">
                    @foreach ($grouptest as $info)
                        <div class="row">
                            <div class="col-md-3 mt-2">
                                {{$info->test_name}}
                            </div>
                            <div class="col-md-3 mt-2">
                                {{$info->prference_range}}
                            </div>
                            <div class="col-md-3 mt-2">
                                {{$info->unit_name}}
                            </div>
                            <div class="col-md-3 mt-2">
                                <input type="text" class="form-control" placeholder="11.7">
                            </div>
                        </div>    
                    @endforeach
                
                </div>
            
            </div>
        </div>
    </div>
    
</div>