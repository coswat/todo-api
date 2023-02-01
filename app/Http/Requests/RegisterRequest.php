<?php

namespace App\Http\Requests;

use App\Models\User;
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
            'name' => ['required', 'min:4', 'max:15'],
            'email' => ['required', 'email', 'min:5', 'unique:users'],
            'password' => ['required', 'min:8'],
            'confirm_password' => ['same:password', 'required'],
        ];
    }
}
