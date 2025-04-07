<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // We can access model properties directly from the $this variable.
        // This is because a resource class will automatically proxy property and method access 
        // down to the underlying model ($this->resource) for convenient access. 
        return [
            // same as $this->resource->AlbumId
            'id' => $this->AlbumId,

            // same as $this->resource->Title
            'title' => $this->Title,

            // same as $this->resource->whenLoaded('artist')
            'artist' => new ArtistResource($this->whenLoaded('artist')),

            // same as $this->resource->whenLoaded('tracks')
            'tracks' => TrackResource::collection($this->whenLoaded('tracks')),
        ];
    }
}
