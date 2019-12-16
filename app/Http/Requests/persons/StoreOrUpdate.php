<?php

namespace App\Http\Requests\persons;

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
            'first_name' => 'nullable|alpha|max:255',
            'last_name' => 'nullable|alpha|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|max:255',
            'country' => 'nullable|alpha|max:255',
            'city' => 'nullable|alpha|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
        ];
    }
}
