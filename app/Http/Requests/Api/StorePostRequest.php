<?php

namespace App\Http\Requests\Api;
use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'cover_image' => 'required|image',
            'pinned' => 'required|boolean',
            // 'tags' => 'required|array', 
            // 'tags.*' => 'exists:tags,id', 
        ];
    }
    protected function failedValidation(Validator $validator)
    {

        if ($this->is('api*')) {
            $response = ApiResponse::sendResponse($validator->errors(), 'Store Post Error', 422);
        }
        throw new ValidationException($validator, $response);
    }
}