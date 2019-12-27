<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public static function search($data)
    {
        $string = "";
        $name = self::orderby('id', 'DESC');
        if (array_key_exists('name', $data) && !empty($data['name'])) {
            $name = $name->where('name', 'like', '%' . $data['name'] . '%');
            $string = '?name=' . $data['name'];
        }

        $name = $name->paginate(10);
        $name = $name->withPath($string);
        return $name;
    }

}
