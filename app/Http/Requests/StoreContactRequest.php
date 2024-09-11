<?php

namespace App\Http\Requests;

use ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreContactRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('keywords.name'),
            'email' => __('keywords.email'),
            'subject' => __('keywords.subject'),
            'message' => __('keywords.message'),
        ];
    }

    // Override the default vaidation error
    protected function failedValidation(Validator $validator)
    {
        if ($this->is('api/*')) {
            $response = ApiResponse::sendResponse(422, 'Validation Errors', $validator->errors());
            throw new ValidationException($validator, $response);
        }
    }
}
