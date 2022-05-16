<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'code' => $this->code,
            'category' => $this->category,
            'brand' => $this->brand,
            'line' => $this->line,
            'model' => $this->model,
            'color' => $this->color,
            'transmission' => $this->transmission,
            'kilometre' => $this->kilometre,
            'engine' => $this->engine,
            'fuel' => $this->fuel,
            'torque' => $this->torque,
            'power' => $this->power,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
            'image' => $this->image,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
