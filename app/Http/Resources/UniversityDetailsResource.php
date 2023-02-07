<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UniversityDetailsResource extends JsonResource
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
            'name' => $this->name,
            'motto' => $this->uni_motto,
            'description' => $this->uni_details,
            'badge' => $this->uni_badge_url,
            'contact' => $this->uni_contact,
            'website' => $this->uni_website,
            'facebook' => $this->facebook_url,
            'twitter' => $this->twitter_url,
            'instagram_url' => $this->instagram_url,
            'linkedin_url' => $this->linkedin_url
        ];
    }
}
