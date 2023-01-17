<div class="modal fade modal-right" id="updateGroup{{$info->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalRight" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update {{$info->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            

                <form method="post" action="{{route('group.update',$info->id)}}" class="needs-validation tooltip-label-right" novalidate>
                    @csrf
                    <div class="modal-body">
                    <div class="form-group">
                        <label>Group Name</label>
                        <input type="text" required value="{{$info->name}}" class="form-control" placeholder="Group Name" name="name">
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
