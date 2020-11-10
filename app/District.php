<?php

namespace App;
use App\News;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
    protected $fillable = ['name', 'romanji_name', 'image', 'status'];
    
    public function newslist()
    {
        return $this->hasMany('App\News');
    }
    public function maplist()
    {
        return $this->hasMany('App\Map');
    }
    public static function deleteDistrict($district)
    {
        $newses = News::latest()->where('district_id',$district->id)->get();
        foreach ($newses as $news) {
          News::deleteNews($news);
        }
        $district->delete();
    }
}
