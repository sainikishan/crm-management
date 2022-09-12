<?php

namespace App\Http\Requests\Zipcode;

use Illuminate\Foundation\Http\FormRequest;

class ZipcodeRequest extends FormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'streetname'=> 'required',
            'streetnumber' => 'required',
        ];
    }
}
