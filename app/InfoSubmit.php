<?php

namespace App;

use App\GroupCategory;
use Illuminate\Database\Eloquent\Model;

class InfoSubmit extends Model
{
    protected $fillable = [
        'name', 'email', 'message', 'orders', 'phone', 'appoinment','star','note','order_code', 'stage' ];
    public function news()
    {
      return $this->hasOne('App\News', 'id', 'orders');
    }
}
