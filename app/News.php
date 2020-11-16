<?php

namespace App;
use App\District;
use App\Category;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'slug', 'address', 'coords','details', 'image', 'bus_station_distance', 'free_first_months', 'is_foreign_nationality_consultation', 'is_newly_built_properties', 'receiving_time', 'category_id', 'district_id', 'statuses_id', 'status', 'price', 'acreage', 'floor_amount', 'room_amount','bathroom_amount','bed_amount','host_name','phone_number','note','user_id','view_count', 'tags'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function district()
    {
        return $this->belongsTo('App\District');
    }
    public function statuses()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function attributelist()
    {
        return $this->hasMany('App\Attributes');
    }
    public function conmmentlist()
    {
        return $this->hasMany('App\Comment');
    }

    public function gallerylist()
    {
        return $this->hasMany('App\Gallery');
    }

    public static function deleteNews($news)
    {
        $news = News::findOrFail($news->id);

        if(file_exists(public_path('images/') . $news->image)){
            unlink(public_path('images/') . $news->image);
        }
        $galleries = Gallery::latest()->select('path')->where('news_id',$news->id)->get();
        foreach ($galleries as $gallery) {
            if(file_exists(public_path('images/') . $gallery->path)){
                unlink(public_path('images/') . $gallery->path);
            }
        }
        Gallery::where('news_id',$news->id)->delete();
        Comment::where('news_id',$news->id)->delete();
        $news->delete();
    }

    public function scopeTag($query, $request)
    {
        if ($request->has('tags')) {
            $query->where('tags', 'LIKE', '%' . $request->tag . '%');
        }
        return $query;
    }

    public function scopePrice($query, $request)
    {
        $priceRange = explode(";", $request->price);
        $price_min = $request->has('price') && count($priceRange) ? $priceRange[0] : config('properties.priceRange.min');
        $price_max = $request->has('price') && count($priceRange) ? $priceRange[1] : config('properties.priceRange.max');
        $query->where('price', '>=', $price_min);
        $query->where('price', '<=', $price_max);
        return $query;
    }
    public function scopeAcreage($query, $request)
    {
        $acreageRange = explode(";", $request->acreage);
        $acreage_min = $request->has('acreage') && count($acreageRange) >=2 ? $acreageRange[0] : config('properties.acreageRange.min');
        $acreage_max = $request->has('acreage') && count($acreageRange) >=2 ? $acreageRange[1] : config('properties.acreageRange.max');
        $query->where('acreage', '>=', $acreage_min);
        $query->where('acreage', '<=', $acreage_max);
        return $query;
    }
    public function scopeDistrict($query, $request)
    {
        $district = $request->district;
        if ($request->has('district')) {
            $check = District::where('romanji_name','=', $district)->get();
            if($check->count() > 0){
                return $query->whereHas('district', function($q) use($district)
                {
                    $q->where('romanji_name','=', $district);
                    $q->where('status','=', 1);
                });
            }
        }
        else return $query->whereHas('district', function($q)
        {
            $q->where('status','=', 1);
        });
    }
    public function scopeCategory($query, $request)
    {
        $category = $request->category;
        if ($request->has('category')) {
            $check = Category::where('id','=', $category)->get();
            if($check->count() > 0){
                return $query->whereHas('category', function($q) use($category)
                    {
                        $q->where('id','=', $category);
                        $q->where('status','=', 1);
                    });
            }
        }
        else return $query->whereHas('category', function($q)
        {
            $q->where('status','=', 1);
        });
    }
    
    public function scopeFloor($query, $request)
    {
        if($request->has('floor_amount')&&is_numeric($request->floor_amount))
            return $query->where('floor_amount', '=', $request->floor_amount);
        return $query;
    }
    
    public function scopeRoom($query, $request)
    {
        if($request->has('room_amount')&&is_numeric($request->room_amount))
            return $query->where('room_amount', '=', $request->room_amount);
        return $query;
    }

    public function scopeBusStationDistance($query, $request)
    {
        if($request->has('bus_station_distance')&&is_numeric($request->bus_station_distance))
            return $query->where('bus_station_distance', '<', $request->bus_station_distance);
        return $query;
    }

    public function scopeIsNewly($query, $request)
    {
        if($request->has('is_newly_built_properties'))
            return $query->where('is_newly_built_properties', '=', TRUE);
        return $query;
    }
    public function scopeIsForeignNationalityConsultation($query, $request)
    {
        if($request->has('is_foreign_nationality_consultation'))
            return $query->where('is_foreign_nationality_consultation', '=', TRUE);
        return $query;
    }
    public function scopeFreeFirstMonths($query, $request)
    {
        if($request->has('free_first_months')&&is_numeric($request->free_first_months))
            return $query->where('free_first_months', '>=', $request->free_first_months);
        return $query;
    }
    public function scopeReceivingTime($query, $request)
    {
        if($request->has('receiving_time')&&is_numeric($request->receiving_time))
            return $query->whereDate('receiving_time', '<=', $request->receiving_time);
        return $query;
    }
}
