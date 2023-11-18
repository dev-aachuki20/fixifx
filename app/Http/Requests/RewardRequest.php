<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RewardRequest extends FormRequest
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

        // $rules['category_id']       =  'required|exists:spread_categories,id';
        // if($this->reward_id) {
        //     $rules['symbol']        =   [
        //         'required',
        //         Rule::unique('spreads', 'symbol')->where('category_id', $this->category_id)->ignore($this->spread_id)
        //     ];    
        //     $rules['ja_symbol']        =   [
        //         'required',
        //         Rule::unique('spreads', 'ja_symbol')->where('category_id', $this->category_id)->ignore($this->spread_id)
        //     ];    

        // } else {
        //     $rules['symbol']         =  [
        //         'required',
        //         Rule::unique('spreads', 'symbol')->where('category_id', $this->category_id)
        //     ]; 
        //     $rules['ja_symbol']         =  [
        //         'required',
        //         Rule::unique('spreads', 'ja_symbol')->where('category_id', $this->category_id)
        //     ]; 
        // }

        $rules['trade']    =  'required';
        $rules['volume']   =  'required';
        $rules['points']   =  'required';
        // $rules['image']    =  'required|image|mimes:svg';

        // If it's an update, make the image field optional
        if ($this->isMethod('post')) {
            $rules['image'] = 'nullable|image|mimes:svg';
        } else {
            // For new records, make the image field required
            $rules['image'] = 'required|image|mimes:svg';
        }

        return $rules;
    }

    // public function attributes()
    // {
    //     return [
    //         'category_id'   =>  'category'
    //     ];
    // }
}
