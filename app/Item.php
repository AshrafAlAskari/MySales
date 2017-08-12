<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   public function customer()
   {
      return $this->belongsTo(Customer::Class);
   }

   public function sale()
   {
      return $this->belongsTo(Sale::Class);
   }

   public function saleNote()
   {
      return $this->belongsTo(SaleNote::Class);
   }
}
