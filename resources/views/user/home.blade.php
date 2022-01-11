@extends('layout_user')
@section('content')

<style>
.nut_dropdown {
  background-color: #f1f1f1;
  padding: 16px;
  font-size: 16px;
  border-radius: 10px;
  border: 1px solid #ccc;


}
.dropdown {
  position: relative;
  display: inline-block;
}

.noidung_dropdown {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 145px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  border: 1px solid #ccc;
  border-radius: 10px;


}

.noidung_dropdown a {
  color: black;
  padding: 10px 16px;
  text-decoration: none;

  display: block;
}
.hienThi{
  display:block;
}

hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;
}
</style>



<!--? slider Area Start-->
<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                        <div class="hero__caption hero__caption2">
                            <div class="row">
                                <div class="col-sm-8"><h1 data-animation="bounceIn" data-delay="0.2s"><img src="{{asset('/user/img/hero/image1.png')}}" alt="" ></h1></div>

                                <div class="col-sm-4">
                                    <a class="btn_1_1" href="{{ URL::to('create_post') }}" > 投稿しましょう！</a>
                                </div>
                                </div>

                        </div>
            </div>
        </div>
    </div>
</section>
<!-- Courses area start -->
<<<<<<< HEAD
<div class="courses-area section-padding40 fix" >
    <div class="col-sm-12" style="margin-bottom: 50px;">
=======
<div class="courses-area fix">
    {{-- <div class="col-sm-12" style="margin-bottom: 50px;">
>>>>>>> 8084c5506af14561cf07a46c428e42eb99beadff
        <div class="col-sm-8 "style="left: 10%;">
            <img src="{{asset('/user/img/hero/image1.png')}}" alt="" style="width:1000px; ">
        </div>
        <div class="col-sm-4" style="text-align: center;">
             <a class="btn_1_1" href="{{ URL::to('create_post') }}">
                投稿しましょう！
            </a>
        </div>

    </div> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center">
                    <h2>すべてのポスト</h2>
                </div>
            </div>
        </div>

    <div class="dropdown">
      <button onclick="hamDropdown()" class="nut_dropdown" style="color:Black;">全てカテゴリー</button>
      <div class="noidung_dropdown">
      @foreach ($tags as $tag)
        <a style="color:Black;" href="{{ URL::to('/posts/tag/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a>
      @endforeach
      </div>
    </div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>

    <div class="row">
      <div class="col-sm-8" style="">ポスト</div>
      <div class="col-sm-1" style="">コメント</div>
      <div class="col-sm-1" style="">いいね</div>
      <div class="col-sm-1" style="text-align: center;">更新日</div>
    </div>
    <div class="hr"style="border: 2px solid #ccc;"></div>
    <div class="">
      @foreach($posts as $post)
      <div class="content row">
        <div class="col-sm-8" style="">
          <a href="{{URL::to('/posts/'.$post->post_id)}}" class="title" style="font-weight: bold;color: black;">{{$post->title}}</a>
          <div class="des">{{$post->description}}</div>
          <a class="date" style="color: #000000;" href="{{ URL::to('users/' . $post->user->user_id) }}"><i class="fa fa-user"></i> {{$post->user->user_name}}</a>
        </div>
        <div class="col-sm-1" >{{$comment_count[$post->post_id]}}</div>
        <div class="col-sm-1" style="">{{$like_count[$post->post_id]}}</div>
        <div class="col-sm-2" style="">{{$post->date_create}}</div>
      </div>
      <hr>
      @endforeach
    </div>
<!-- @foreach($posts as $post)
<div class="row center" style="">
<div ><a style="width: 90%;color: #B22222;" href="{{URL::to('/posts/'.$post->post_id)}}">{{$post->title}}</a></div>
<div ><p style="width: 10%;color: #B22222;text-align: left;">{{$post->date_create}}</p></div>
</div>
<div class="space"></div>
@endforeach   -->

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

<script>

function hamDropdown() {
 document.querySelector(".noidung_dropdown").classList.toggle("hienThi");
}

window.onclick = function(e) {
  if (!e.target.matches('.nut_dropdown')) {
  var noiDungDropdown = document.querySelector(".noidung_dropdown");
    if (noiDungDropdown.classList.contains('hienThi')) {
      noiDungDropdown.classList.remove('hienThi');
    }
  }
}
</script>
<!-- Courses area End -->
@endsection
