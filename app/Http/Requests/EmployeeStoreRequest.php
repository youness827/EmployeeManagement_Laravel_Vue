<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'firstname'=> ['required'],
            'lastname'=>['required'],
            'middlename'=>['required'],
            'adress'=>['required'],
            'zipcode'=>['required'],
            'country_id'=>['required'],
            'state_id'=>['required'],
            'city_id'=>['required'],
            'departement_id'=>['required'],
            'birthdate'=>[''],
            'datehierd'=>['']


        ];
    }
}
