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
    public function toArray(Request $request): array
    {
        return [
            'user_id'=>$this->user_id,
            'room_id'=>$this->room_id,
            'check_in_at'=>$this->check_in_at,
            'check_out_at'=>$this->check_out_at,
            'status'=>$this->status->name,
        ];
    }
}
