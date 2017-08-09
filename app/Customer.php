<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   public function items()
   {
      return $this->hasMany('App\Item');
   }

   public function sales()
   {
      return $this->hasMany('App\Sale');
   }

   public function saleNotes()
   {
      return $this->hasMany('App\SaleNote');
   }

}
