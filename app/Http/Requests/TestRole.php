<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRole extends FormRequest
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
            'patient_name' => 'bail|required|max:220',
            'age' => 'bail|required|gt:0',
            'gender' => 'bail|required',
            'email' => 'bail|nullable|email:rfc,dns',
            'phone_no' => 'bail',
            'reffered_by' => 'bail|nullable|max:120',
            'other_info' => 'bail|nullable|max:500',
            'register_date' => 'bail|required',
            'values' => 'bail|required',
            'test_id.*' => 'bail|required',
            'test_id.*' => 'bail|required',
            "test_group.*" => "bail|required",
        ];
    }
}
