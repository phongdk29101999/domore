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
                                                                        <label
                                                                            class="col-sm-4 control-label no-padding-right"
                                                                            for="form-field-lastname" style="font-weight: bold;text-align: left;left: 20%;">15 フォロワー</label>

                                                                        <label
                                                                            class="col-sm-2 control-label no-padding-right"
                                                                            for="form-field-lastname" style="font-weight: bold;text-align: left;left: 20%;">5 フォロイング</label>


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

@endsection
