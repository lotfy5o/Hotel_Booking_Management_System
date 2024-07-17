<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:png,jpg, jpeg',
            'hotel_id' => 'required|exists:hotels,id',
            'price' => 'required|numeric|min:0',
            'size' => 'required|numeric|min:9',
            'num_beds' => 'required|integer|min:1',
            'num_persons' => 'required|integer|min:1',
            'view' => 'required|string|max:255',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('keywords.name'),
            'image' => __('keywords.image'),
            'hotel_id' => __('keywords.hotel_id'),
            'price' => __('keywords.price'),
            'size' => __('keywords.size'),
            'num_beds' => __('keywords.num_beds'),
            'num_persons' => __('keywords.num_persons'),
            'view' => __('keywords.view'),

        ];
    }
}
