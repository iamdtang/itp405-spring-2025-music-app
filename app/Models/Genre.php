<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $primaryKey = 'GenreId';
    public $timestamps = false;

    public function tracks()
    {
        // hasMany takes 2 additional args, the foreign key and local key (primary key)
        // tracks.GenreId is the foreign key column
        return $this->hasMany(Track::class, 'GenreId', 'GenreId');
    }
}
