@extends('layout_user')
@section('content')

<style>
.center {
    margin: 0 auto;
    width: 60%;
    background: lightpink;
    padding: 5px;
    border-radius: 10px;
    word-wrap:break-word;
}
</style>
    <!--? slider Area Start-->
    {{-- <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Your profile</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">ホーム</a></li>
                                        <li class="breadcrumb-item"><a
                                                href="{{ URL::to('users/' . $user->user_id . '/posts') }}">{{$user->user_name}}'s
                                                Post</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


        <!-- Courses area start -->
        <div class="main-container ace-save-state pt-120" id="main-container">
        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-tittle text-center ">
                                <div class="hr dotted"></div>
                                <div>
                                    <div id="user-profile-3" class="user-profile row">
                                        <div class="col-sm-offset-1 col-sm-10">
                                            <div class="space"></div>
                                        @if(count($follows_user) != 0)
                                            <div class="popup_follower" style="display:none" id="follower_u">
                                                <a href="#" style="margin-left: 10px;" class="close_tab"><img src="{{asset('/user/img/hero/muiten.png')}}"></a>
                                                <a href="#"  class="title" style="margin-left: 60px;">フォロワー</a>
                                                <div style="display: flex; justify-content: space-between; margin-top:15px;  border-top: 1px solid #000;"> </div>
                                                @foreach($follows_user as $user_fl)
                                                    <a href = "{{ URL::to('users/' . $user_fl->user_id) }}" class="user justify-content-between d-flex" style="margin-top: 20px;">
                                                        <div class="thumb">
                                                            @if($user_fl->avatar_url == null)
                                                            <div class="cmt-ava">
                                                                <img src="{{asset('/user/img/default_avt.jpg')}}">
                                                            </div>
                                                            @else
                                                            <div class="cmt-ava">
                                                                <img src="{{URL::to('/storage/avatar_url/'.$comment->avatar_url)}}" alt="author avatar">
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="desc" style="margin:20px;">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="d-flex align-items-center " style="flex-direction: column;line-height: 10px;">
                                                                    <p href="#" style="font-size: 19px; margin-right: 200px; line-height: 10px;" for="vehicle1">{{ $user_fl->user_name }}</p>
                                                                    <p href="#" style="font-size: 14px; margin-right: 200px;line-height: 10px; " for="vehicle1">{{ $user_fl->first_name }}</p>
                                                                    <p href="#" style="font-size: 14px; margin-right: 200px;line-height: 10px;" for="vehicle1">{{ $user_fl->last_name }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach
                                        </div>
                                        @endif
                                        @if(count($follows) != 0 )
                                            <div class="popup_follower" style="display:none" id="follower_list">
                                           
                                                <a href="#" style="margin-left: 10px;" class="close_tab_1"><img src="{{asset('/user/img/hero/muiten.png')}}"></a>
                                                <a href="#"  class="title" style="margin-left: 60px;">フォロワー</a>
                                                <div style="display: flex; justify-content: space-between; margin-top:15px;  border-top: 1px solid #000;"> </div>
                                                
                                                    @foreach($follows as $user_fl)
                                                    
                                                        <a href = "{{ URL::to('users/' . $user_fl->follows_id) }}" class="user justify-content-between d-flex" style="margin-top: 20px;">
                                                            <div class="thumb">
                                                                @if($user_fl->avatar_url == null)
                                                                <div class="cmt-ava">
                                                                    <img src="{{asset('/user/img/default_avt.jpg')}}">
                                                                </div>
                                                                @else
                                                                <div class="cmt-ava">
                                                                    <img src="{{URL::to('/storage/avatar_url/'.$user_fl->follows_id->avatar_url)}}" alt="author avatar">
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="desc" style="margin:20px;">
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center " style="flex-direction: column;line-height: 10px;">
                                                                        <p href="#" style="font-size: 19px; margin-right: 200px; line-height: 10px;" for="vehicle1">{{ $user_fl->user_name }}</p>
                                                                        <p href="#" style="font-size: 14px; margin-right: 200px;line-height: 10px; " for="vehicle1">{{ $user_fl->first_name }}</p>
                                                                        <p href="#" style="font-size: 14px; margin-right: 200px;line-height: 10px;" for="vehicle1">{{ $user_fl->last_name }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                            
                                            </div>
                                        @endif
                                            <form class="form-horizontal">
                                                <div class="tabbable">
                                                    <div class="tab-content profile-edit-tab-content rounded" style="background-color: rgb(220 220 220);box-shadow: 10px 10px 5px #c5c9c9;">
                                                        <div id="edit-basic" class="tab-pane in active">
                                                            <div class="buttons" style="text-align: right;">
                                                                @if (Auth::user()->user_id == $user->user_id)
                                                                    <a  type="button"  href='/users/{{ $user->user_id }}/edit'>
                                                                        <i class="fa fa-edit" style="font-size:28px;color:Black;"></i>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="row">
                                                                    @if ($user->avatar_url != null)
                                                                        <div class="block-ava rounded" >
                                                                        <img src="/storage/avatar_url/{{ $user->avatar_url }}">
                                                                        </div>
                                                                        {{-- <div class="vspace-12-sm"></div> --}}
                                                                    @else
                                                                        <div class="block-ava rounded"  >
                                                                            <img src="{{asset('/user/img/default_avt.jpg')}}">
                                                                        </div>
                                                                    @endif

                                                                <div class="col-xs-12 col-sm-8" >
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-username"style="font-weight: bold;">名前: </label>
                                                                        <div class="col-sm-8"style="text-align: left;left: 20%;">
                                                                            {{ $user->user_name }}
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-username"style="font-weight: bold;">学生: </label>
                                                                        <div class="col-sm-8"style="text-align: left;left: 20%;">
                                                                            {{ $user->first_name }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-username"style="font-weight: bold;">学校の名: </label>
                                                                        <div class="col-sm-8"style="text-align: left;left: 20%;">
                                                                            {{ $user->last_name }}
                                                                        </div>
                                                                    </div>



                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-lastname" style="font-weight: bold;">メール: </label>

                                                                        <div class="col-sm-8"style="text-align: left;left: 20%;">
                                                                            {{ $user->email }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-lastname" style="font-weight: bold;">誕生日: </label>
                                                                        <div class="col-sm-8"style="text-align: left;left: 20%;">
                                                                            {{ $user->birthday }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-lastname" style="font-weight: bold;">住所: </label>

                                                                        <div class="col-sm-8" style="text-align: left;left: 20%;">
                                                                            {{ $user->address }}
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <a href="{{ URL::to('users/' .$user->user_id . '/posts') }}"
                                                                            class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-lastname" style="font-weight: bold;"> {{count($posts)}}ポスト</a>
                                                                        <label id="click_see_fl"
                                                                            class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-lastname" style="font-weight: bold;text-align: left;left: 20%;"><span class="count-fl">{{count( $follows_user)}}</span>フォロワー</label>

                                                                        <label id="click_see_fling"
                                                                            class="col-sm-2 control-label no-padding-right"
                                                                            for="form-field-lastname" style="font-weight: bold;text-align: left;left: 20%;"><span>{{count( $follows)}}</span> フォロイング</label>
                                                                    </div>
                                                                    @if (Auth::user()->user_id != $user->user_id)
                                                                        @if( $check == 0)
                                                                            <button type="submit" class=" btn_1_2 fl-ajax" follow-id={{ $user->user_id }}>フォロー</button>
                                                                            @else
                                                                            <button type="submit" class=" btn_1_2 fl-ajax btn-followed" follow-id={{ $user->user_id }}>フォローをやめる</button>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
                $(document).on('click', '.fl-ajax', function(event) {
                  event.preventDefault();
                  var follow_id = $(this).attr('follow-id');
                  fetch_data(follow_id);
                });

                function fetch_data(follow_id) {
                  $(".fl-ajax").toggleClass("btn-followed");

                  if($('.fl-ajax').hasClass('btn-followed')) {
                    $('.fl-ajax').html('フォローをやめる');
                  } else {
                    $('.fl-ajax').html('フォロー');
                  }
                  
                  $.ajax({
                    url: follow_id + "/follow",
                    success: function(data) {
                        console.log(data);
                      $('.count-fl').html(data);
                    }
                  });
                }
              });
    </script>
@endsection
