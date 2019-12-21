<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function city()
    {
      return $this->belongsTo(City::class);
    }
    public function province()
    {
      return $this->belongsTo(Province::class);
    }

}
