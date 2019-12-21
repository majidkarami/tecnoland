<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function province()
    {
      return $this->belongsTo(Province::class);
    }
    public function addresses(){
      return $this->hasMany(Address::class);
    }
}
