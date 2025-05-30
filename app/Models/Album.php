<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $primaryKey = 'AlbumId';
    protected $fillable = ['Title', 'ArtistId'];

    public $timestamps = false;

    public function artist()
    {
        // albums.ArtistId is the foregin key
        return $this->belongsTo(Artist::class, 'ArtistId');
    }

    public function tracks()
    {
        // tracks.AlbumId is the foregin key column
        return $this->hasMany(Track::class, 'AlbumId');
    }
}
