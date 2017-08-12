<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleNote extends Model
{
   public function sales()
   {
      return $this->hasMany(Sale::Class);
   }

   public function customer()
   {
      return $this->belongsTo(Customer::Class);
   }
}
