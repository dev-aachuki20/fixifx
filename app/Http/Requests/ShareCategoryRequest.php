<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShareCategoryRequest extends FormRequest
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
            'en_name' => 'required|unique:share_categories,en_name,'.$this->share_category_id,
            'ja_name' => 'required|unique:share_categories,ja_name,'.$this->share_category_id
        ];
    }

    public function messages()
    {
        return [
            'en_name.reuired' => 'This field is required.',
            'en_name.unique' => 'This English Name has already been taken.',
            'ja_name.required' => 'This field is required.',
            'ja_name.unique' => 'This Japanese Name has already been taken',
        ];
    }
}
