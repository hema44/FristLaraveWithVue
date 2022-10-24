<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class userResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'        => (int)$this->id,
            'name'      => $this->name,
            'email'     => $this->email,
        ];
    }
}
