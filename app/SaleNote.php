<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleNote extends Model
{
   public function sales()
   {
      return $this->hasMany('App\Sale');
   }

   public function customer()
   {
      return $this->belongsTo('App\Customer');
   }
}
