<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
   public function saleNote()
   {
      return $this->belongsTo('App\SaleNote');    
   }

   public function customer()
   {
      return $this->belongsTo('App\Customer');
   }

   public function items()
   {
      return $this->hasMany('App\Item');
   }
}
