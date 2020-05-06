@foreach($companies as $company)
    <ul class="sortable ui-sortable" id="sort{{ $company->id }}"
        data-company-id="{{ $company->id }}">
        @if($company->employees()->exists())
            @foreach($company->employees as $employee)
                <li class="text-row ui-sortable-handle"
                    data-employee-id="{{ $employee->id }}">
                    {{ $employee->first_name }} {{ $employee->last_name }}
                    <span class="kt-nav__link-badge">
                        <span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill kt-badge--rounded">
                            {{ $company->name }}
                        </span>
                    </span>
                </li>
            @endforeach
        @endif
    </ul>
@endforeach


<script>

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
