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
            'fname'          => 'required|string|min:3|max:20|regex:/^[A-Za-z]+$/',
            'lname'          => 'required|string|min:3|max:40|regex:/^[A-Za-z]+$/',
            'email'          => 'required|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/|unique:vps_enquiries',
            'phone_number'   => 'required|numeric|digits_between:10,15',
        ];
    }
    
    public function messages()
    {
        return [
            'fname.required'                => 'The first name is required.',
            'fname.string'                  => 'The first name must be a string.',
            'fname.min'                     => 'The first name must be at least :min characters.',
            'fname.max'                     => 'The first name may not be greater than :max characters.',
            'fname.regex'                   => 'The first name format is invalid.',
    
            'lname.required'                => 'The last name is required.',
            'lname.string'                  => 'The last name must be a string.',
            'lname.min'                     => 'The last name must be at least :min characters.',
            'lname.max'                     => 'The last name may not be greater than :max characters.',
            'lname.regex'                   => 'The last name format is invalid.',
    
            'email.required'                => 'The email is required.',
            'email.regex'                   => 'The email format is invalid.',
            'email.unique'                  => 'The email has already been taken.',
    
            'phone_number.required'         => 'The phone number is required.',
            'phone_number.numeric'          => 'The phone number must be a number.',
            'phone_number.digits_between'   => 'The phone number must be between :min and :max digits.',
            
        ];
    }
}
