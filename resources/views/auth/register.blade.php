@extends('user.register')

@section('content')
<!-- Login Admin -->
<form method="POST" action="{{ URL::to('/register') }}">
    @csrf
    <div class="login-form">
        <!-- logo-login -->
        <h2>アカウント作成</h2>
        <div class="form-input">
            <p class="text">アカウントをお持ちですか？ <a href="{{ URL::to('/login') }}"><u>ログイン</u></a></p>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="ユーザー名"
                value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-input">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="メールアドレス"
                value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-input">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="パスワード"
                name="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-input">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="パスワード確認">
        </div>

        <div class="form-input pt-30">
            <input type="submit" name="submit" value="サインアップ">
        </div>
        <!-- Forget Password -->
    </div>
</form>
<!-- /end login form -->
@endsection
