<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id'         => $this->id,
            'username'   => $this->username,
            'mobile'     => $this->mobile,
            'location'   => [
                'lat' => $this->location?->lat,
                'lng' => $this->location?->lng,
            ],
            'image' => $this->image 
        ];

        if ($this->token)
            $data['token'] = $this->token;
        return $data;
    }
}
