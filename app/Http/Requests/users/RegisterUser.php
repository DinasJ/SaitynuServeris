<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|max:255',
            'person.first_name' => 'nullable|alpha|max:255',
            'person.last_name' => 'nullable|alpha|max:255',
            'person.email' => 'nullable|email|max:255',
            'person.phone' => 'nullable|max:255',
            'person.country' => 'nullable|alpha|max:255',
            'person.city' => 'nullable|alpha|max:255',
            'person.date_of_birth' => 'nullable|date',
            'person.gender' => 'nullable|alpha|max:255',
        ];
    }
}
