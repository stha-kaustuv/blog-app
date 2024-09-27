<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogDetailResource extends JsonResource
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
            'extra' => $this->extra,
            'edit_btn' => true,
            'delete_btn' => true,
        ];
    }
}
