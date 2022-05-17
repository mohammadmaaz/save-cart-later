<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'bc_cart_id' => $this->bc_cart_id,
            'name' => $this->name,
            'amount' => $this->amount,
            'items' => CartItemResource::collection($this->whenLoaded('items')),
            'items_count' => $this->when(isset($this->items_count),$this->items_count),
        ];
    }
}
