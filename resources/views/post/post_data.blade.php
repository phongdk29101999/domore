<!-- <div class="row justify-content-center">
    @foreach($posts as $post)
        <div class="col-lg-4">
            <div class="properties properties2 mb-30">
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
        </div>
    @endforeach
</div> -->

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

<div class="container">
    <div class="dropdown">
      <button onclick="hamDropdown()" class="nut_dropdown" style="color:Black;">全てカテゴリー</button>
      <div class="noidung_dropdown">
      @foreach ($tags as $tag)
        <a
            style="color:Black;"
            href="{{ URL::to('/posts/tag/' . $tag->tag_id) }}"
            @if ($tag->tag_title == $title)
                class="drop-item active"
            @else
                class="drop-item"
            @endif
        >{{ $tag->tag_title }}</a>
      @endforeach
      </div>
    </div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>



<div class="row">
    <div class="col-sm-8" style="">ポスト</div>
    <div class="col-sm-1" style="">コメント</div>
    <div class="col-sm-1" style="">いいね</div>
    <div class="col-sm-1" style="text-align: center;">登録日</div>
</div>
<div class="hr"style="border: 2px solid #ccc;"></div>
<div class="">
    @foreach( $user_fl as $post)
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

<script>

function hamDropdown() {
 document.querySelector(".noidung_dropdown").classList.toggle("hienThi");
}
if (document.getElementsByClassName("drop-item active")[0].innerHTML != "") {
    document.getElementsByClassName("nut_dropdown")[0].innerHTML = document.getElementsByClassName("drop-item active")[0].innerHTML;
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

{!! $posts->links() !!}
