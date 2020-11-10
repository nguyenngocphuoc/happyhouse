<!-- Sidebar Widget -->

@if(isset($class))
<div class="{{ $class }}">
@else
<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
@endif
            <!-- Top Search Area -->
                <div class="sidebar-box pt-md-4">
	              <form action="{{ route('page.search') }}" method="GET"
                                    role="form" class="search-form mobile-hide">
	                <div class="form-group">
                        <span class="icon icon-search"></span>
                        <button id="searchBtn" type="submit" style="display: none;"></button>
                        <input id="searchInput" type="text" class="form-control" name="search" placeholder="Type a keyword and hit enter" value="<?php if(isset($_GET["search"])) echo $_GET["search"]?>"> 
                        <script>
                            var input = document.getElementById("searchInput");
                            input.addEventListener("keyup", function(event) {
                                // Number 13 is the "Enter" key on the keyboard
                                if (event.keyCode === 13) {
                                    // Cancel the default action, if needed
                                    event.preventDefault();
                                    // Trigger the button element with a click
                                    document.getElementById("searchBtn").click();
                                }
                            });
                        </script>
                    </div>
                  </form>
	            </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Thể Loại</h3>
                        <ul class="categories">
                        @php $categories = \App\Category::select( Illuminate\Support\Facades\DB::raw('COUNT(news.id) as count') ,'name','categories.slug', 'categories.id')->leftJoin('news', function($join) {$join->on('news.category_id', '=', 'categories.id'); })->groupBy("categories.id")->orderBy("count","desc")->take(10)->get() @endphp
                        @foreach($categories as $category)
                            <li>
                                <a href="{{url('/category/'.$category->slug)}}">{{ $category->name }} 
                                    <span>{{$category->count}}</span>
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Phổ Biến</h3>
                        @php $topnewslist   = \App\News::select( 'image','slug','title','view_count', 'news.created_at', Illuminate\Support\Facades\DB::raw('COUNT(comments.id) as cmtCount'))->leftJoin('comments', function($join) {$join->on('comments.newsId', '=', 'news.id'); })->where('status',1)->groupBy("news.id")->orderBy("view_count", "desc")->take(5)->get() @endphp
                        @foreach($topnewslist as $key => $topnews)
                        <div class="block-21 mb-4 d-flex">
                            <a href="{{ url('news/'.$topnews->slug) }}" class="blog-img mr-4" style="background-image: url({{ asset('images/'.$topnews->image) }});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="{{ url('news/'.$topnews->slug) }}">{{ str_limit(strip_tags($topnews->title), 50)}}</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> {{$topnews->created_at->diffForHumans()}}</a></div>
                                    <div><a href="#"><span class="icon-person"></span> {{ $topnews->view_count }} Lượt xem</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> {{ $topnews->cmtCount }} Bình luận </a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Tag Cloud</h3>
                        <ul class="tagcloud">
                            @php $tags = \Config::get('properties.tags') @endphp
                            @foreach(explode(',',$tags) as $tag)
                                <a href="{{url('/search') . '?search=' .urlencode('#' . $tag)}}">{{ $tag }} 
                                </a>                            
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-box subs-wrap img py-4" style="background-image: url({{url('images/bg_1.jpg')}});">
                        <div class="overlay"></div>
                        <h3 class="mb-4 sidebar-heading">Theo dõi</h3>
                        <p class="mb-4">Gửi email cho chúng tôi để được nhận bài viết mới nhất từ {{\strip_tags(App\Setting::getTitle())}}</p>
                        <form action="{{route('follows.store')}}" method="POST" class="subscribe-form">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" id="email" required class="form-control" placeholder="Email Address">
                                <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Archives</h3>
                        <ul class="categories">
                            @php
                                $timeLines = \App\News::select( 
                                    Illuminate\Support\Facades\DB::raw('EXTRACT(month FROM created_at) "Month"') ,
                                    Illuminate\Support\Facades\DB::raw('EXTRACT(year FROM created_at) "Year"') ,
                                    Illuminate\Support\Facades\DB::raw('count(*) as countNews'))
                                    ->groupBy(Illuminate\Support\Facades\DB::raw('EXTRACT(month FROM created_at)'))
                                    ->orderBy(Illuminate\Support\Facades\DB::raw('EXTRACT(month FROM created_at)'),"DESC")
                                    ->get() 
                            @endphp    
                            @foreach($timeLines as $timeLine)
                            <li><a href="{{ route('page.search') . '?search=time:' . $timeLine->Month . '/' . $timeLine->Year}}"> {{\date('F', mktime(0, 0, 0, $timeLine->Month, 10))}} ,{{$timeLine->Year}} <span>({{$timeLine->countNews}})</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!--
                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                            necessitatibus voluptate quod mollitia delectus aut.</p>
                    </div>
                    -->
                </div><!-- END COL -->