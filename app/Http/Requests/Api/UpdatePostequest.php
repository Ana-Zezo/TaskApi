<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
class UpdatePostequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255',
            'body' => 'sometimes|required|string',
            'cover_image' => 'sometimes|image',
            'pinned' => 'sometimes|required|boolean',
            'tags' => 'sometimes|required|array',
            'tags.*' => 'exists:tags,id',
        ];
    }
    protected function failedValidation(Validator $validator)
    {

        if ($this->is('api*')) {
            $response = ApiResponse::sendResponse($validator->errors(), 'Update Post Error', 422);
        }
        throw new ValidationException($validator, $response);
    }
}