<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePackageRule extends FormRequest
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
            'package_name' => 'required|max:40',
            'package_slogan' => 'required|max:40',
            'total_price' => 'required|gt:0',
            'discount_price' => 'required|gte:0',
            'subscribtion_type' => 'required',
            'trial_days' => 'required|gte:0',
        ];
    }
}
