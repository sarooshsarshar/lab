<div class="modal fade modal-right" id="addTest" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalRight" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{route('test.store')}}" class="needs-validation tooltip-label-right" novalidate>
                    @csrf
                    <div class="form-group position-relative error-l-50">
                        <label>Group Name</label>
                        <select name="group_id" class="form-control">
                            @foreach ($group as $info)
                        <option value="{{$info->id}}">{{$info->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-tooltip">
                            Group Name is required!

                        </div>
                    </div>
                    <div class="form-group position-relative error-l-50">
                        <label>Test Name</label>
                        <input type="text" required class="form-control" placeholder="Test Name" name="name">
                        <div class="invalid-tooltip">
                            Test Name is required!

                        </div>
                    </div>
                    <div class="form-group position-relative error-l-50">
                        <label>Test Price</label>
                        <input type="text"  class="form-control" placeholder="Test Price" name="price">
                        <div class="invalid-tooltip">
                            Test Price is required!

                        </div>
                    </div>
                    <div class="form-group position-relative error-l-50">
                        <label>Test Duration</label>
                        <input type="text"  class="form-control" placeholder="Test Duration" name="duration">
                        <div class="invalid-tooltip">
                            Test Duration is required!

                        </div>
                    </div>
                    <div class="form-group position-relative error-l-50">
                        <label>Preference Range</label>
                        <textarea id="text" name="preference_range" rows="2" cols="45"></textarea>
                        <!-- <input type="text" required class="form-control" placeholder="Range" name="preference_range"> -->
                        <div class="invalid-tooltip">
                            Preference Range is required!

                        </div>
                    </div>
                    <div class="form-group position-relative error-l-50">
                        <label>Details</label>
                        <textarea value="{{$info->detail}}" class="form-control" placeholder="Test Details" name="detail" rows="4" cols="45"></textarea>
                        <div class="invalid-tooltip">
                            Test details is required!

                        </div>
                    </div>
                    
                    <div class="form-group position-relative error-l-50">
                        <label>Unit</label>
                        <select name="unit" class="form-control">
                            <option value="" selected>No Unit</option>
                            @foreach ($units as $info)
                                <option value="{{$info["id"]}}">{{$info["unit_name"]}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-tooltip">
                            Unit is required!

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
