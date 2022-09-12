<?php

namespace App\Http\Requests\Cityzipcode;

use Illuminate\Foundation\Http\FormRequest;

class CityzipcodeRequest extends FormRequest
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
            'zipcode'=>'required',
            'country_city_id'=>'required',

        ];
    }
}
