# ddd-api-with-laravel

## 概要

### 採用技術について

Clean-Archによるドメイン駆動設計，Laravel，GitHub Actionsを学習するためのアプリケーションです．

LaravelはActiveRecordパターンのフレームワークのため，DDDと組み合わせるためには，一工夫必要です．

工夫の方法につきましては，以降の説明を参考に．

### appディレクトリ構成

本リポジトリのappディレクトリは，DDDとデザインパターンを意識して，以下の通りに構成しております．

APIとして使用するため，インターフェース層のプレゼンター，ユースケース層のアウトプットバウンダリを廃止しております．

これに伴い，ユースケース層のインターラクターは，プレゼンターではなくレスポンスモデルを返却するようにしております．

```
project
└── app
    ├── Console
    ├── Constant # 定数パターン
    ├── Domain # <<< ドメイン層 >>>
    |   └── Foo              # 任意のルートエンティティ
    |       ├── Criterion    # ドメイン検索条件（検索条件パターン）
    |       ├── Events       # ドメインイベント（Laravelの機能に依存することを許容）
    |       ├── Entities     # エンティティ 
    |       ├── Repositories # インターフェースリポジトリ（実装リポジトリと対応）
    |       ├── Services     # サービス
    |       └── ValueObjects # 値オブジェクト
    |
    ├── Exceptions # 例外
    ├── Http # <<< インターフェース層 >>> （Laravelによる制約で，Httpディレクトリの名前と構成はそのまま）
    |   ├── Controllers        # コントローラ
    |   |   ├── Foo            # 任意のルートエンティティ
    |   |   └── Authenticator  # 認証オブジェクト
    |   |
    |   ├── Middleware # ミドルウェア
    |   └── Requests # バリデーション
    |
    ├── Infrastructure # <<< インフラストラクチャ層 >>>
    |   └── Foo              # 任意のルートエンティティ
    |       ├── DTOs         # エンティティ詰め替えオブジェクト（Eloquentを継承）
    |       ├── Listeners    # リスナー
    |       ├── Notification # 通知内容生成オブジェクト
    |       └── Repositories # 実装リポジトリ（インターフェースリポジトリと対応）
    |
    ├── Providers # プロバイダー
    ├── Traits # トレイト
    └── UseCase # <<< ユースケース層 >>>
        └── Foo                 # 任意のルートエンティティ
            ├── Authorizers     # 認可オブジェクト
            ├── InputBoundaries # インプットバウンダリ
            ├── Inputs          # インプット（リクエストモデル．LaravelのFormRequestと名前が被らないように命名．）
            ├── Interactors     # インターラクター
            ├── Outputs         # アウトプット（レスポンスモデル）
            └── Services        # サービス
```

<br>

## 環境構築

### イメージビルド&コンテナ構築

イメージのビルドとコンテナの構築を行います．

```bash
$ docker-compose up -d
```

### ライブラリのインストール

起動中のコンテナ内でコマンドを実行します．

ここでは，appサービスにてライブラリをインストールします．

```bash
$ docker-compose exec app bash

root@ddd-api-with-laravel-app:/var/www/ddd-api-with-laravel# make composer-install
```

### DBレコード初期化

DBのレコードの状態を初期化し，また初期データを挿入します．

3人のユーザと，各ユーザに紐づく記事データが作成されます．

```bash
$ docker-compose exec app bash

root@ddd-api-with-laravel-app:/var/www/ddd-api-with-laravel# make fresh-seed-db
```

## 動作確認

本アプリケーションにはフロントエンドがありません．

