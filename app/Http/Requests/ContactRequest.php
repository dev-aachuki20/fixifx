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
            'first_name' => 'required',
            'last_name'  => 'required',
            // 'company_name' => 'required',
            'email' =>  'required|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/',
            'already_customer' => 'required',
            // 'account_no' => 'required',
            'country' => 'required',
            'phone_no' => 'required',
            'question'  =>  'required',
            'message'   => 'required',
            'captcha'   =>  'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'captcha.captcha' => 'Enter valid captcha code.',
        ];
    }
}
