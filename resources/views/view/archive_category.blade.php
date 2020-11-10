@extends('view.masterPage')
@section('title')
    {{$category->name . ' - ' . strip_tags(App\Setting::getTitle()) }} 
@endsection
@section('content')
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <h1 style="display:none;">{{ $category->name . ' - ' . strip_tags(App\Setting::getTitle())}}</h1>
            <div class="row d-flex">
                <div class="col-xl-8 px-md-5 py-5">
                    <div class="row pt-md-4">
                        @include('view.postitem')
                        <!-- Pagination -->
                        {!! $newslist->links() !!}
                    </div><!-- END-->
                </div>
                @include('view.rightcategorycolumn')
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
@endsection
