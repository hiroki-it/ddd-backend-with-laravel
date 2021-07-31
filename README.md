# ddd-api-with-laravel

## 概要

### アプリケーションについて

模索中...

### 採用フレームワークについて

Laravelを採用しました．

LaravelはActiveRecordパターンのフレームワークのため，DDDと組み合わせるためには，一工夫必要です．

工夫の方法につきましては，以降の説明を参考に．

<br>

## 環境構築

### イメージビルド&コンテナ構築

イメージのビルドとコンテナの構築を行います．

```sh
$ docker-compose up -d
```

### ライブラリのインストール

起動中のコンテナ内でコマンドを実行します．

ここでは，appサービスにてライブラリをインストールします．

```shell
$ docker-compose exec app composer install
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

アプリケーション層でエンティティを構成し，これをドメイン層のインターフェースリポジトリを介してインフラストラクチャ層に渡すと，エンティティがDTOに詰め替えられます．

DTOはEloquentを継承しているため，詰め替えられたデータに応じて，データベースを操作できます．

### オニオンアーキテクチャによるDDD

DDDを実現するために，最初レイヤードアーキテクチャが考案されました．

![ドメイン駆動設計](https://user-images.githubusercontent.com/42175286/58724663-2ec11c80-8418-11e9-96e9-bfc6848e9374.png)

オニオンアーキテクチャは，さらにこのレイヤードアーキテクチャに対して，『依存性逆転の原則』を組み込んだものです．

依存性逆転の原則を満たすために，インターフェースに依存するように実装する必要があります．

参考：https://little-hands.hatenablog.com/entry/2017/10/11/075634

![onion-architecture](https://raw.githubusercontent.com/hiroki-it/tech-notebook/master/images/onion-architecture.png)

今回，オニオンアーキテクチャでDDDを実現するために，Laravelのサービスコンテナを利用しました．

『依存性逆転の原則』を満たすために，まず，ドメイン層にインターフェースリポジトリを置き，インフラストラクチャ層にその実装を置きます．

また，ユースケース層では，ドメイン層のインターフェースリポジトリを介して，インフラストラクチャ層の実装リポジトリをコールするようにします．

これにより，**ユースケース層とインフラストラクチャ層の両方が，ドメイン層のインターフェースに依存する**ようになり，依存性逆転の原則を満たすことができます．

具体的には，[RepositoryServiceProviderクラス](https://github.com/Hiroki-IT/tech-blog/blob/develop/app/Providers/RepositoryServiceProvider.php) にて，インターフェースリポジトリと実装リポジトリをバインドしております．

インターフェースリポジトリがコールされると，実装リポジトリがリゾルブされます．

### appディレクトリ構成

本リポジトリのappディレクトリは，DDDとデザインパターンを意識して，以下の通りに構成しております．

```
project
└── app
    ├── Console
    ├── Constant # 定数パターン
    ├── Domain               # ** ドメイン層 **
    |   └── Foo              # 任意のルートエンティティ
    |       ├── Criterion    # ドメイン検索条件（検索条件パターン）
    |       ├── Entities     # エンティティ 
    |       ├── Repositories # インターフェースリポジトリ（実装リポジトリと対応）
    |       ├── Services     # サービス
    |       └── ValueObjects # 値オブジェクト
    |
    ├── Exceptions # 例外
    ├── Http            # ** プレゼンテーション層 **
    |   ├── Controllers # コントローラ
    |   ├── Middleware  # ミドルウェア
    |   └── Requests    # バリデーション
    |
    ├── Infrastructure # ** インフラストラクチャ層 **
    |   └── Foo              # 任意のルートエンティティ
    |       ├── DTOs         # エンティティ詰め替えオブジェクト（Eloquentを継承）
    |       └── Repositories # 実装リポジトリ（インターフェースリポジトリと対応）
    |
    ├── Providers # プロバイダー
    ├── Traits # トレイト
    └── UseCase     # ** ユースケース層 **
        └── Foo          # 任意のルートエンティティ    
            ├── Inputs   # インプット
            ├── Services # サービス
            └── UseCases # ユースケース
```
