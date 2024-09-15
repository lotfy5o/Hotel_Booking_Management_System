<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'website' => $this->website,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'twitter' => $this->twitter,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'dribbble' => $this->dribbble,

        ];
    }
}
