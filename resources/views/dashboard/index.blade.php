@extends('layouts.master')
@section('title','Dashboard')
@section('styles')
    <style>
        .task-board {
            background: #3cbbcb;
            display: inline-block;
            padding: 12px;
            border-radius: 3px;
            width: 700px;
            white-space: nowrap;
            overflow-x: scroll;
            min-height: 300px;
        }

        .status-card {
            width: 250px;
            margin-right: 8px;
            background: #e2e4e6;
            border-radius: 3px;
            display: inline-block;
            vertical-align: top;
            font-size: 0.9em;
        }

        .status-card:last-child {
            margin-right: 0px;
        }

        .card-header {
            width: 100%;
            padding: 10px 10px 0px 10px;
            box-sizing: border-box;
            border-radius: 3px;
            display: block;
            font-weight: bold;
        }

        .card-header-text {
            display: block;
        }

        ul.sortable {
            padding-bottom: 10px;
        }

        ul.sortable li:last-child {
            margin-bottom: 0px;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0px;
        }

        .text-row {
            padding: 15px 10px;
            margin: 10px;
            background: #fff;
            box-sizing: border-box;
            border-radius: 3px;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
            font-size: 0.8em;
            white-space: normal;
            line-height: 20px;
        }

        .ui-sortable-placeholder {
            visibility: inherit !important;
            background: transparent;
            border: #666 2px dashed;
        }

    </style>


@endsection

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">Dashboard </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Employees
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-section">
                                <div class="kt-section__content kt-section__content--border kt-section__content--fit" id="employee-card">
                                    @includeIf('dashboard.employee-card',compact($companies))
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Companies with Employees
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-section">
                                <div class="kt-section__content kt-section__content--border kt-section__content--fit">

                                    <div id="demo-content">
                                        <div class="task-board"  id="company-card">
                                            @includeIf('dashboard.company-card',compact($companies))

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('ul[id^="sort"]').sortable({
            connectWith: ".sortable",
            stop: function (event, ui) {
                let company_id = $(ui.item).parent(".ui-sortable").data("company-id");
                let employee_id = $(ui.item).data("employee-id");
                let data = {company_id: company_id, employee_id: employee_id,};
                $.ajax({
                    data: data,
                    type: 'POST',
                    url: '{{ route('dashboard.sort') }}',
                    success: function (response) {
                        renderList();
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
            }
        }).disableSelection();
        function renderList(){
            $.ajax({
                type: 'GET',
                url: '{{ route('dashboard.employees-list') }}',
                success: function (response) {
                    $('#employee-card').replaceWith($('#employee-card').html(response));
                },
                error: function () {
                }
            });

            $.ajax({
                type: 'GET',
                url: '{{ route('dashboard.companies-list') }}',
                success: function (response) {
                    $('#company-card').replaceWith($('#company-card').html(response));
                },
                error: function () {
                }
            });
        }
    </script>

@endsection
