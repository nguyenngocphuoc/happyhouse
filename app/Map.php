<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $table = 'map';
    protected $fillable = ['district_id', 'coords', 'shape'];
    public function district()
    {
      return $this->hasOne('App\District', 'id', 'district_id');
    }
    public static function deleteMap($category)
    {
        $category->delete();
    }
}
