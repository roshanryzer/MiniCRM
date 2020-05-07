<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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

        if (request()->method() === 'PUT' || request()->method() === 'PATCH') {
            $rules = ['name' => 'required|unique:companies,name,' . $this->route('companies') . ',id'];
        } else {
            $rules = ['name' => 'required|unique:companies,name'];
        }
        return [
            'company_name' => $rules['name'],
            'company_email' => 'required|email',
            'company_website' => 'required|url',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6144|dimensions:min_width=100,min_height=100',
        ];
    }
}
