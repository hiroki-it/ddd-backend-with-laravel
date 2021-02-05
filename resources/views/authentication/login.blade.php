@extends('layout.header')

@push('css') <!-- ローカル静的ファイルは，assetヘルパーを使用 -->
<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
<link rel="stylesheet" href={{ asset("/css/authentication/login.css") }}>
@endpush

@section('body')
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src={{ asset("/images/login.jpg") }} alt="login" class="login-card-img" alt="">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src={{ asset("/images/login.svg") }} alt="logo" class="logo" alt="">
                            </div>
                            <p class="login-card-description">ログイン</p>
                            <form action="#!">
                                <div class="form-group">
                                    <label for="email" class="sr-only">メールアドレス</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">パスワード</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
                            </form>
                            <a href="#!" class="forgot-password-link">パスワードを忘れましたか？</a>
                            <p class="login-card-footer-text"><a href="#!" class="text-reset">アカウントを作成します．</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
@endsection
