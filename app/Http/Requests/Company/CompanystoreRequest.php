<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanystoreRequest extends FormRequest
{
    
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|string|min:3|max:20',
            'email' => 'required|email',
            'logo'  => 'required',
            'url'  => 'nullable|url',
        ];
    }
}
