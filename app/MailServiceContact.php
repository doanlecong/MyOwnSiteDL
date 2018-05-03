<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailServiceContact extends Model
{
    //
    protected $table = 'mail_service_contacts';

    public function service(){
        return $this->belongsTo('App\MyServiceContact','my_service_contacts_id');
    }
}
