<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'address' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
            'dribbble' => 'nullable|url',
            'twitter' => 'nullable|url',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',

        ];
    }

    public function attributes()
    {
        return [
            'address'   => __('keywords.address'),
            'phone'     => __('keywords.phone'),
            'dribbble'  => __('keywords.dribbble'),
            'twitter'   => __('keywords.twitter'),
            'website'   => __('keywords.website'),
            'facebook'  => __('keywords.facebook'),
            'instagram' => __('keywords.instagram'),

        ];
    }
}
