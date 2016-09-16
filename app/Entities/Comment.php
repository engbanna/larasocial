<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Comment extends Model implements Transformable
{
    use TransformableTrait;

    //protected $fillable = [];
    protected $guarded = [];

    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->morphMany('App\Entities\Comment', 'commentable');
    }



    /**
     * Get the comment's user.
     */
    public function user()
    {
        return $this->belongsTo('\App\User');
    }


}
