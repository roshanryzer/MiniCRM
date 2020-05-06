<div class="modal-dialog modal-lg" role="document">
    <form enctype="multipart/form-data" id="employeeUpdateForm" data-id="{{ $employee->id }}">
        {{ method_field('PATCH') }}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pink"><i class="fa fa-edit pink"></i> Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                   @isset($employee->name ) value="{{ $employee->name }}"
                                   @endisset
                                   autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_email" class="control-label"><strong>Email </strong></label>
                            <input type="email" class="form-control" @isset($employee->email ) value="{{ $employee->email }}"
                                   @endisset name="employee_email" id="employee_email" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="employee_website" class="control-label"><strong>Website</strong></label>
                    <input type="text" class="form-control" name="employee_website" id="employee_website"
                           @isset($employee->website ) value="{{ $employee->website }}"
                           @endisset
                           autocomplete="off">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_logo" class="control-label"><strong>Employee Image </strong></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="employee_logo" class="custom-file-input" id="employee_logo"
                                           autocomplete="off">
                                    <label class="custom-file-label" for="employee_logo">Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            @if(is_file(public_path('storage/employees/'.$employee->logo)))
                                <img src="{{ asset('storage/employees/'.$employee->logo) }}" alt="{{ $employee->name }}"
                                     height="100"
                                     width="auto" class="img-thumbnail">
                            @endif
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close
                </button>
                <button type="submit" class="btn btn-success"><i class="fas fa-user-edit"></i> Update
                    Employee
                </button>
            </div>
        </div>
    </form>
</div>
