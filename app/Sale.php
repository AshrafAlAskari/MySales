<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
   public function saleNote()
   {
      return $this->belongsTo(SaleNote::Class);    
   }

   public function customer()
   {
      return $this->belongsTo(Customer::Class);
   }

   public function items()
   {
      return $this->hasMany(Item::Class);
   }
}
