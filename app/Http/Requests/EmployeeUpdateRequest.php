<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee_update_first_name' => 'required|string',
            'employee_update_last_name' => 'required|string',
            'employee_update_email' => 'required|email',
            'employee_update_company' => 'required|exists:employees,id',
            'employee_update_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
    }
}
