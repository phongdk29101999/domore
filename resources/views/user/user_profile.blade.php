@extends('layout_user')
@section('content')

<style>
.center {
    margin: 0 auto; /* Căn giữa block element */
    width: 60%; /* Phải thiết lập width */
    background: lightpink;
    padding: 5px;
    border-radius: 10px;
    word-wrap:break-word;
}
</style>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Thinh</h1>
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
    </section>
    <!-- Courses area start -->
    <div class="main-container ace-save-state" id="main-container">
        <div class="main-content">
            <div class="main-content-inner" >
                <div class="page-content">
                    <div class="row" >
                        <div class="col-xs-12">
                            <div class="section-tittle ">
                                <div>
                                    <div id="user-profile-3" class="user-profile row" >
                                        <div class="col-sm-offset-1 col-sm-10">
                                            <div class="space" ></div>
                                            <form class="form-horizontal">
                                                <div class="tabbable">
                                                    <div class="tab-content profile-edit-tab-content"style="background-color: rgb(220 220 220);">
                                                        <div id="edit-basic" class="tab-pane in active">
                                                            <div class="space"></div>
                                                            <div class="row ">

                                                            <div class="col-sm-3 row-no-gutters ">
                                                                    @if ($user->avatar_url != null)
                                                                        <div class="block-ava rounded" style="height: 144px;">
                                                                            <img src="/storage/avatar_url/{{ $user->avatar_url }}">
                                                                        </div>
                                                                        {{-- <div class="vspace-12-sm"></div> --}}
                                                                    @else
                                                                        <div class="block-ava rounded" style="height: 144px;" >
                                                                            <img src="{{asset('/user/img/default_avt.jpg')}}">
                                                                        </div>
                                                                    @endif
                                                                </div>

                                                                <div class="col-sm-8">
                                                                    <div class="form-group " style="text-align: left;font-weight: bold;font-size:30px;">
                                                                            {{ $user->user_name }}
                                                                    </div>
                                                                    <div class="form-group " style="text-align: left;">
                                                                            nguoi moi
                                                                    </div>
                               
                                                                    <div class="form-group col-sm-4 control-label" >
                                                                        <div class="d-flex flex-row justify-content-between mt-4 pr-4">
                                                                            <div class="d-flex flex-column align-items-center" style="text-align: left;color: #8B0000">ポスト
                                                                                <h4 style="color: #000000">999</h4>
                                                                           </div>
                                                                           <div class="d-flex flex-column align-items-center" style="text-align: left; color: #8B0000">スコア
                                                                                <h4 style="color: #000000">999</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>                                                            
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

        <div class="main-container ace-save-state" id="main-container">
        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-tittle text-center mb-55">
                                <div>
                                    <div id="user-profile-3" class="user-profile row">
                                        <div class="col-sm-offset-1 col-sm-10">
                                            <div class="space"></div>
                                            <form class="form-horizontal">
                                                <div class="tabbable">
                                                    <div class="tab-content profile-edit-tab-content"style="background-color: rgb(220 220 220);">
                                                        <div id="edit-basc" class="tab-pane in active">
                                                            <div class="space"></div>
                                                            <div class="buttons">
                                                                <button class="btn btn-outline-primary px-4">プロファイル編集</button> 
                                                                <button class="btn btn-outline-primary px-4">セッティング</button> 
                                                                @if (Auth::user()->user_id == $user->user_id)
                                                                    <a  type="button"  href='/users/{{ $user->user_id }}/edit'>
                                                                    <i class="fa fa-edit" style="font-size:38px;color:Black	"></i>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="space"></div>

                                                            <div class="space"></div>
                                                            <div style="font-weight: bold;font-size:30px;">ポストリスト</div>
                                                            <div class="space"></div>

                                                            @foreach($posts as $post)
                                                                <div class="row center" style="">
                                                                    <div class="col-sm-8" ><a style="color: #B22222;" href="{{URL::to('/posts/'.$post->post_id)}}">{{$post->title}}</a></div>
                                                                    <div class="col-sm-4" ><p style="color: #B22222;text-align: left;">{{$post->date_create}}</p></div>
                                                                </div>
                                                                <div class="space"></div>
                                                            @endforeach                                                           

                                                            <div class="space"></div>
                                                            <div style="font-weight: bold;font-size:30px;">ユーザー情報</div>
                                                            <div class="space"></div>

                                                            <div class="row">
                                                                <div style="width:100px; height: 10px"></div>
                                                                <div class="col-xs-12 col-sm-8">

                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-username" style="font-weight: bold;">名前: </label>
                                                                        <div class="col-sm-8">
                                                                            <span class="input-icon input-icon-right"style="text-align: left;">
                                                                                {{ $user->user_name }}
                                                                            </span>
                                                                         </div>
                                                                         </div>
                                                                    <div class="space-4"></div>



                                                                    <div class="form-group">
                                                                        <label class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-email"style="font-weight: bold;">メール: </label>

                                                                        <div class="col-sm-8">
                                                                            <span class="input-icon input-icon-right"style="text-align: left;">
                                                                                {{ $user->email }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="space-4"></div>



                                                                    <div class="form-group">
                                                                        <label class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-date"style="font-weight: bold;">誕生日</label>

                                                                        <div class="col-sm-8">
                                                                            <span class="input-icon input-icon-right"style="text-align: left;">
                                                                                {{ $user->birthday }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="space-4"></div>



                                                                    <div class="form-group">
                                                                        <label class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-website"style="font-weight: bold;">住所: </label>

                                                                        <div class="col-sm-8">
                                                                            <span class="input-icon input-icon-right"style="text-align: left;">
                                                                                {{ $user->address }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="space-4"></div>



                                                                    <div class="form-group">
                                                                        <label class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-website"style="font-weight: bold;">参加日: </label>

                                                                        <div class="col-sm-8">
                                                                            <span class="input-icon input-icon-right"style="text-align: left;">
                                                                                {{ $user->address }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="space-4"></div>

                                                                    
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
    
@endsection
