<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|string|max:100',
            'last_name'  => 'required|regex:/^[\pL\s\-]+$/u|string|max:100',
            // 'company_name' => 'required',
            'email' =>  'required|email:dns',
            // 'email' =>  'required|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/',
            'already_customer' => 'required',
            // 'account_no' => 'required',
            'from_country' => 'required',
            'phone_no' => 'required|string|between:10,20',
            'question'  =>  'required',
            'message'   => 'required',
            'captcha'   =>  'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'already_customer.required' => 'This field is required.',
            'captcha.captcha'           => 'Enter valid captcha code.',
        ];
    }
}
