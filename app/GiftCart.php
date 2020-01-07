<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int time
 * @property int code_time
 */
class GiftCart extends Model
{
    protected $fillable=['code','value','time','user_id','date','status'];

    public $timestamps = false;

    public function get_user()
    {
        return $this->hasOne(User::class,'id','user_id')->withDefault(['username'=>'حذف شده']);
    }
}
