<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobApplyResource extends JsonResource
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
            'user'=>$this->user->name,
            'job_id'=>$this->job_id,
            'job_title'=>$this->job->title,
            'user_info'=>$this->user_info,
            'status'=>$this->status->name,
        ];
    }
}
