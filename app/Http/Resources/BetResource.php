<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'currency_id' => $this->currency_id,

            'payment' => new PaymentResource($this->whenLoaded('payment')),
            'type' => new TypeResource($this->whenLoaded('type')),
            'group' => new GroupResource($this->whenLoaded('group')),
        ];
    }
}
