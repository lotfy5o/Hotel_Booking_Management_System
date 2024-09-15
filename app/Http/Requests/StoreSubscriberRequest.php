<?php

namespace App\Http\Requests;

use ApiResponse;
use App\Models\Subscriber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreSubscriberRequest extends FormRequest
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
            'subscr_email' => 'required|email|unique:subscribers,subscr_email',

        ];
    }

    public function attributes()
    {
        return [
            'subscr_email' => __('keywords.email'),

        ];
    }



    protected function failedValidation(Validator $validator)
    {
        if ($this->is('api/*')) {
            $response = ApiResponse::sendResponse(422, 'Validation Error', $validator->messages()->all());

            throw new ValidationException($validator, $response);
        }
    }
}
