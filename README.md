# ddd-backend-with-laravel

## 目次

<!-- TOC -->

* [概要](#概要)
* [DDD](#ddd)
    * [戦略的設計](#戦略的設計)
    * [戦術的設計](#戦術的設計)
* [環境構築](#環境構築)
    * [イメージビルド&コンテナ構築](#イメージビルドコンテナ構築)
    * [ライブラリのインストール](#ライブラリのインストール)
    * [DBレコード初期化](#dbレコード初期化)
* [動作確認](#動作確認)
    * [コードの整形](#コードの整形)
    * [コードの静的解析](#コードの静的解析)
    * [キャッシュの削除](#キャッシュの削除)
* [補足事項](#補足事項)
    * [ActiveRecordパターンとDDDの関係性](#activerecordパターンとdddの関係性)
    * [LaravelとDDDを組み合わせるための一工夫](#laravelとdddを組み合わせるための一工夫)
* [クリーンアーキテクチャによるDDD](#クリーンアーキテクチャによるddd)
<!-- TOC -->

<br>

## 概要

DDD，クリーンアーキテクチャ，Laravel，GitHub Actionsを学習するためのアプリケーションです．

LaravelはActiveRecordパターンのフレームワークのため，DDDと組み合わせるためには，一工夫必要です．

> ↪️ 参考：
>
> - [戦略的設計，戦術的設計について](https://hiroki-it.github.io/tech-notebook/software/software_application_architecture_backend_domain_driven_design.html)
> - [クリーンアーキテクチャについて](https://hiroki-it.github.io/tech-notebook/software/software_application_architecture_backend_domain_driven_design_clean_architecture.html)
> - [依存性逆転の原則の実装方法について](https://speakerdeck.com/hiroki_hasegawa/domeinqu-dong-she-ji-toyi-cun-xing-ni-zhuan-falseyuan-ze)
> - [Laravelのリポジトリパターンについて](https://hiroki-it.github.io/tech-notebook/language/language_php_framework_laravel_eloquent_orm.html#04-laravel)

## DDD

### 戦略的設計

#### ▼ ドメインの定義

技術記事の記録共有作業をドメインとします．

QiitaやZennが解決しようとするドメインと同じになる想定です．

#### ▼ サブドメインの定義

|  ドメインの種類  | 具体例   |
| ---- | ---- |
|  コアドメイン  |  記事記録共有作業  |
|  サブドメイン  |  comming soon...  |


#### ▼ コンテキストマップ

coming soon...

<br>

### 戦術的設計

#### ▼ ユースケース図

絶賛更新中のユースケース図を、 **[こちらのディレクトリ](https://github.com/hiroki-it/ddd-backend-with-laravel/blob/develop/docs/usecase-diagrams)** で管理しております．

#### ▼ オブジェクト図

絶賛更新中のオブジェクト図を、 **[こちらのディレクトリ](https://github.com/hiroki-it/ddd-backend-with-laravel/blob/develop/docs/object-diagrams)** で管理しております．

#### ▼ ドメインモデル図

絶賛更新中のドメイン図を、 **[こちらのディレクトリ](https://github.com/hiroki-it/ddd-backend-with-laravel/blob/develop/docs/domain-model-diagrams)** で管理しております．

#### ▼ アーキテクチャ

クリーンアーキテクチャを採用します．

appディレクトリは，クリーンアーキテクチャを意識して，以下の通りに構成しております．

各レイヤーの実装パターン間の依存関係もクリーンアーキテクチャに沿って実装しております．

APIとして使用するため，インターフェース層のプレゼンター，ユースケース層のアウトプットバウンダリを廃止しております．

これに伴い，ユースケース層のインターラクターは，プレゼンターではなくレスポンスモデルを返却するようにしております．

```yaml
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
    |       ├── Services     # ドメインサービス
    |       └── ValueObjects # 値オブジェクト
    |
    ├── Exceptions # 例外
    ├── Http # <<< インターフェース層 >>> （Laravelによる制約で，Httpディレクトリの名前と構成はそのまま）
    |   ├── Authenticators # 認証コントローラ
    |   ├── Controllers    # コントローラ
    |   |   └── Foo        # 任意のルートエンティティ
    |   |
    |   ├── Middleware # ミドルウェア
    |   └── Requests # バリデーション
    |
    ├── Infrastructure # <<< インフラストラクチャ層 >>>
    |   └── Foo              # 任意のルートエンティティ
    |       ├── DTOs         # エンティティ詰め替えオブジェクト（Eloquentを継承）
    |       ├── Listeners    # リスナー
    |       ├── Services     # インフラストラクチャサービス
    |       └── Repositories # 実装リポジトリ（インターフェースリポジトリと対応）
    |
    ├── Providers # プロバイダー
    ├── Traits # トレイト
    └── UseCase # <<< ユースケース層 >>>
        └── Foo                 # 任意のルートエンティティ
            ├── InputBoundaries # インプットバウンダリ
            ├── Inputs          # インプット（リクエストモデル．LaravelのFormRequestと名前が被らないように命名．）
            ├── Interactors     # インターラクター
            └── Outputs         # アウトプット（レスポンスモデル）
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

root@dawl-laravel:/var/www/ddd-backend-with-laravel# make composer-install
```

### DBレコード初期化

DBのレコードの状態を初期化し，また初期データを挿入します．

3人のユーザと，各ユーザに紐づくデータが作成されます．

```bash
$ docker-compose exec app bash

root@dawl-laravel:/var/www/ddd-backend-with-laravel# make fresh-seed-db
```

## 動作確認

本アプリケーションにはフロントエンドがありません．

その代わりに，[Postman](https://www.postman.com/) を使用してフロントエンドを擬似的に再現します．

Postmanのエクスポートファイルを，以下のリンクから取得できます（随時更新中！！🙇‍️）

エクスポートファイル：https://www.getpostman.com/collections/a83d435cb5ee98ce1b84

1. Postmanのエクスポートファイルをコピーし，自身のPostmanにインポートします．
2. DBレコード初期化のコマンドを実行します．
3. DBのusersテーブルを確認し，初期データのユーザのメールアドレスとパスワードをコピペします．
4. loginエンドポイントにて，メールアドレスとパスワードをJSONに割り当て，POSTリクエストを送信します．
5. Form認証（Cookieベースの認証）が成功し，homeエンドポイントにリダイレクトします．
6. 以降，好きなエンドポイントにリクエストを送信できます．

Laravelでは，セッション中の毎リクエストでCSRFトークンが変化します．

そのため，Postmanの [Pre-requestスクリプト](https://learning.postman.com/docs/writing-scripts/pre-request-scripts/) に，事前にルートパスにリクエストを送信してCSRFトークンを取得する処理を設定しています．

### コードの整形

[PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) を使用して，ソースコードを整形します．

GitHub Actionsを使用して，プッシュされたソースコードを整形し，再プッシュするようにしています．

開発環境でこれを実行する場合は，以下を実行します．

```bash
$ docker-compose exec app bash

root@dawl-laravel:/var/www/ddd-backend-with-laravel# make fixer-fix
```

### コードの静的解析

[larastan](https://github.com/nunomaduro/larastan) を使用して，ソースコードの静的解析を実行します．

予定：GitHub Actions上で静的解析を実行し，一つでも問題が検出されたら怒られるようにしたい...

```bash
$ docker-compose exec app bash

root@dawl-laravel:/var/www/ddd-backend-with-laravel# make stan-analyse
```

### キャッシュの削除

Makefileにターゲットを定義しています．

Laravelの一連のキャッシュ削除コマンドを全て実行します．

```bash
$ docker-compose exec app bash

root@dawl-laravel:/var/www/ddd-backend-with-laravel# make clear-all-cache
```

<br>

## 補足事項

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

<br>

## クリーンアーキテクチャによるDDD

DDDを実現するために，最初レイヤードアーキテクチャが考案されました．

![ドメイン駆動設計](https://user-images.githubusercontent.com/42175286/58724663-2ec11c80-8418-11e9-96e9-bfc6848e9374.png)

クリーンアーキテクチャは，さらにこのレイヤードアーキテクチャに対して，『依存性逆転の原則』を組み込んだものです．

依存性逆転の原則を満たすために，インターフェースに依存するように実装する必要があります．

参考：https://little-hands.hatenablog.com/entry/2017/10/11/075634

『依存性逆転の原則』を満たすために，まず，ドメイン層にインターフェースリポジトリを置き，インフラストラクチャ層にその実装を置きます．

また，ユースケース層では，ドメイン層のインターフェースリポジトリを介して，インフラストラクチャ層の実装リポジトリをコールするようにします．

これにより，**ユースケース層とインフラストラクチャ層の両方が，ドメイン層のインターフェースに依存する**ようになり，依存性逆転の原則を満たすことができます．

<br>

## 依存性逆転の原則

<iframe class="speakerdeck-iframe" frameborder="0" src="https://speakerdeck.com/player/509d25f8592f4177a4486c1be893f70c" title="🏗️ ドメイン駆動設計と依存性逆転の原則" allowfullscreen="true" style="border: 0px; background: padding-box padding-box rgba(0, 0, 0, 0.1); margin: 0px; padding: 0px; border-radius: 6px; box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 40px; width: 100%; height: auto; aspect-ratio: 560 / 315;" data-ratio="1.7777777777777777"></iframe>

<br>
