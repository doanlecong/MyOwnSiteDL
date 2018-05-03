<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyTag extends Model
{
    //
    protected $table = 'my_tags';

    public function topics() {
        return $this->belongsToMany('App\MyTopic');
    }
}
