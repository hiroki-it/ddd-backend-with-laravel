<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>tech-blog</title>
        {{-- Bootstrapの読み込みは共通 --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
    @stack("css") <!-- 子テンプレートで個別にCSSをプッシュ -->
    </head>
    <body>
        @extends("body")
    </body>
</html>
