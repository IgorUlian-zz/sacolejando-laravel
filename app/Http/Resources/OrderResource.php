<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'identify' => $this->identify,
            'total'=> $this->total,
            'status' => $this->order_status,
            'client' => $this->client_id ? new ClientResource($this->client) : '' ,
            'foods' =>  FoodResource::collection($this->foods),
        ];
    }

}