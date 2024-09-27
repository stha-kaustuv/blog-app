<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
             'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'user_id' => $this->user_id,
            'created_by' => $this->created_by,
            'extra' => $this->extra
        ];
    }
}
