<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){
      return $this->belongsToMany(Product::class)->withPivot('qty');
    }

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function payment(){
      return $this->hasOne(Payment::class);
    }
}
