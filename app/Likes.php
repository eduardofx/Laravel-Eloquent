<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    public function likable()
    {
        return $this->morphTo();
    }
}
