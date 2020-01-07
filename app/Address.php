<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table='user_address';
    protected $fillable=['user_id','name','province_id','city_id','tell','tell_code','mobile','zip_code','address'];
    public $timestamps=false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function get_city()
    {
        return $this->hasOne(City::class, 'id', 'city_id')->withDefault(['name' => '']);
    }

    public function get_province()
    {
        return $this->hasOne(Province::class, 'id', 'province_id')->withDefault(['name' => '']);
    }

}
