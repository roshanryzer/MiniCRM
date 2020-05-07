@extends('layouts.master')
@section('title','Employees')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Employees
                    </h3>

                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="alert alert-light alert-elevate" role="alert">
                <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                <div class="alert-text">
                    Here the data is being displayed using <strong>API resource controller</strong>.
                    Crud is done through API resource controller.
                </div>
            </div>
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            API Sourced Employees
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                &nbsp;
                                <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" id="btn-add-employee">
                                    <i class="la la-plus"></i>
                                    New Employee
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="employeeTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                    </table>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal"
         aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">
            <form enctype="multipart/form-data" id="employeeForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <span class="badge bg-green"> <i class="icon la la-users"></i> </span>
                            <span class="badge"> Create New Employee</span>
                        </h4>
                        <button type="button" class="close red" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_first_name" class="control-label"><strong>First Name <span
                                                class="required">*</span></strong></label>
                                    <input type="text" class="form-control" name="employee_first_name"
                                           id="employee_first_name" placeholder="First Name"
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_last_name" class="control-label"><strong>Last Name <span
                                                class="required">*</span></strong></label>
                                    <input type="text" class="form-control" name="employee_last_name"
                                           id="employee_last_name" placeholder="Last Name"
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_email" class="control-label"><strong>Email <span
                                                class="required">*</span></strong></label>
                                    <input type="email" class="form-control" name="employee_email" id="email"
                                           placeholder="user@domain.com" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_phone" class="control-label"><strong>Phone <span
                                                class="required">*</span></strong></label>
                                    <input type="tel" class="form-control" name="employee_phone" id="employee_phone"
                                           placeholder="Example : 01234567899" autocomplete="off">
                                    <span class="form-text text-muted">Phone should start with 0 and contain exact 10 characters</span>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="employee_company" class="control-label"><strong>Company Name
                                    <span class="required">*</span></strong></label>
                            <select class="form-control" name="employee_company" id="employee_company">
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-user-edit"></i> Add Employee
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="modal fade" id="quickModalUpdate" tabindex="-1" role="dialog" aria-labelledby="quickModalUpdate"
         aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">
            <form enctype="multipart/form-data" id="employeeFormUpdate" data-id="">
                {{ method_field('PATCH') }}

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <span class="badge bg-green"> <i class="icon la la-users"></i> </span>
                            <span class="badge">Update Employee</span>
                        </h4>
                        <button type="button" class="close red" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_update_first_name" class="control-label"><strong>First Name
                                            <span
                                                class="required">*</span></strong></label>
                                    <input type="text" class="form-control" name="employee_update_first_name"
                                           id="employee_update_first_name" value="" placeholder="First Name"
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_update_last_name" class="control-label"><strong>Last Name <span
                                                class="required">*</span></strong></label>
                                    <input type="text" class="form-control" name="employee_update_last_name" value=""
                                           id="employee_update_last_name" placeholder="Last Name"
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_update_email" class="control-label"><strong>Email <span
                                                class="required">*</span></strong></label>
                                    <input type="email" class="form-control" name="employee_update_email"
                                           id="employee_update_email"
                                           placeholder="email" value="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_update_phone" class="control-label"><strong>Phone <span
                                                class="required">*</span></strong></label>
                                    <input type="tel" class="form-control" name="employee_update_phone"
                                           id="employee_update_phone" value="" placeholder="Example : 01234567899"
                                           autocomplete="off">
                                    <span class="form-text text-muted">Phone should start with 0 and contain exact 10 characters</span>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="employee_update_company" class="control-label"><strong>Company Name
                                    <span class="required">*</span></strong></label>
                            <select class="form-control" name="employee_update_company" id="employee_update_company">
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-user-edit"></i> Update Employee
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>



