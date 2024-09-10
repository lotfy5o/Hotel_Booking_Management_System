<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResrouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'price' => $this->price . ' dollars',
            'number of persons' => $this->num_persons,
            'size' => $this->size . ' square meter',
            'view' => $this->view,
            'number of beds' => $this->num_beds,
            'hotel' => $this->hotel->name,
        ];
    }
}
