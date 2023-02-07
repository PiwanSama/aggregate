<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UniversityProfileResource extends JsonResource
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
            'id'=>$this->id,
            'university'=>$this->university,
            'region'=>$this->region,
            'award'=>$this->award,
            'type'=>$this->type,
            'district_id'=>$this->district_id,
            'details'=> UniversityDetailsResource::collection($this->details),
            'services' => ServiceResource::collection($this->services),
            'programs' => ProgramResource::collection($this->programs),
            'scholarships' => ScholarshipResource::collection($this->scholarships)
        ];
    }
}
