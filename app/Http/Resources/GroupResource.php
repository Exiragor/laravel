<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
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
            'name' => $this->name,
            'rate_amount' => $this->rate_amount,
            'rate_index' => $this->rate_index,
            'rate_profit' => $this->rate_profit,
            'types' => TypeResource::collection($this->whenLoaded('types'))
        ];
    }
}
