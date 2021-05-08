<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'model'=>'required|string',
            'age'=>'required|integer',
            'registration_number'=>'required|string',
            'seats_number'=>'required|integer',
            'fuel_type'=>'required|string',
//            'is_automatic'=>'boolean',
            'price' => 'required|numeric',
            'class_id' => 'required|integer',
            'notes' => 'required|string'
        ];
    }
}
