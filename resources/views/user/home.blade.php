@extends('layout_user')
@section('content')

<!--? slider Area Start-->
<section class="slider-area ">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-12">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay="0.2s">Knowledge Sharing<br> platform</h1>
                            <p data-animation="fadeInLeft" data-delay="0.4s">Knowledge is power. Knowledge shared is power multiplied</p>
                            @if (!session('status') && !auth()->user())
                            <a href="{{ URL::to('/register') }}" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join to Share</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ? services-area -->

<div class="services-area">
    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-services mb-30">
                    <div class="features-icon">
                        <img src="{{asset('/user/img/icon/icon1.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <h3>60+ Post every day</h3>
                        <p>We share knowledge about: IT, Experiences, Work, Travel,...  </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-services mb-30">
                    <div class="features-icon">
                        <img src="{{asset('/user/img/icon/icon2.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <h3>Expert users</h3>
                        <p>Vietnames experts are all here.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-services mb-30">
                    <div class="features-icon">
                        <img src="{{asset('/user/img/icon/icon3.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <h3>30+ minutes reading </h3>
                        <p>The more you read, the more you learn.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Courses area start -->
<div class="courses-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Newest Post</h2>
                </div>
            </div>
        </div>
        <div class="courses-actives">
            @foreach($posts as $post)
            <div class="properties pb-20">
                <div class="properties__card">
                    <div class="properties__img overlay1">
                        @if($post->post_url == null)
                            <img src="{{asset('/user/img/pj3.1.png')}}" alt="" style="height: 200px;">
                        @else
                            <img src="{{asset('/storage/post_url/'.$post->post_url)}}" alt=""  style="height: 200px;">
                        @endif
                    </div>
                    <div class="properties__caption">
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->description}}</p>
                        <p style="font-style: italic">Posted on {{$post->date_create}} by {{$post->user->user_name}}</p>
                        <a href="{{URL::to('/posts/'.$post->post_id)}}" class="border-btn border-btn2">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Courses area End -->
@endsection
