<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VpsenquiryRequest extends FormRequest
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
            'fname' => 'required|string|min:3|max:20|regex:/^[A-Za-z]+$/',
            'lname' => 'required|string|min:3|max:40|regex:/^[A-Za-z]+$/',
            'email' => 'required|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/|unique:vps_enquiries',
            'phone_number'   => 'required|numeric|digits_between:10,15',
        ];
    }
}
