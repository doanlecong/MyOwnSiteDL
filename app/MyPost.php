<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyPost extends Model
{

    public static function countPostBaseType($type_post = '')
    {
        $count = MyPost::where('type_posts', ConfigData::getConvention($type_post))->count();
        return $count;
    }

    protected $table = 'my_posts';

    public function topic()
    {
        return $this->belongsTo('App\MyTopic', 'my_topics_id');
    }

    public function typePost()
    {
        return $this->belongsTo('App\MyTypePost', 'my_type_posts_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\MyTag');
    }
}
