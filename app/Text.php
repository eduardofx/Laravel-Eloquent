<?php

namespace App;

use App\Tags;
use App\Likes;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ['title', 'body'];

    public function likes()
    {
        return $this->morphMany(Likes::class, 'likeable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
