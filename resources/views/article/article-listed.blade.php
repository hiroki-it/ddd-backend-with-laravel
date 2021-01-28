@extends('layout.header')

@section('content')
    <div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">タイトル</th>
                <th scope="col">カテゴリ</th>
                <th scope="col">投稿日時</th>
                <th scope="col">更新日時</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>01</td>
                <td>テスト</td>
                <td>PHP</td>
                <td>2020-10-07</td>
                <td>2020-10-08</td>
                <td>
                    <a href="" class="btn btn-primary btn-sm">詳細</a>
                    <a href="" class="btn btn-primary btn-sm">編集</a>
                    <a href="" class="btn btn-danger btn-sm">削除</a>
                </td>
            </tr>
            <tr>
                <td>02</td>
                <td>テスト</td>
                <td>PHP</td>
                <td>2020-10-07</td>
                <td>2020-10-08</td>
                <td>
                    <a href="" class="btn btn-primary btn-sm">詳細</a>
                    <a href="" class="btn btn-primary btn-sm">編集</a>
                    <a href="" class="btn btn-danger btn-sm">削除</a>
                </td>
            </tr>
            <tr>
                <td>03</td>
                <td>テスト</td>
                <td>PHP</td>
                <td>2020-10-07</td>
                <td>2020-10-08</td>
                <td>
                    <a href="" class="btn btn-primary btn-sm">詳細</a>
                    <a href="" class="btn btn-primary btn-sm">編集</a>
                    <a href="" class="btn btn-danger btn-sm">削除</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
