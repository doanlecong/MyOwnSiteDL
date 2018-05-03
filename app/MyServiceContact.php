<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyServiceContact extends Model
{
    //
    protected $table = 'my_service_contacts';

    public function serviceFile() {
        return $this->hasOne('App\MyServiceFile','my_service_contacts_id');
    }

    public function mailService() {
        return $this->hasOne('App\MailServiceContact','my_service_contacts_id');
    }
}
