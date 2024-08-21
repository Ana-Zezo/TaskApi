<?php

namespace App\Http\Requests\Api;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreTagRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:tags,name'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        if ($this->is('api*')) {
            $response = ApiResponse::sendResponse($validator->errors(), 'Store Tag Error', 422);
        }
        throw new ValidationException($validator, $response);
    }
}