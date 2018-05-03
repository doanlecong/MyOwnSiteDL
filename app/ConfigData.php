<?php

namespace App;

class ConfigData
{
    public static $nullValueForString = "NULL";
    public static $imageWidthForRepresent = 400;
    public static $imageHeightForRepresent = 300;
    public static $maximumContactPerDay = 20;
    // Dành cho lúc tao mới chỉnh sửa thông tin Tag

    public static function arrDataForFileManagement($controlerName = '', $actionName = '', $purpose = '', $external_id, $file_type = '', $file_name = '', $file_path = '', $file_size, $image_zize = '')
    {
        return [
            'controllerName' => $controlerName,
            'actionName' => $actionName,
            'purpose' => $purpose,
            'external_id' => $external_id,
            'file_type' => $file_type,
            'file_size' => $file_size,
            'file_path' => $file_path,
            'file_name' => $file_name,
            'image_size' => $image_zize
        ];
    }
    public static function getArrayService() {
        return [
            '1' => 'Web',
            '2' => 'Mobile',
            '3' => 'Logo/Banner'
        ];
    }
    public static function getArrTypeImage() {
        return [
            'jpg','jpeg','png','gif','svg'
        ];
    }
    public static function getArrTypeFile() {
        return[
            'xlsx','csv','docx','pptx','pdf','ppt'
        ];
    }
    public static $arrKeyMimeType = [
        'txt' => 'text/plain',
        'html' => 'text/html',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
        'doc' => 'application/msword',
        'dot' => 'application/msword',

        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
        'docm' => 'application/vnd.ms-word.document.macroEnabled.12',
        'dotm' => 'application/vnd.ms-word.template.macroEnabled.12',

        'xls' => 'application/vnd.ms-excel',
        'xlt' => 'application/vnd.ms-excel',
        'xla' => 'application/vnd.ms-excel',

        'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'xltx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
        'xlsm' => 'application/vnd.ms-excel.sheet.macroEnabled.12',
        'xltm' => 'application/vnd.ms-excel.template.macroEnabled.12',
        'xlam' => 'application/vnd.ms-excel.addin.macroEnabled.12',
        'xlsb' => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',

        'ppt' =>  'application/vnd.ms-powerpoint',
        'pot' =>  'application/vnd.ms-powerpoint',
        'pps' =>  'application/vnd.ms-powerpoint',
        'ppa' =>  'application/vnd.ms-powerpoint',

        'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'potx' => 'application/vnd.openxmlformats-officedocument.presentationml.template',
        'ppsx' => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
        'ppam' => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
        'pptm' => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
        'potm' => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
        'ppsm' => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',

        'mdb'  => 'application/vnd.ms-access'
    ];
    public static function getContentTypeResponseBaseFileType($fileType ='') {
        return static::$arrKeyMimeType[$fileType];
    }

    public static function getArrayTypeTAG()
    {
        return [
            '1' => 'Chuyên đề',
            '2' => 'My Blog',
            '3' => 'Serie Bài Viết',
            '4' => 'Vui nhộn',
            '5' => 'Tâm sự',
            '6' => 'Chia sẻ',
            '8' => 'Hài hước',
            '9' => 'Điên điên',
            '10' => 'Bẩn Bựa',
            '11' => 'Ngựa Ngựa'
        ];
    }

}
