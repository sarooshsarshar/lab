<div class="modal fade modal-right" id="updateUnit{{$info->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalRight" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update {{$info->unit_name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{route('unit.update',$info->id)}}" class="needs-validation tooltip-label-right" novalidate>
                    @csrf
                    <div class="form-group">
                        <label>Unit Name</label>
                        <input type="text" required value="{{$info->unit_name}}" class="form-control" placeholder="Unit Name" name="unit_name">
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