その代わりに，[Postman](https://www.postman.com/) を使用してフロントエンドを擬似的に再現します．

1. 初期データのユーザのメールアドレスとパスワードをコピペします．
2. loginエンドポイントにて，メールアドレスとパスワードをJSONに割り当て，POSTリクエストを送信します．
3. Form認証（Cookieベースの認証）が成功し，homeエンドポイントにリダイレクトします．
4. 以降，好きなエンドポイントにリクエストを送信できます．

Laravelでは，セッション中の毎リクエストでCSRFトークンが変化します．

そのため，Postmanの [Pre-requestスクリプト](https://learning.postman.com/docs/writing-scripts/pre-request-scripts/) に，事前にルートパスにリクエストを送信してCSRFトークンを取得する処理を設定しています．

Postmanのエクスポートファイルを，以下のリンクから取得できます（随時更新中！！🙇‍️）

エクスポートファイル：https://www.getpostman.com/collections/a83d435cb5ee98ce1b84

### コードの整形

[PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) を使用して，ソースコードを整形します．

GitHub Actionsを使用して，プッシュされたソースコードを整形し，再プッシュするようにしています．

開発環境でこれを実行する場合は，以下を実行します．

```bash
$ docker-compose exec app bash

root@ddd-api-with-laravel-app:/var/www/ddd-api-with-laravel# make fixer-fix
```

### コードの静的解析

[larastan](https://github.com/nunomaduro/larastan) を使用して，ソースコードの静的解析を実行します．

予定：GitHub Actions上で静的解析を実行し，一つでも問題が検出されたら怒られるようにしたい...

```bash
$ docker-compose exec app bash

root@ddd-api-with-laravel-app:/var/www/ddd-api-with-laravel# make stan-analyse
```

### キャッシュの削除

Makefileにターゲットを定義しています．

Laravelの一連のキャッシュ削除コマンドを全て実行します．

```bash
$ docker-compose exec app bash

root@ddd-api-with-laravel-app:/var/www/ddd-api-with-laravel# make clear-all-cache
```

<br>

## アーキテクチャについて

### ActiveRecordパターンとDDDの関係性

DDD，デザインパターン，Laravel を組み合わせました．

ActiveRecordパターンであるLaravelでは，ドメイン層のモデルとテーブル構造が相互に依存します．

多くのメリットがある一方で，ドメイン層が変化するたびにテーブル構造に影響を与えてしまうというデメリットがあります．

これは逆も然りです．

ドメイン層の柔軟なスケーリングを考慮すると，LaravelにDDDを組み込むことが望ましいです．

ただし，ActiveRecordパターンはDDDと相性が悪いです．

### LaravelとDDDを組み合わせるための一工夫

DDDはActiveRecordパターンではなくRepositoryパターンと相性が良いです．

RepositoryパターンをLaravelに適用するために，Eloquentを継承したDTOを用意しています．

ユースケース層でエンティティを構成し，これをドメイン層のインターフェースリポジトリを介してインフラストラクチャ層に渡すと，エンティティがDTOに詰め替えられます．

DTOはEloquentを継承しているため，詰め替えられたデータに応じて，データベースを操作できます．

### クリーンアーキテクチャによるDDD

DDDを実現するために，最初レイヤードアーキテクチャが考案されました．

![ドメイン駆動設計](https://user-images.githubusercontent.com/42175286/58724663-2ec11c80-8418-11e9-96e9-bfc6848e9374.png)

クリーンアーキテクチャは，さらにこのレイヤードアーキテクチャに対して，『依存性逆転の原則』を組み込んだものです．

依存性逆転の原則を満たすために，インターフェースに依存するように実装する必要があります．

参考：https://little-hands.hatenablog.com/entry/2017/10/11/075634

『依存性逆転の原則』を満たすために，まず，ドメイン層にインターフェースリポジトリを置き，インフラストラクチャ層にその実装を置きます．

また，ユースケース層では，ドメイン層のインターフェースリポジトリを介して，インフラストラクチャ層の実装リポジトリをコールするようにします．

これにより，**ユースケース層とインフラストラクチャ層の両方が，ドメイン層のインターフェースに依存する**ようになり，依存性逆転の原則を満たすことができます．
