<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use App\District;
use App\Status;
use App\Gallery;
Use App\Setting;
Use App\Attributes;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
class NewsController extends Controller
{

    public function index()
    {
        $newslist = News::with('category')->where('user_id',Auth::id())->latest()->get();
        return view('backend.news.index', compact('newslist'));
    }


    public function create()
    {
        $categories = Category::latest()->select('id','name')->where('status',1)->get();
        $districts = District::latest()->select('id','name')->where('status',1)->get();
        $statuses = Status::latest()->select('id','name')->get();
        $galleries = Gallery::latest()->select('id','path', 'size')->where('news_id',Setting::getRandomId())->get();
        $attributes = Attributes::latest()->select('id','name', 'value')->where('news_id',Setting::getRandomId())->get();
        return view('backend.news.create', compact('categories', 'districts', 'statuses', 'galleries', 'attributes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|unique:news|max:191',
            'slug'         => 'required|unique:news|max:191',
            'details'       => 'required',
            'address'       => 'required',
            'coords'       => 'required',
            'image'         => 'required|is_img',
            'category_id'   => 'required', 
            'district_id'   => 'required', 
            'statuses_id'     => 'required', 
            'price'         => 'required|integer', 
            'acreage'       => 'required|integer', 
            'floor_amount'  => 'required|integer', 
            'room_amount'   => 'required|integer',
            'bathroom_amount'=> 'required|integer',
            'bed_amount'    => 'required|integer',
            'host_name'     => 'required',
            'phone_number'  => 'required'
        ]);
        if(!Gallery::where('news_id',Setting::getRandomId())->exists())
            return redirect()->back()->withErrors(['gallery' => 'you must select at least 1 image']);
        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        if (strlen($request->image) > 0) {

            $image_array_1 = explode(";", $request->image);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'news-'. time().uniqid(). '.jp2';

            file_put_contents(public_path('images/').$imageName, $data);
        }

        $news_id = News::create([
            'title'         => $request->title,
            'slug'          => str_slug($request->slug),
            'address'       => $request->address,
            'coords'        => $request->coords,
            'category_id'   => $request->category_id,
            'district_id'   => $request->district_id,
            'statuses_id'     => $request->statuses_id,
            'details'       => $request->details,
            'image'         => $imageName,
            'price'         => $request->price,
            'acreage'       => $request->acreage,
            'floor_amount'  => $request->floor_amount,
            'room_amount'   => $request->room_amount,
            'bathroom_amount'=> $request->bathroom_amount,
            'bed_amount'    => $request->bed_amount,
            'host_name'     => $request->host_name,
            'phone_number'  => $request->phone_number,
            'note'          => $request->note,
            'status'        => $status,
            'tags'          => $request->tags,
            'user_id'       => Auth::id()
        ])->id;
        Gallery::where('news_id',Setting::getRandomId())->update(['news_id' => $news_id]);
        Attributes::where('news_id',Setting::getRandomId())->update(['news_id' => $news_id]);
        return redirect()->route('admin.news.index')->with(['message' => 'Tạo thành công!']);
    }


    public function show(News $news)
    {
        $news = News::with('category')->with('district')->with('statuses')->with('gallerylist')->with('attributelist')->findOrFail($news->id);
        return view('backend.news.detail', compact('news'));
    }


    public function edit(News $news)
    {
        $news       = News::findOrFail($news->id);
        $categories = Category::latest()->select('id','name')->where('status',1)->get();
        $districts = District::latest()->select('id','name')->where('status',1)->get();
        $statuses = Status::latest()->select('id','name')->get();
        $galleries = Gallery::latest()->select('id','path', 'size')->where('news_id',$news->id)->get();
        $attributes = Attributes::latest()->select('id','name', 'value')->where('news_id',Setting::getRandomId())->get();
        return view('backend.news.edit', compact('categories','news', 'districts', 'statuses', 'galleries', 'attributes'));
    }


    public function update(Request $request, News $news)
    {
        $request->validate([
            'title'         => 'required|max:191',
            'slug'         => 'required|max:191',
            'address'       => 'required',
            'coords'       => 'required',
            'details'       => 'required',
            'category_id'   => 'required', 
            'district_id'   => 'required', 
            'statuses_id'     => 'required',  
            'price'         => 'required|integer', 
            'acreage'       => 'required|integer', 
            'floor_amount'  => 'required|integer', 
            'room_amount'   => 'required|integer',
            'bathroom_amount'=> 'required|integer',
            'bed_amount'    => 'required|integer',
            'host_name'     => 'required|max:191',
            'phone_number'  => 'required|max:191',
        ]);
        if(!Gallery::where('news_id', $news->id)->exists())
            return redirect()->back()->withErrors(['gallery' => 'you must select at least 1 image']);


        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }


        $news = News::findOrFail($news->id);
        if (strlen($request->image) > 0) {
            // save new images
            $image_array_1 = explode(";", $request->image);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'news-'. time().uniqid(). '.jp2';

            file_put_contents(public_path('images/').$imageName, $data);

            // delete old images
            if(file_exists(public_path('images/') . $news->image)){
                unlink(public_path('images/') . $news->image);
            }
        }else{
            $imageName = $news->image;
        }

        $news->update([
            'title'         => $request->title,
            'slug'          => str_slug($request->slug),
            'address'       => $request->address,
            'coords'        => $request->coords,
            'category_id'   => $request->category_id,
            'district_id'   => $request->district_id,
            'statuses_id'     => $request->statuses_id,
            'details'       => $request->details,
            'image'         => $imageName,
            'price'         => $request->price,
            'acreage'       => $request->acreage,
            'floor_amount'  => $request->floor_amount,
            'room_amount'   => $request->room_amount,
            'bathroom_amount'=> $request->bathroom_amount,
            'bed_amount'    => $request->bed_amount,
            'host_name'     => $request->host_name,
            'phone_number'  => $request->phone_number,
            'note'          => $request->note,
            'status'        => $status,
            'tags'          => $request->tags,
            'user_id'       => Auth::id()
        ]);
        return redirect()->route('admin.news.index')->with(['message' => 'Chỉnh sửa thành công!']);
    }


    public function destroy(News $news)
    {
        News::deleteNews($news);
        return back()->with(['message' => 'Xóa thành công!']);
    }
}
