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
        return [
            'user_id' => $this->user_id,
            'nama_user' => $this->nama_user,
            'username' => $this->username,
            'email' => $this->email,
            'tanggal_lahir' => $this->tanggal_lahir,
            'gender' => $this->gender,
            'kota' => $this->kota,
            'role' => $this->role,
            'total_poin' => $this->total_poin,
        ];
    }
}
