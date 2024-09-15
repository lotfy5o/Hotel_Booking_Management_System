<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            "Name" => $this->full_name,
            "Email" => $this->email,
            "Price" => $this->price,
            "Days" => $this->days,
            "Check Ins" => $this->check_in,
            "Check Out" => $this->check_out,
            "User ID" => $this->user_id,
            "Room ID" => $this->room_id,
            "Hotel ID" => $this->hotel_id
        ];
    }
}
