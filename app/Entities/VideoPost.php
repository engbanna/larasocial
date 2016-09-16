<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class VideoPost extends Model implements Transformable
{
    use TransformableTrait;

    //protected $fillable = [];
    protected $guarded = [];
    public $timestamps = false;

    public function videoCode(){

        $url = $this->url;
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        $code =  $my_array_of_vars['v'];

        return $code;
    }

}
