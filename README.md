# tech-blog

## 概要

### LaravelでDDDを実現

DDD x デザインパターン x Laravel で実装したブログ管理サイトです．

ActiveRecordパターンであるLaravelでは，ドメイン層のモデルとテーブル構造が相互に依存します．

多くのメリットがある一方で，ドメイン層が変化するたびにテーブル構造に影響を与えてしまうというデメリットがあります．

これは逆も然りです．

ドメイン層の柔軟なスケーリングを考慮すると，LaravelにDDDを組み込むことが望ましいです．

また，DDDはActiveRecordパターンではなくRepositoryパターンと相性が良いです．

そこで，RepositoryパターンをLaravelに適用するために，Eloquentを継承したDTOを用意しています．

アプリケーション層でエンティティを構成し，これをドメイン層のインターフェースリポジトリを介してインフラストラクチャ層に渡すと，エンティティがDTOに詰め替えられます．

DTOはEloquentを継承しているため，詰め替えられたデータに応じて，データベースを操作できます．

### サービスコンテナで依存性逆転を実現

ドメイン層のインターフェースリポジトリを介して，インフラストラクチャ層の実装リポジトリをコールできるように，Laravelのサービスコンテナ（DIコンテナ）を使用しています．

具体的には，[RepositoryServiceProviderクラス](https://github.com/Hiroki-IT/tech-blog/blob/develop/app/Providers/RepositoryServiceProvider.php) にて，インターフェースリポジトリをバインドし，実装リポジトリをリゾルブするようにしています．


### appディレクトリ構成

本リポジトリのappディレクトリ以下は，以下の通りに構成しております．

```
tech-blog
└── app
    ├── Console
    ├── Constants        # 定数
    ├── Converters       # IDのオブジェクト化
    ├── Criteria         # 検索条件
    ├── Domain           # ドメイン層
    |   ├── Entity       # エンティティ
    |   ├── Repositories # インターフェースリポジトリ（実装リポジトリと対応）
    |   └── ValueObject
    |       ├── Type.php         # タイプコード
    |       └── ValueObject.php  # 値オブジェクト
    |
    ├── Exceptions       # 例外
    ├── Http             # アプリケーション層
    |   ├── Controllers  # コントローラ
    |   ├── Middleware   # ミドルウェア
    |   └── Requests     # バリデーション
    |
    ├── Infrastructure   # インフラストラクチャ層
    |   ├── DTO          # エンティティ詰め替えオブジェクト（Eloquentを継承）
    |   └── Repositories # 実装リポジトリ（インターフェースリポジトリと対応）
    |
    ├── Providers        # プロバイダー
    ├── Services
    |   ├── Application  # アプリケーションサービス層
    |   └── Domain       # ドメインサービス層
    |
    └── Traits           # トレイト
```

## 環境構築

ビルドとコンテナの構築を行います．

```sh
$ docker-compose up -d
````
