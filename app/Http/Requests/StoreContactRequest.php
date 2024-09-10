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
            'email' => 'required|email|unique:contacts,email',
            'subject' => 'required',
            'message' => 'required',

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
            $response = ApiResponse::sendResponse(422, 'Validation Errors', $validator->messages()->all());
            throw new ValidationException($validator, $response);
        }
    }
}
