<div class="modal-dialog modal-lg" role="document">
    <form enctype="multipart/form-data" id="employeeForm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <span class="badge bg-green"> <i class="icon fas fa-user-edit pink"></i> </span>
                    <span class="badge bg-green text-white"> Create New Employee</span>
                </h4>
                <button type="button" class="close red" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="sub-title">Enter Employee Details </h5>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_name" class="control-label"><strong>Name <span
                                        class="required">*</span></strong></label>
                            <input type="text" class="form-control" name="employee_name" id="employee_name"
                                   autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_email" class="control-label"><strong>Email </strong></label>
                            <input type="email" class="form-control" name="employee_email" id="employee_email"
                                   autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_website" class="control-label"><strong>Website</strong></label>
                            <input type="text" class="form-control" name="employee_website" id="employee_website"
                                   autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_logo" class="control-label"><strong>Employee Image <span
                                        class="required">*</span></strong></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="employee_logo" class="custom-file-input" id="employee_logo"
                                           autocomplete="off">
                                    <label class="custom-file-label" for="employee_logo">Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close
                </button>
                <button type="submit" class="btn btn-success"><i class="fas fa-user-edit"></i> Add Employee</button>
            </div>
        </div>
    </form>
</div>
