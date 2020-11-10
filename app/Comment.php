<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['news_id', 'name', 'email', 'website', 'content'];
    public function news()
    {
      return $this->hasOne('App\News', 'id', 'news_id');
    }
}
