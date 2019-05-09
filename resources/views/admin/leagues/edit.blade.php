
<!-- Modal -->
<div class="modal fade" id="league-dialog-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-edit" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel-edit">Edit League</h4>
            </div>

            <form action="{{ URL::to('admin/leagues/update') }}" method="POST" role="form" id="league-form-edit" enctype="multipart/form-data">

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
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>League</label>
                                <input type="hidden" name="hidden_id" value="" id="hidden_id">
                                <input type="text" name="name" class="form-control" placeholder="Enter league" required="required">
                            </div>
                            <div class="form-group">
                                <label>Division</label>
                                <input type="text" name="division" class="form-control" placeholder="Enter division" required="required">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="alert alert-danger" id="league-error-edit" style="display: none;">
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