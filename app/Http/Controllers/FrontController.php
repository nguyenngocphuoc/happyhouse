<?php

namespace App\Http\Controllers;
use App\Map;
use App\News;
use App\ReWork;
use App\GroupCategory;
use App\Category;
use App\Advertisement;
use App\Setting;
use Illuminate\Http\Request;
use App\HeroImages;
use App\Comment;
use App\Services;
use App\District;
use App\Status;
use App\User;
use App\InfoSubmit;
use App\DownloadFile;
use Illuminate\Support\Facades\DB;
use File;
class FrontController extends Controller
{
    public function index()
    {
        $newslist = News::latest()
        ->whereHas('category', function($q)
            {
                $q->where('status','=', 1);
            })
        ->whereHas('district', function($q)
            {
                $q->where('status','=', 1);
            })
        ->whereHas('statuses', function($q)
            {
                $q->where('status','=', 1);
            })
        ->with('attributelist')
        ->withCount('conmmentlist')
        ->where('status',1)
        ->take(9)
        ->get()->map(function($list) {
            $list->setRelation('attributelist', $list->attributelist->take(2));
            return $list;
        });
        $districts = District::orderBy('id', 'ASC')
        ->with('newslist')
        ->take(4)
        ->get()
        ->sortBy(function($district)
        {
            return $district->newslist->count();
        });
        return view('frontend.index',compact(
                'newslist',
                'districts'
            )
        );
    }

    public function map()
    {
        $maps = Map::latest()->with('district')->get();
        return view('frontend.map',compact(
                'maps'
            ));
    }

    public function pageCategory($slug)
    {
        $category           = Category::where('slug',$slug)->first();
        $featurednewslist   = $category->newslist()->where('status',1)->where('featured',1)->take(5)->get();
        $newscategorylist   = $category->newslist()->where('status',1)->where('featured',0)->get();
        $advertisements     = Advertisement::where('type','category')->where('slug',$slug)->first();

        return view('frontend.pages.category',compact('category','featurednewslist','newscategorylist','advertisements'));
    }


    public function pageNews($slug)
    {
        $newssingle = News::with('category')->with('user')->with('conmmentlist')->where('slug',$slug)->first();
        $comments = Comment::latest()->where('news_id',$newssingle->id)->get();
        $newssessionkey = 'news-'.$newssingle->id;
        if(!session()->has($newssessionkey)){
            $newssingle->increment('view_count');
            session()->put($newssessionkey,1);
        }
        $districts = District::with('newslist')->get();
        $categories = Category::get();
        $download_files = DownloadFile::get();
        return view('frontend.single-post',compact('newssingle','comments', 'districts', 'categories', 'download_files'));
    }

    public function property(Request $request)
    {
        $newslist = News::latest()
        ->whereHas('category', function($q)
            {
                $q->where('status','=', 1);
            })
        ->whereHas('district', function($q)
            {
                $q->where('status','=', 1);
            })
        ->whereHas('statuses', function($q)
            {
                $q->where('status','=', 1);
            })
        ->with('attributelist')
        ->withCount('conmmentlist')
        ->category($request)
        ->district($request)
        ->floor($request)
        ->room($request)
        ->busStationDistance($request)
        ->isNewly($request)
        ->isForeignNationalityConsultation($request)
        ->freeFirstMonths($request)
        ->receivingTime($request)
        ->price($request)
        ->acreage($request)
        ->tag($request)
        ->where('status',1)
        ->paginate(12);
        $districts = District::with('newslist')->get();
        $categories = Category::get();
        $download_files = DownloadFile::get();
        return view('frontend.property',compact('newslist', 'districts', 'categories', 'download_files'));
    }

    
    public function pageArchive(Request $request)
    {
        $newslist = [];
        
        $newslist = News::select('*')->whereHas('category')->where('title', 'like', '%' .$request->search. '%')
            ->orWhere('slug', 'like', '%'.$request->search.'%')
            ->orWhere('tags', 'like', '%'.$request->search.'%')
            ->orderBy('created_at','desc')
            ->paginate(5);
        $tags = explode("#",$request->search);
        if(count($tags) > 1) {
            $tags = array_slice($tags,1);
            foreach ($tags as $value) {
                $newslist = News::select('*')
                    ->whereHas('category')
                    ->Where('tags', 'like', '%'.$value.'%')
                    ->orderBy('created_at','desc')
                    ->paginate(5); 
            }
        }
        if(substr( $request->search , 0, 5 ) === "time:" ) {
            $search = explode("/",substr( $request->search , 5 ));
            if(count($search) > 1){
                $month = $search[0];
                $year  = $search[1];
                $newslist = News::select('*')
                    ->whereHas('category')
                    ->whereRaw(DB::raw('MONTH(created_at) = ' . $month . ' AND ' . 'YEAR(created_at) = ' . $year))
                    ->orderBy('created_at','desc')
                    ->paginate(5);
            }

        }
        return view('frontend.archive', compact('newslist'));
    }

