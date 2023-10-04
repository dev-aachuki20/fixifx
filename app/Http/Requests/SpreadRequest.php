<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SpreadRequest extends FormRequest
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
        $rules = [];

        $rules['category_id']       =  'required|exists:spread_categories,id';
        if($this->spread_id) {
            $rules['symbol']        =   [
                'required',
                Rule::unique('spreads', 'symbol')->where('category_id', $this->category_id)->ignore($this->spread_id)
            ];    
            $rules['ja_symbol']        =   [
                'required',
                Rule::unique('spreads', 'ja_symbol')->where('category_id', $this->category_id)->ignore($this->spread_id)
            ];    
            
        } else {
            $rules['symbol']         =  [
                'required',
                Rule::unique('spreads', 'symbol')->where('category_id', $this->category_id)
            ]; 
            $rules['ja_symbol']         =  [
                'required',
                Rule::unique('spreads', 'ja_symbol')->where('category_id', $this->category_id)
            ]; 
        }
        
        $rules['ultimate_account']  =  'required';
        $rules['premium_account']   =  'required';
        $rules['starter_account']   =  'required';
        
        return $rules;
    }

    public function attributes()
    {
        return [
            'category_id'   =>  'category'
        ];
    }
}
