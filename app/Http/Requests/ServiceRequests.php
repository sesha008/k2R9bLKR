<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequests extends FormRequest
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
            'vehicle_make_id' =>   ['required','integer'],
            'vehicle_model_id' =>  ['required','integer','exists:vehicle_models,id'],
            'client_name' =>  ['required','string','max:50'],
            'client_phone' => ['required','string','max:20'],
            'client_email' => ['required','email'],
            'description' => ['required','string','max:500']
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
    */
    public function attributes()
    {
        return [
            'vehicle_make_id' => 'Vehicle',
            'vehicle_model_id' => 'Vehicle Model',
            'client_name' => 'Name',
            'client_phone' => 'Phone',
            'client_email' => 'Email Address',
            'description' => 'Description'
        ];
    }
}
