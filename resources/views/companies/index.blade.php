@extends('layouts.master')
@section('title','Companies')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Companies
                    </h3>

                </div>
            </div>
        </div>

        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="alert alert-light alert-elevate" role="alert">
                <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                <div class="alert-text">

                    <strong>Create, Update and Delete</strong> is performed without refreshing the page.
                    <strong> Resource Controller</strong> is used to perform CRUD operations.
                    Here the data is being displayed Json response. Crud is done through FORMS returning blade.

                </div>
            </div>
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                        <h3 class="kt-portlet__head-title">
                            Ajax Sourced Companies
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                &nbsp;
                                <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" id="btn-add-company">
                                    <i class="la la-plus"></i>
                                    New Company
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="companyTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Email</th>
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
    </div>
@endsection
@section('scripts')
    <script>
        let companyTable = $('#companyTable');
        $(document).ready(function () {
            companyTable.DataTable({
                aaSorting: [1, 'asc'],
                scrollCollapse: true,
                paging: true,
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('companies.json') }}",
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
                    {data: 'name'},
                    {data: 'logo', orderable: false, searchable: false},
                    {data: 'website', orderable: false, searchable: false},
                    {data: 'email', orderable: false, searchable: false},

                    {
                        data: 'action', name: 'action', orderable: false, searchable: false
                    }
                ],
            });
        });


        let $modal = $('#quickModal');


        $(document).on("click", "#btn-add-company", function (e) {
            e.preventDefault();
            let tempEditUrl = "{{ route('companies.create') }}";
            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on('submit', '#companyForm', function (e) {
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
                url: "{{ route('companies.store') }}",
                contentType: false,
                processData: false,
                data: form,
                dataType: 'json',
                beforeSend: function (data) {
                },
                success: function (response) {
                    $('#quickModal').modal('hide');
                    $('#companyTable').DataTable().ajax.reload();

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

        $(document).on("click", ".btn-edit-company", function (e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let tempEditUrl = "{{ route('companies.edit', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);

            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("submit", "#companyUpdateForm", function (e) {
            e.preventDefault();
            let params = $(this).serializeArray();
            let formData = new FormData($(this)[0]);
            formData.append('id', $(this).attr('data-id'));

            $.each(params, function (i, val) {
                formData.append(val.name, val.value);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('companies.update.company') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (response) {
                    $('#quickModal').modal('hide');
                    $('#companyTable').DataTable().ajax.reload();
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

        $(document).on('click', '.btn-delete-company', function (e) {
            e.preventDefault();
            let id = $(this).attr("data-id");

            $.confirm({
                icon: 'fa fa-exclamation-triangle',
                title: 'Are you sure to Delete?',
                content: 'all associated Employees will also be deleted and cannot be recovered !',
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
                            let tempDeleteUrl = "{{ route('companies.destroy', ':id') }}";
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
                                    $('#companyTable').DataTable().ajax.reload();
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
@endsection
