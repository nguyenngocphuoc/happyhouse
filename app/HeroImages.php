<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeroImages extends Model
{
    protected $table = "hero_images";

    protected $fillable = ['title', 'image', 'status'];
}
