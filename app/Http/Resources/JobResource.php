<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'=>$this->title,
            'content'=>$this->content,
            'city'=>$this->city,
            'salary'=>$this->salary,
            'category'=>$this->category->name,
            'expire_on'=>$this->expire_on,
            'status'=>$this->status,
        ];
    }
}
