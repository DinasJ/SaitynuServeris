<?php

namespace App\Http\Requests\trips;

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
        $role = auth()->user()->role;
        return $role === 'admin' || $role === 'driver';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from' => 'required|max:255',
            'to' => 'required|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'seats_available' => 'required|numeric|min:0',
            'price_per_person' => 'nullable|numeric|min:0',
            'conversations' => 'nullable|boolean',
            'pets' => 'nullable|boolean',
            'smoking' => 'nullable|boolean',
            'music' => 'nullable|boolean',
        ];
    }
}
