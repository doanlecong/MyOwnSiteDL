<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyFileManagement extends Model
{
    //
    public static function addNew($arrData) {
        $fileManage = new MyFileManagement();
        $fileManage->filename = $arrData['file_name'];
        $fileManage->filepath = $arrData['file_path'];
        $fileManage->file_size = $arrData['file_size'];
        $fileManage->file_type = $arrData['file_type'];
        $fileManage->controller_name = $arrData['controllerName'];
        $fileManage->action_name = $arrData['actionName'];
        $fileManage->purpose = $arrData['purpose'];
        $fileManage->external_id = $arrData['external_id'];
        $fileManage->image_size = $arrData['image_size'];
        $fileManage->save();
    }
    protected $table = "my_file_managements";
}
