<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $fillable = ['name', 'status', 'color'];
    public static function deleteStatus($status)
    {
        $newses = News::latest()->where('status_id',$status->id)->get();
        foreach ($newses as $news) {
          News::deleteNews($news);
        }
        $status->delete();
    }
    public function newslist()
    {
        return $this->hasMany('App\News');
    }
}
