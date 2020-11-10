@extends('view.masterPage')

@section('title')
{{ $newssingle->title }}
@endsection

@section('description')
{{ str_limit(strip_tags($newssingle->details),300) }}
@endsection

@section('content')
<style>
    .single-post-detail img{
        max-width:100%;
    }
</style>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" style="padding-top: 3rem !important;">
                    <div class="" style="padding-top: 1.5rem !important;">
                        <div style="display: none">
                            <img src="{{ url('images/'.$newssingle->image) }}" alt="{{ $newssingle->title }}" class="img-fluid mb-4" style="max-width:100px"></div>
                        <div>
                            <h1 class="mb-3 h2">{{ $newssingle->title }}</h1>
                        </div>
                        <!-- Post Meta -->
                        <div class="post-meta-2">
                            <p> {{ $newssingle->view_count }} Lượt xem</p>
                        </div>
                        <div class="single-post-detail">
                            {!! $newssingle->details !!}
                        </div>
                        <div class="fb-share-button" data-href="{{url('/news/'.$newssingle->slug)}}" data-layout="button" data-size="small">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('/news/'.$newssingle->slug)}}" class="fb-xfbml-parse-ignore">Chia sẻ</a>
                        </div>
                        <div class="tag-widget post-tag-container mb-5 mt-5">
                            <div class="tagcloud">
                                @foreach(explode(',',$newssingle->tags) as $tag)
                                    @if(!ctype_space($tag))
                                    <a class="tag-cloud-link" href="{{url('/search') . '?search=' .urlencode('#' . $tag)}}">{{ $tag }} </a>                            
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="about-author d-flex p-4 bg-light">
                            <div class="bio mr-5">
                                <img src="{{ url('images/'.$newssingle->user->photo) }}" alt="Image placeholder" class="img-fluid mb-4" style="max-width:100px">
                            </div>
                            <div class="desc">
                                <h3>{{$newssingle->user->name}}</h3>
                                <p>{{ $newssingle->user->description }}</p>
                            </div>
                        </div>
                        <div class="pt-5 mt-5" style="width: 100%">
                            @if(count($comments)>0)<h3 class="mb-5 font-weight-bold">{{\count($comments)}} Bình Luận</h3>@endif
                            <ul class="comment-list" >
                                @foreach($comments as $comment)
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="https://www.shareicon.net/data/512x512/2017/01/06/868320_people_512x512.png" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>{{$comment->name}}</h3>
                                        <div class="meta">{{$comment->created_at->diffForHumans()}}</div>
                                        {{$comment->content}}
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <!-- END comment-list -->

                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">Viết bình luận</h3>
                                <form action="{{route('comments.store')}}" method="POST" class="p-3 p-md-5 bg-light" id="commentform">
                                    @csrf    
                                    <input type="hidden" class="form-control" name="newsId" id="newsId" value="{{$newssingle->id}}">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control" name="website" id="website">
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="content" id="message" cols="30" rows="10"
                                            class="form-control" maxlength="191" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input id="submitcmt" type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- END-->
                </div>
                @include('view.rightcategorycolumn',['class'=> 'col-lg-4 sidebar ftco-animate bg-light pt-5 fadeInUp ftco-animated'])
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
@section('script')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=622413644906429&autoLogAppEvents=1" nonce="MjeuY6l4"></script>

<script src="{{url('js/zoomImg.js')}}"></script>
<script>
    zoomImg('div.single-post-detail img')
        /*var frm = $('#commentform');
        frm.submit(function (ev) {
            ev.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                    toastr.error(data,'SUCCESS',{ progressBar: true });
                    $("#commentform")[0].reset();
                }
            });
           
        });*/

</script>
@endsection
@endsection
