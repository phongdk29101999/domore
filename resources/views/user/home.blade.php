@extends('layout_user')
@section('content')

<!--? slider Area Start-->
<section class="slider-area ">
    
</section>
<!-- Courses area start -->
<div class="courses-area section-padding40 fix">
    <div class="col-sm-12" style="margin-bottom: 50px;">
        <div class="col-sm-8">
            <img src="{{asset('/user/img/hero/image1.png')}}" alt="" style="width:1000px;">
        </div>
        <div class="col-sm-4" style="text-align: center;">
             <a class="btn_1_1" href="{{ URL::to('create_post') }}"> 
                投稿しましょう！
            </a> 
        </div>

    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>すべてのポスト</h2>
                </div>
            </div>
        </div>
        <div class="item_post">
            @foreach($posts as $post)
                <div class="content">
                    
                        <div class="title">{{$post->title}}</div>
                        <div class="des">{{$post->description}}</div>
                        <div class="date" style="font-style: italic">投稿時間： {{$post->date_create}}</div>
                        <div class="date" style="font-style: italic">投稿者{{$post->user->user_name}}</div>
                    
                    
                        <a href="{{URL::to('/posts/'.$post->post_id)}}" class="btn_1_1">続きを読む</a>
                    
                </div>
            @endforeach
        </div>
        <!-- <div class="courses-actives">
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
        </div> -->
    </div>
</div>
<!-- Courses area End -->
@endsection
