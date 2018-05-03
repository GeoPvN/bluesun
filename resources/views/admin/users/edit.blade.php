
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="user-dialog-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-edit" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel-edit">Edit User</h4>
            </div>

            <form action="{{ URL::to('admin/users/update') }}" method="POST" role="form" id="user-form-edit" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <img class="img-responsive" src="" alt="img" name="p_name">
                            </div>
                            <div class="form-group">
                                <label>Chosse Photo</label>
                                <input type="file" name="photo_id">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="hidden" name="hidden_id" value="" id="hidden_id">
                                <input type="text" name="fname" class="form-control" placeholder="Enter first name" required="required">
                            </div>
                            <div class="form-group">
                                <label>Born Date</label>
                                <input type="date" name="date" class="form-control" placeholder="Enter date" required="required">
                            </div>
                            <div class="form-group">
                                <label>Member</label>
                                <select class="form-control" name="member_id" required="required">
                                    @foreach($member as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter e-mail" required="required" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Last Nmae</label>
                                <input type="text" name="lname" class="form-control" placeholder="Enter last name" required="required">
                            </div>
                            <div class="form-group">
                                <label>Sex</label>
                                <select class="form-control" name="sex_id" required="required">
                                    @foreach($sex as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter username" required="required">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Enter confirm password">
                            </div>


                        </div>
                        <div class="col-sm-12">
                            <div class="alert alert-danger" id="user-error-edit" style="display: none;">
                                <ul>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" >
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->