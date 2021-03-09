# tech-blog

## 概要

DDD x デザインパターン x Laravel で実装したブログ管理サイト

## 環境構築

ビルドとコンテナの構築を行います．

```sh
$ docker-compose up -d
````

## appディレクトリ構成

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
    ├── Http             
    |   ├── Controllers  # コントローラ
    |   ├── Middleware   # ミドルウェア
    |   └── Requests     # バリデーション
    |
    ├── Infrastructure   # インフラストラクチャ層
    |   ├── DTO          # Eloquent詰め替え用オブジェクト
    |   └── Repositories # 実装リポジトリ
    |
    ├── Providers        # プロバイダー
    ├── Services         # サービス層
    |   ├── Application  # アプリケーションサービス層
    |   └── Domain       # ドメインサービス層
    └── Traits           # トレイト
```