@endsection
@section('scripts')

    <script>
        let employeeTable = $('#employeeTable');
        $(document).ready(function () {
            employeeTable.DataTable({
                aaSorting: [1, 'asc'],
                scrollCollapse: true,
                paging: true,
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ url('api/employees/json') }}",
                    type: 'GET',
                    contentType: "application/json",
                    data: {
                        pagination: {
                            perpage: 10,
                        },
                    },
                },
                columnDefs: [
                    {
                        "targets": ["_all"],
                        "className": "text-center",
                        "width": "4%"
                    }
                ],
                columns: [
                    {data: 'id'},
                    {data: 'first_name'},
                    {data: 'last_name'},
                    {
                        data: 'company', orderable: false, searchable: false,
                        render: function (data, type, row) {
                            return '<label class="badge badge-success mb-1r">' + data.name + ' </label>';
                        }
                    },
                    {data: 'email'},
                    {data: 'phone'},

                    {
                        data: 'action', name: 'action', orderable: false, searchable: false
                    }
                ],
            });
        });
        let $modal = $('#quickModal');
        let $updateModal = $('#quickModalUpdate');
        $(document).on("click", "#btn-add-employee", function (e) {
            $('#employeeForm').trigger("reset");
            $('#employee_company').val('').trigger('change');
            $modal.modal('show');
        });

        $(document).on('submit', '#employeeForm', function (e) {
            e.preventDefault();
            let form = new FormData($(this)[0]);
            let params = $(this).serializeArray();
            $.each(params, function (i, val) {
                form.append(val.name, val.value)
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('api/employees') }}",
                contentType: false,
                processData: false,
                data: form,
                dataType: 'json',
                beforeSend: function (data) {
                },
                success: function (response) {
                    $('#quickModal').modal('hide');
                    $('#employeeTable').DataTable().ajax.reload();

                    $.toast({
                        heading: 'Success',
                        text: response.success,
                        position: 'top-right',
                        stack: false,
                        icon: 'success',
                        loader: false,
                    });
                },
                error: function (response) {
                    if (response.status === 422) {
                        $.each(response.responseJSON.errors, function (i, error) {
                            let el = $(document).find('[name="' + i + '"]');
                            el.addClass('is-invalid');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                            setTimeout(function () {
                                el.removeClass('is-invalid');
                            }, 8000);
                        });
                    } else {
                        $.toast({
                            heading: 'Warning',
                            text: response.responseJSON.error,
                            position: 'top-right',
                            stack: false,
                            icon: 'warning',
                            loader: false,
                        });
                    }
                }
            });
        });

        $(document).on("click", ".btn-edit-employee", function (e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let tempEditUrl = "{{ url('api/employees/:id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: tempEditUrl,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: function (data) {
                },
                success: function (response) {

                    $('#employee_update_company').val('').trigger('change');
                    let employee = response;

                    let newdata = {
                        id: employee.company.id,
                        text: employee.company.name
                    };
                    let newOption = new Option(newdata.text, newdata.id, true, true);
                    $('#employee_update_company').append(newOption).trigger('change');

                    $('#employeeFormUpdate').attr('data-id', employee.id);
                    $('#employee_update_first_name').val(employee.first_name);
                    $('#employee_update_last_name').val(employee.last_name);
                    $('#employee_update_email').val(employee.email);
                    $('#employee_update_phone').val(employee.phone);

                    $updateModal.modal('show');
                },
                error: function (response) {
                    $.toast({
                        heading: 'Warning',
                        text: response.responseJSON.error,
                        position: 'top-right',
                        stack: false,
                        icon: 'warning',
                        loader: false,
                    });
                }
            });
        });


        $(document).on("submit", "#employeeFormUpdate", function (e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let tempEditUrl = "{{ url('api/employees/:id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);

            let params = $(this).serializeArray();
            let formData = new FormData($(this)[0]);
            formData.append('id', $(this).attr('data-id'));

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: tempEditUrl,
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (response) {
                    $updateModal.modal('hide');
                    $('#employeeTable').DataTable().ajax.reload();
                    $.toast({
                        heading: 'Success',
                        text: response.success,
                        position: 'top-right',
                        stack: false,
                        icon: 'success',
                        loader: false,
                    });
                },
                error: function (response) {
                    if (response.status === 422) {
                        $.each(response.responseJSON.errors, function (i, error) {
                            let el = $(document).find('[name="' + i + '"]');
                            el.addClass('is-invalid');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                            setTimeout(function () {
                                el.removeClass('is-invalid');
                            }, 8000);

                        });
                    } else {
                        $.toast({
                            heading: 'Warning',
                            text: response.responseJSON.error,
                            position: 'top-right',
                            stack: false,
                            icon: 'warning',
                            loader: false,
                        });
                    }
                },
                complete: function () {
                }
            });
        });

        $(document).on('click', '.btn-delete-employee', function (e) {
            e.preventDefault();
            let id = $(this).attr("data-id");

            $.confirm({
                icon: 'fa fa-exclamation-triangle',
                title: 'Are you sure to Delete?',
                content: 'Employees will be deleted and cannot be recovered !',
                type: 'red',
                typeAnimated: true,
                autoClose: 'cancelAction|9000',
                theme: 'material',
                closeIcon: true,
                animation: 'scale',
                closeAnimation: 'scale',
                buttons: {
                    confirm: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function () {
                            let tempDeleteUrl = "{{ url('api/employees/:id') }}";
                            tempDeleteUrl = tempDeleteUrl.replace(':id', id);
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "DELETE",
                                url: tempDeleteUrl,
                                success: function (response) {
                                    $('#employeeTable').DataTable().ajax.reload();
                                    $.toast({
                                        heading: 'Success',
                                        text: response.success,
                                        position: 'top-right',
                                        stack: false,
                                        icon: 'success',
                                        loader: false,        // Change it to false to disable loader
                                    });
                                },
                                error: function (response) {
                                    $.toast({
                                        heading: 'Warning',
                                        text: response.responseJSON.error,
                                        position: 'top-right',
                                        stack: false,
                                        icon: 'warning',
                                        loader: false,
                                    });
                                },
                            });
                        }
                    },
                    cancelAction: {
                        text: 'Cancel',
                        action: function () {
                            $.toast({
                                heading: 'Delete Cancelled !',
                                text: '<strong>Your data is Safe </strong>',
                                position: 'top-right',
                                stack: false,
                                icon: 'success',
                                loader: false,
                            });
                        }
                    }
                }
            });
        });

    </script>

    <script>
        $('#employee_company,#employee_update_company').select2({
            minimumInputLength: 2,
            maximumSelectionLength: 1,
            ajax: {
                url: '{{ url('api/employees/company')  }}',
                dataType: 'json',
                data: function (params) {
                    return {
                        company: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data) {
                    data.page = data.page || 1;
                    return {
                        results: data.items.map(function (item) {
                            return {
                                id: item.id,
                                text: item.name
                            };
                        }),
                        pagination: {
                            more: data.pagination
                        }
                    }
                },
                cache: false,
                delay: 250
            },
            placeholder: 'Enter Company Name',
            width: '100%',
            multiple: true,
        });
    </script>
@endsection
