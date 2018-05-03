<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyServiceFile extends Model
{
    //
    public static function addNew($filename,$filesize,$filetype,$myServiceContactId,$folderSave,$linkExternal) {
        $myfile = new MyServiceFile();
        $myfile->file_name = $filename;
        $myfile->file_type = $filetype;
        $myfile->file_size = $filesize;
        $myfile->my_service_contacts_id = $myServiceContactId;
        $myfile->folder_save = $folderSave;
        $myfile->link_external = $linkExternal;
        $myfile->save();
    }

    protected $table = 'my_service_files';
}
