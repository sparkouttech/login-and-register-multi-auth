<?php

namespace Sparkouttech\UserMultiAuth\App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that Apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:50',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
         ];
        if(config('user-auth.login_type') == "email"){
            $rules['email'] = 'required|unique:users|email';
            $rules['phone_number'] = 'sometimes|nullable|numeric|min:10|max:10';
        }
        if(config('user-auth.login_type') == "phone"){
            $rules['phone_number'] = 'required|unique:users|numeric';
            $rules['email'] = 'sometimes|nullable|email';
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'phone_number.required' => 'Phone Number is required',
            'password.required' => 'Password is required'
        ];
    }

}
