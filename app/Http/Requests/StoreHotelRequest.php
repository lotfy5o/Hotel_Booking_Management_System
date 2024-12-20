<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelRequest extends FormRequest
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
            'location' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg, jpeg'

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('keywords.name'),
            'location' => __('keywords.location'),
            'image' => __('keywords.image'),
            'description' => __('keywords.description'),
        ];
    }
}
