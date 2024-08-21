<?php

namespace App\Http\Requests\Api;

use App\Helpers\ApiResponse;
use App\Models\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:25',
            'email' => ['required', 'email', 'unique:' . User::class],
            'phone' => 'required|string|max:25',
            'password' => Password::default()
            // 'password' => ['string', 'min:3']
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        if ($this->is('api*')) {
            $response = ApiResponse::sendResponse($validator->messages()->all(), 'Register Validation Errors', 422);
        }
        throw new ValidationException($validator, $response);
    }
}