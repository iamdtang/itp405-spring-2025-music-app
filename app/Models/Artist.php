<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $primaryKey = 'ArtistId';

    public function albums()
    {
        // hasMany takes 2 additional args, the foreign key and local key (primary key)
        // albums.ArtistId is the foregin key column
        return $this->hasMany(Album::class, 'ArtistId', 'ArtistId');
    }
}
