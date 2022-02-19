<?php

namespace Sparkouttech\UserMultiAuth\App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckEmailRequest extends FormRequest {

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
        return [
            'email' => 'required_if:inputs,==,email|email',
            'phone_number' => 'required_if:inputs,==,phone|max:10|min:10',
           ];
    }

    public function messages(): array
    {
        return [];
    }

}
