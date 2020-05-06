<div class="modal-dialog modal-lg" role="document">
    <form enctype="multipart/form-data" id="companyUpdateForm" data-id="{{ $company->id }}">
        {{ method_field('PATCH') }}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pink"><i class="fa fa-edit pink"></i> Edit Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <h5 class="sub-title">Enter Company Details </h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name" class="control-label"><strong>Name <span
                                        class="required">*</span></strong></label>
                            <input type="text" class="form-control" name="company_name" id="company_name"
                                   @isset($company->name ) value="{{ $company->name }}"
                                   @endisset
                                   autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_email" class="control-label"><strong>Email </strong></label>
                            <input type="email" class="form-control" @isset($company->email ) value="{{ $company->email }}"
                                   @endisset name="company_email" id="company_email" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_website" class="control-label"><strong>Website</strong></label>
                    <input type="text" class="form-control" name="company_website" id="company_website"
                           @isset($company->website ) value="{{ $company->website }}"
                           @endisset
                           autocomplete="off">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_logo" class="control-label"><strong>Company Image </strong></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="company_logo" class="custom-file-input" id="company_logo"
                                           autocomplete="off">
                                    <label class="custom-file-label" for="company_logo">Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            @if(is_file(public_path('storage/companies/'.$company->logo)))
                                <img src="{{ asset('storage/companies/'.$company->logo) }}" alt="{{ $company->name }}"
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
                    Company
                </button>
            </div>
        </div>
    </form>
</div>