    public function pageArchiveCategory($slug)
    {
        $category = Category::latest()->where('slug', $slug)->first();
        $newslist = News::latest()->whereHas('category')->where('category_id', $category->id)->paginate(5);
        return view('frontend.archive_category',compact('category', 'newslist'));
    }

    public function pageArchiveCategoryGroup($slug)
    {
        $groupCategory = GroupCategory::latest()->where('slug', $slug)->first();
        $listCategory = Category::latest()->where('group_categories_id', $groupCategory->id)->paginate(5);
        $arr = [];
        foreach ($listCategory as $key => $value) {
            $obj = [];
            $listRework = ReWork::latest()->whereHas('category')->where('category_id', $value->id)->get();
            $obj["list"] = $listRework;
            $obj["categoryInfo"] = $value;
            array_push($arr,$obj);
        }

        return view('frontend.archive_category_group',compact('listCategory', 'arr', 'groupCategory'));
    }

    
    public function contact(Request $request)
    {
        $arrCategory = GroupCategory::latest()->get();
        $news = [];
        if(isset($request->news_id)){
            $news = News::findOrFail($request->news_id);
        }
        return view('frontend.contact',compact('arrCategory','news'));
    }

    public function contractFlow()
    {
        $contract_flow = "";
        if(Setting::latest()->where('id',1)->exists())
            $contract_flow = Setting::latest()->where('id',1)->first()->contract_flow;
                    $news = News::select("tags")->latest()->get();
        $tags = "";
        $count = 0;
        foreach ($news as $new) {
            if($count++>0)
                $tags = $tags. "," .$new->tags;
            else $tags = $new->tags;
        }
        return view('frontend.rental-contract-flow', compact('contract_flow', 'tags'));
    }
    

    public function about()
    {
        $about_us = "";
        if(Setting::latest()->where('id',1)->exists())
            $about_us = Setting::latest()->where('id',1)->first()->about_us;
        $news = News::select("tags")->latest()->get();
        $tags = "";
        $count = 0;
        foreach ($news as $new) {
            if($count++>0)
                $tags = $tags. "," .$new->tags;
            else $tags = $new->tags;
        }
        return view('frontend.about', compact('about_us', 'tags'));
    }

    public function agents()
    {
        $users = User::orderBy('role_id', 'asc')->with('role')->where('status',1)->get();
        return response()->view('frontend.agents', compact('users'));
    }

    public function getSiteMap()
    {
        return response()->view('frontend.sitemap')->header('Content-Type', 'application/xml');
    }

    public function dashboard()
    {
        $file_size = 0;
        $file_count = 0;
        foreach( File::allFiles(public_path('images')) as $file)
        {
            $file_size += $file->getSize();
            $file_count++;
        }
        $newslist = News::latest()
        ->whereHas('category', function($q)
            {
                $q->where('status','=', 1);
            })
        ->whereHas('district', function($q)
            {
                $q->where('status','=', 1);
            })
        ->whereHas('statuses', function($q)
            {
                $q->where('status','=', 1);
            })
        ->withCount('conmmentlist')
        ->where('status',1)
        ->take(9)
        ->get();
        $comment_count = 0;
        $news_count = $newslist->count();
        $view_count = 0;
        foreach($newslist as $news)
        {
            $view_count += $news->view_count;
            if($news->conmmentlist_count > 0)
            $comment_count++;
        }
        $infos = InfoSubmit::latest()->with('news')->where('stage', '<>', 'pending')->get();
        $file_size = number_format($file_size / 1048576,2);
        return view('backend.dashboard', compact('view_count', 'file_size', 'file_count', 'infos', 'comment_count', 'news_count'));
    }
}
