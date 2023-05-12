<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductShow extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user->name,
            'categories' => json_decode($this->categories),
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'stock' => $this->stock,
            'created_at' => $this->created_at->format("d M Y"),
            'updated_at' => $this->updated_at->format("d M Y"),
        ];
    }
}
