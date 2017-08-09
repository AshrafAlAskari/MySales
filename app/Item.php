<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   public function customer()
   {
      return $this->belongsTo('App\Customer');
   }

   public function sale()
   {
      return $this->belongsTo('App\Sale');
   }
}
