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
        if(config('user-auth.login_type') == "email"){
           return [
           'email' => 'required|unique:users|email',
           'name' => 'required|string|max:50',
           'password' => 'required'
        ];
        }
        if(config('user-auth.login_type') == "phone"){
            return [ 
            'phone_number' => 'required|unique:users|min:10|max:10',
            'name' => 'required|string|max:50',
            'password' => 'required'
        ];
        }
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required!',
            'email.required' => 'Email is required!',
            'phone_number.required' => 'Phone Number is required!',
            'password.required' => 'Password is required!'
        ];
    }

}
