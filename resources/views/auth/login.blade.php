@extends('user.login')

@section('content')

    <!-- Login Admin -->
    <form class="form-default" method="POST" action="{{ URL::to('/login') }}">
        @csrf
        <div class="login-form">
            <!-- logo-login -->
            <h2>ログイン</h2>
            <p class="text">まだアカウントを持っていません?<br> <a href="{{ URL::to('/register') }}"><u>サインアップ</u></a></p>
            <div class="form-input">
                <label for="email">E-Mail Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                placeholder="メールアドレス" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-input">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="パスワード" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-input pt-30">
                <input type="submit" name="submit" value="ログイン">
            </div>
            <div class="form-input pt-30">
                <a href="#"class="btn1 btn-danger btn-block"> <img src="{{asset('/user/img/hero/gg.png')}}" alt="" >グーグルでログイン</a>
            </div>
            <div class="form-input pt-30">
                <a href="#" class="btn1 btn-danger btn-block"> <img src="{{asset('/user/img/hero/fb.png')}}" alt="" >フェイスブックでログイン</a>
            </div>
        </div>
    </form>
    <!-- /end login form -->
@endsection
