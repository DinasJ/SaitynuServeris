<?php

namespace App\Http\Requests\vehicles;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->role === 'driver';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'license_plate' => 'required|max:255',
            'model' => 'required|max:255',
            'color' => 'required|alpha|max:255',
        ];
    }
}
