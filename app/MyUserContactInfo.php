<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\ConfigData;
class MyUserContactInfo extends Model
{
    //
    public static function addNew(Request $request){
        $myUserContact = new MyUserContactInfo();
        $myUserContact->name = $request->name_nguoi;
        $myUserContact->email = $request->email;
        $myUserContact->remote_address = $request->ip();
        $myUserContact->user_agent = $request->header('User-Agent');
        $myUserContact->save();
    }
    public static function checkThresholdRequest(Request $request){
        $now = date('Y-m-d 00:00:00');
        $remoteAddress = $request->ip();
        $userAgent = $request->header('User-Agent');
        $userContactCount = DB::table('my_user_contact_infos')
            ->where([
                ['remote_address','=',$remoteAddress],
                ['user_agent', '=', $userAgent]
            ])->where('created_at','>=',$now)->count();

        if($userContactCount > ConfigData::$maximumContactPerDay) {
            return false;
        }
        return true;
    }
    protected $table = 'my_user_contact_infos';
}
