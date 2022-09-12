<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class CountryStoreRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:20',
            'capital' => 'required',
            'currency' => 'required',
            'shortcode' => 'required',
            'callingcode' => 'required',
            'flag' => 'required|nullable',

        ];
    }
}
