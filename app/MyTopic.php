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

    public function countPost() {
        return ['numPost' => $this->posts()->count()];
    }
    public static function findBySlug($slug, $type){
        return MyTopic::where('slug',$slug)->where('type_posts',$type)->first();
    }
    public static function findByType($type, $amount = 0) {
        return MyTopic::where('type_posts',$type)->take($amount)->get();
    }
    public static function getArrayTags(MyTopic $topic)
    {
        $arrTags = [];
        foreach ($topic->tags as $tag) {
            $arrTags[] = $tag->id;
        }
        return $arrTags;
    }
    public function posts() {
        return $this->hasMany('App\MyPost','my_topics_id');
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
