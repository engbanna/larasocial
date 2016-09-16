<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Post extends Model implements Transformable
{
    use TransformableTrait;

    //protected $fillable = [];
    protected $guarded = [];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    public function videoPost()
    {
        return $this->hasOne(VideoPost::class, 'post_id');
    }

    public function imagePost()
    {
        return $this->hasOne(ImagePost::class, 'post_id');
    }


    /**
     * Get the post's  user.
     */
    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }


}
