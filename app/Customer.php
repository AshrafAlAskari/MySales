<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   public function saleNotes()
   {
      return $this->hasMany(SaleNote::Class);
   }

}
