<!-- Related Post Area -->
<div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
    <!-- Section Title -->
    <div class="section-heading">
        <h5>Bài viết cùng chủ đề</h5>
    </div>
    <!--{{ $news = \App\News::latest()->where('category_id',$categoryId)->where('status',1)->take(3)->get()}}-->
    <div class="row">
        @foreach($news as $new)
        <!-- Single Blog Post -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="single-blog-post style-4 mb-30">
                <div class="post-thumbnail">
                    <img src="{{ asset('images/'.$new->image) }}" alt="{{ $new->title }}" title="{{ $new->title }}">
                </div>
                <div class="post-content">
                    <a href="{{ url('news/'.$new->slug) }}" class="one-line-title post-title" title="{{ $new->title }}">{{ $new->title }}</a>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{ $new->view_count }} lượt xem</a>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>