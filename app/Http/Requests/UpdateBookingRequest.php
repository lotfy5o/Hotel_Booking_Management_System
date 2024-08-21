<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
            'status' => 'required|string',
            // 'image' => 'required|image|mimes:png,jpg, jpeg'

        ];
    }

    public function attributes()
    {
        return [
            'status' => __('keywords.status'),
            // 'image' => __('keywords.image'),

        ];
    }
}
