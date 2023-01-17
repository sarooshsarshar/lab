<div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalRight" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" class="needs-validation tooltip-label-right" novalidate action="{{route('role.store')}}">
            @csrf;
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group position-relative error-l-50">
                        <label>Role Name</label>
                        <input type="text" name="role_name" class="form-control" required>
                        <span class="text-danger">{{$errors->first('role_name')}}</span>
                        <div class="invalid-tooltip">
                            Role Name Field is required
                        </div>
                    </div>
                    <div class="form-group position-relative error-l-50">
                        <label>Role Title(optional)</label>
                        <input type="text" name="role_title" class="form-control">
                        <span class="text-danger">{{$errors->first('role_title')}}</span>
                        <div class="invalid-tooltip">
                            Role Title Field is required
                        </div>
                    </div>
                    <div class="form-group position-relative error-l-50">
                        <label>Role Description(optional)</label>
                        <input type="text" name="role_des" class="form-control">
                        <span class="text-danger">{{$errors->first('role_des')}}</span>
                        <div class="invalid-tooltip">
                            Role Description Field is required
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>