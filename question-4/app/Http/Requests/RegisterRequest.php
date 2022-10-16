<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_name' => 'required|string|unique:users|max:24|regex:/^[a-zA-Z0-9_]+$/i',
            'fullname' => 'required|string|max:255',
            'email' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:12',
            'phone_number' => 'required|numeric|size:10',
            'password' => 'required|max:255|min:6',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
