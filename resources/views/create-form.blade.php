<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>記事投稿フォーム</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- ローカル静的ファイルは，assetヘルパーを使用 --}}
    <link rel="stylesheet" href="{{ asset('/css/post-form.css') }}">
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>記事投稿フォーム</h2>
            <form method="POST" action="{{ url('/article') }}">
                {{--CSRF対策用にトークンを生成--}}
                @csrf
                <div class="form-group">
                    <label for="created-at">投稿日時</label>
                    <input id="created-at" class="form-control" name="created_at" size="20" value="" placeholder="日付を入力します。">
                </div>

                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input id="title" class="form-control" name="title" value="" placeholder="タイトルを入力します。">
                </div>

                <div class="form-group">
                    <label for="category-type">カテゴリ</label>
                    <select id="category-type" class="form-control" name="category_type">
                        <option value="" selected disabled>カテゴリを選択します。</option>
                        <option value="1">PHP</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">本文</label>
                    <textarea id="content" class="form-control" name="body" rows="15" placeholder="本文を入力してください。"></textarea>
                </div>

                <input type="submit" class="btn btn-primary btn-sm" value="投稿">
            </form>
            @if (count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>
