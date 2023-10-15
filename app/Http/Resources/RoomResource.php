<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'room_no'=>$this->room_no,
            'price'=>$this->price,
            'photo_url'=>$this->photo_path,
            'type'=>$this->type->name,
            'status'=>$this->status->name,
        ];
    }
}
