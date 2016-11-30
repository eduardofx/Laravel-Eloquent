<?php

namespace App;

use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
     use SoftDeletes;

    //protected $fillable = ['title','body'];
    protected $fillable = ['id','created_at','updated_at'];
    //protected $dates = ['created_at','updated_at','published_at'];
    protected $dates = ['published_at','deleted_at'];



    protected $casts = [
            'asdf' => 'integer',
    ];

    public function setTitleAttribute($value)
    {
            $this->attributes['title'] = strtolower($value);
    }

    public function getTitleAttribute($value)
    {
            return ucfirst($value);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('published', function(Builder $builder){
            $builder->where('published_at', '<', Carbon::now()->format('Y-m-d H:i:s'));
        });
    }


    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

}
