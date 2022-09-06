<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
{
    
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname'=> 'required|min:3|max:20',
            'lastname'=> 'required|min:3|max:20',
            'company'=> 'required',
            'email' =>'required|email',
            'phone' =>'required',
        ];
    }
}
