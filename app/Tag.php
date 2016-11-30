<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    protected $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    } 

    public function texts()
    {
        return $this->morphedByMany(Text::class,  'taggable');
    }

    public function images()
    {
        return $this->morphedByMany(Text::class,  'taggable');
    }
}
