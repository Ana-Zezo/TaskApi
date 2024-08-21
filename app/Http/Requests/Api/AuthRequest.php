<?php

namespace App\Http\Requests\Api;

use App\Helpers\ApiResponse;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class AuthRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email|max:255',
            'password' => 'required'
        ];
    }
    protected function failedValidation(Validator $validator)
    {

        if ($this->is('api*')) {
            $response = ApiResponse::sendResponse($validator->errors(), 'Login Validation Errors', 422);
        }
        throw new ValidationException($validator, $response);
    }
}