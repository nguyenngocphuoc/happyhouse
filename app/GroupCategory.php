<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupCategory extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'status'];


    public function categorylist()
    {
        return $this->hasMany('App\Category');
    }
    public function groupCategorylist()
    {
        return $this->hasMany('App\GroupCategory');
    }
}
