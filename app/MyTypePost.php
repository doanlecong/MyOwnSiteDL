<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyTypePost extends Model
{
    public static function getTypePostName($typePostID) {
        $typePost = static::find($typePostID);
//        echo var_dump($typePost);
        return ($typePost) ? $typePost->title : '';
    }

    protected $table = 'my_type_posts';
}
