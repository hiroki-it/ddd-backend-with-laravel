@extends('layouts.header')

@push('css') <!-- ローカル静的ファイルは，assetヘルパーを使用 -->
<link rel="stylesheet" href={{ asset("/css/authentication/login.css") }}>
@endpush

@section('body')
    <div class="login-form">
        <form method="POST" action={{ url('/login') }}>
            <h2 class="text-center">tech-blog</h2>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="名前" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="パスワード" required="required">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">ログイン</button>
            </div>
            <div class="clearfix">
                <label class="pull-left checkbox-inline"><input type="checkbox">パスワードを記憶</label>
                <a href="{{ url('/reset/password') }}" class="pull-right">パスワードを忘れた場合</a>
            </div>
        </form>
        <p class="text-center small"><a href="{{ url('/register') }}">まだ登録がお済みでない場合</a></p>
    </div>
@endsection
