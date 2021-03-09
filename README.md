# tech-blog

## 概要

DDD x デザインパターン x Laravel で実装したブログ管理サイト

## 環境構築

ビルドとコンテナの構築を行います．

```sh
$ docker-compose up -d
````

## appディレクトリ構成

### ■ 構成図

本リポジトリのappディレクトリ以下は，以下の通りに構成しております．

```
tech-blog
└── app
    ├── Console
    ├── Constants        # 定数
    ├── Converters       # IDオブジェクト変換
    ├── Criteria         # 検索条件
    ├── Domain           # ドメイン層
    |   ├── Entity       # エンティティ
    |   ├── Repositories # リポジトリインターフェース（※依存性逆転を利用）
    |   └── ValueObject  # 値オブジェクト
    |
    ├── Exceptions       # 例外
    ├── Http             # アプリケーション層
    |   ├── Controllers  # コントローラ
    |   ├── Middleware   # ミドルウェア
    |   └── Requests     # バリデーション
    |
    ├── Infrastructure   # インフラストラクチャ層
    |   ├── DTO          # エンティティ詰め替えオブジェクト（Eloquestを継承）
    |   └── Repositories # 実装リポジトリ
    |
    ├── Providers        # プロバイダー
    ├── Services         # サービス層
    |   ├── Application  # アプリケーションサービス層
    |   └── Domain       # ドメインサービス層
    |
    └── Traits           # トレイト
```

### ■ LaravelでDDDを実現

ActiveレコードパターンのLaravelでドメイン駆動設計を実現するために，Eloquentを継承したDTOを用意しています．

アプリケーション層でエンティティを構成し，これをインターフェースを介してインフラストラクチャに渡すと，エンティティがDTOに詰め替えられます．

DTOはEloquentを継承しているため，詰め替えられたデータに応じて，データベースが操作されます．

### ■ DIコンテナで依存性逆転を実現

インターフェースリポジトリを介して実装リポジトリをコールできるように，Laravelのサービスコンテナ（DIコンテナ）を使用しています．

具体的には，[RepositoryServiceProviderクラス](https://github.com/Hiroki-IT/tech-blog/blob/develop/app/Providers/RepositoryServiceProvider.php) にて，インターフェースリポジトリをバインドし，実装リポジトリをリゾルブするようにしています．
