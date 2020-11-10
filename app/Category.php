<?php

namespace App;
use App\News;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'status', 'group_categories_id'];

    
    public function newslist()
    {
        return $this->hasMany('App\News');
    }

    public function groupCategory()
    {
      return $this->hasOne('App\GroupCategory', 'id', 'group_categories_id');
    }
    public static function deleteCategory($category)
    {
        if(file_exists(public_path('images/') . $category->image)){
            unlink(public_path('images/') . $category->image);
        }
        $newses = News::latest()->where('category_id',$category->id)->get();
        foreach ($newses as $news) {
          News::deleteNews($news);
        }
        $category->delete();
    }
}
