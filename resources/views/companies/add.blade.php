<div class="modal-dialog modal-lg" role="document">
    <form enctype="multipart/form-data" id="companyForm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <span class="badge bg-green"> <i class="icon la la-building"></i> </span>
                    <span class="badge "> Create New Company</span>
                </h4>
                <button type="button" class="close red" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name" class="control-label"><strong>Name <span
                                        class="required">*</span></strong></label>
                            <input type="text" class="form-control" name="company_name" id="company_name"
                                   placeholder="Company Name"
                                   autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_email" class="control-label"><strong>Email </strong></label>
                            <input type="email" class="form-control" name="company_email" id="company_email"
                                   placeholder="Company Email"
                                   autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_website" class="control-label"><strong>Website</strong></label>
                            <input type="text" class="form-control" name="company_website" id="company_website"
                                   placeholder="Example : http://yourdomain.com" autocomplete="off">
                            <span class="form-text text-muted">Website should start from https:// or http://</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_logo" class="control-label"><strong>Company Image <span
                                        class="required">*</span></strong></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="company_logo" class="custom-file-input" id="company_logo"
                                           autocomplete="off">
                                    <label class="custom-file-label" for="company_logo">Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close
                </button>
                <button type="submit" class="btn btn-success"><i class="fas fa-user-edit"></i> Add Company</button>
            </div>
        </div>
    </form>
</div>
