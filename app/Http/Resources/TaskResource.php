<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => TaskCategoryResource::make($this->category),
            'owner' => UserResource::make($this->owner),
            'assigned_user' => UserResource::make($this->assignedUser),
            'estimated_minutes' => $this->estimated_minutes,
            'completed_at' => $this->completed_at,
        ];
    }
}
