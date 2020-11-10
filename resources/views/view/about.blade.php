@extends('view.masterPage')
@section('content')
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" style="padding-top: 3rem !important;">
                    <div class="" style="padding-top: 1.5rem !important;">
                        {!! $about_us !!}
                    </div><!-- END-->
                </div>
                @include('view.rightcategorycolumn',['class'=> 'col-lg-4 sidebar ftco-animate bg-light pt-5 fadeInUp ftco-animated'])
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->

@endsection
