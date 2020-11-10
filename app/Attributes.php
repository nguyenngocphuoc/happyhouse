<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $fillable = ['news_id', 'name', 'value'];
    public function news()
    {
      return $this->hasOne('App\News', 'id', 'news_id');
    }
}
