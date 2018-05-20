<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyViewPost extends Model
{
    //
    public static function addNew(MyPost $post) {
        $countPost = new MyViewPost();
        $countPost->my_post_id = $post->id;
        $countPost->count = 1;
        $countPost->save();
    }
    public static function getCount(MyPost $post) {
        if($countView = MyViewPost::where('my_post_id',$post->id)->first()){
            return $countView->count;
        }
        return 0;
    }
    public static function increase(MyPost $post) {
        if($countView = MyViewPost::where('my_post_id',$post->id)->first()) {
            $countView->count += 1;
            $countView->save();
        }
    }
    protected $fillable = ['my_post_id','count'];
    protected $table = 'count_post_views';
    public function post() {
        return $this->belongsTo('App\MyPost');
    }
}
