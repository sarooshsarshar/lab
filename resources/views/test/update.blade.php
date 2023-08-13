<div class="modal fade modal-right" id="updateTest{{$info->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalRight" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update {{$info->test_name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            

                <form method="post" action="{{route('test.update',$info->id)}}" class="needs-validation tooltip-label-right" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Group Name</label>
                            <select name="group_id" class="form-control">
                                @foreach ($group as $gr)
                            <option value="{{$gr->id}}" {{$gr->id == $info->group_id?"selected":""}}>{{$gr->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group position-relative error-l-50">
                        <label>Test Name</label>
                        <input type="text" value="{{$info->test_name}}" required class="form-control" placeholder="Test Name" name="name">
                        <div class="invalid-tooltip">
                            Test Name is required!

                        </div>
                    </div>
                    <div class="form-group position-relative error-l-50">
                        <label>Test Price</label>
                        <input type="text" required value="{{$info->test_price}}" class="form-control" placeholder="Test Price" name="price">
                        <div class="invalid-tooltip">
                            Test Price is required!

                        </div>
                    </div>
                    <div class="form-group position-relative error-l-50">
                        <label>Test Duration</label>
                        <input type="text" required value="{{$info->test_duration}}" class="form-control" placeholder="Test Duration" name="duration">
                        <div class="invalid-tooltip">
                            Test Duration is required!

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Preference Range</label>
                        <textarea value="{{$info->prference_range}}" class="form-control" placeholder="Range" name="preference_range" rows="2" cols="45"></textarea>
                        <!-- <input type="text"  value="{{$info->prference_range}}" class="form-control" placeholder="Range" name="preference_range"> -->
                    </div>
                    <div class="form-group position-relative error-l-50">
                        <label>Test Details</label>
                        <textarea value="{{$info->detail}}" class="form-control" placeholder="Test Details" name="detail" rows="4" cols="45"></textarea>
                         <!-- <input type="text" word-break: break-word value="{{$info->detail}}" required class="form-control" placeholder="Test Details" name="detail" rows="2" cols="45"> -->
                        <div class="invalid-tooltip">
                            Test Name is required!

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <select name="unit" class="form-control">
                            <option value="" selected>No Unit</option>
                            @foreach ($units as $un)
                                <option {{$un["id"] == $info->unit_id ?"selected":""}}  value="{{$un["id"]}}">{{$un["unit_name"]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>
