@extends('layouts.header')

@push('css') <!-- ローカル静的ファイルは，assetヘルパーを使用 -->
<link rel="stylesheet" href={{ asset("/css/authentication/register.css") }}>
@endpush

@section('body')
    <div class="register-form">
        <form method="post" action="{{ url('/register') }}">
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
                <button type="submit" class="btn btn-primary btn-block">登録</button>
            </div>
        </form>
        <p class="text-center small"><a href="{{ url('/login') }}">登録がお済みの場合</a></p>
    </div>
@endsection
