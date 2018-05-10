<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyTopic extends Model
{
    //
    protected $table = 'my_topics';

    //Hepler Functions

    public static function countTopic($type = '')
    {
        $count = MyTopic::where('type_posts', ConfigData::getConvention($type))->count();
        return $count;
    }

    public static function getArrayTags(MyTopic $topic)
    {
        $arrTags = [];
        foreach ($topic->tags as $tag) {
            $arrTags[] = $tag->id;
        }
        return $arrTags;
    }

    // Relationship functions
    public function typePost()
    {
        return $this->belongsTo('App\MyTypePost', 'type_posts', 'convention');
    }

    public function tags()
    {
        return $this->belongsToMany('App\MyTag');
    }
}
