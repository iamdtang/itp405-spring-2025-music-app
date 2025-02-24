<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $primaryKey = 'AlbumId';

    public function artist()
    {
        // albums.ArtistId is the foregin key
        return $this->belongsTo(Artist::class, 'ArtistId');
    }
}
