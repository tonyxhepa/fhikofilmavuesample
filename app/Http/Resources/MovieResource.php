<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
             'title' => $this->title,
             'runing_time' => $this->runing_time,
             'release_date' => $this->release_date,
             'slug' => $this->slug,
             'movie_actor' => $this->movie_actor,
             'movie_description' => $this->movie_description,
             'movie_review' => $this->movie_review,
             'trailers' => TrailerResource::collection($this->trailerlinks),
             'shikolinks' => ShikolinkResource::collection($this->shikolinks),
             'shkarkolinks' => ShkarkolinkResource::collection($this->shkarkolinks),  
             'embeds' => EmbedResource::collection($this->embeds),
             'photos' => PhotoResource::collection($this->photos)
        ];
    }

    public function with($request)
    {
        return [
           'version' => 'demo',
        ];
    }
}
