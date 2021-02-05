@extends('layout.header')

@section('body')
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">記事管理サイト</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">記事一覧<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">新規投稿</a>
                <a class="nav-item nav-link" href="#">その他</a>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="キーワードを入力" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
            </form>
        </div>
    </nav>
    @yield('content') <!-- 子テンプレートで個別に要素を出力 -->
@endsection
