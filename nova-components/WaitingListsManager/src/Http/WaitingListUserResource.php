<?php

namespace Vatsimuk\WaitingListsManager\Http;

use Illuminate\Http\Resources\Json\JsonResource;

class WaitingListUserResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->pivot->position,
            'created_at' => $this->created_at,
            'status' => new WaitingListStatusResource($this->pivot->status->where('end_at', null)->first()),
        ];
    }
}