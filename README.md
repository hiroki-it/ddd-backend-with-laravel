# ddd-design-patterns-with-laravel

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

オニオンアーキテクチャは，さらにこのレイヤードアーキテクチャに対して，インフラストラクチャ層の依存性逆転を組み込んだものです．

参考：https://little-hands.hatenablog.com/entry/2017/10/11/075634

今回，オニオンアーキテクチャでDDDを実現するために，Laravelのサービスコンテナを利用しました．

ドメイン層のインターフェースリポジトリを介して，インフラストラクチャ層の実装リポジトリをコールできるように，Laravelのサービスコンテナ（DIコンテナ）を使用しています．

具体的には，[RepositoryServiceProviderクラス](https://github.com/Hiroki-IT/tech-blog/blob/develop/app/Providers/RepositoryServiceProvider.php) にて，インターフェースリポジトリと実装リポジトリをバインドしております．

これにより，インターフェースリポジトリがコールされると，実装リポジトリがリゾルブされます．

### appディレクトリ構成

本リポジトリのappディレクトリは，DDDとデザインパターンを意識して，以下の通りに構成しております．

```
project
└── app
    ├── Console
    ├── Constant # 定数パターン
    ├── Criteria # 検索条件パターン
    ├── Domain            # ** ドメイン層 **
    |   ├── Core            # ドメインの元となるオブジェクト
    |   ├── Repositories    # インターフェースリポジトリ（実装リポジトリと対応）
    |   ├── Services        # ドメインサービス   
    |   └── X（任意のルートエンティティ）
    |       ├── Entity      # エンティティ 
    |       └── ValueObject # 値オブジェクト
    |
    ├── Exceptions # 例外
    ├── Http            # ** プレゼンテーション層 **
    |   ├── Controllers   # コントローラ
    |   ├── Converters    # データ型変換パターン
    |   ├── Middleware    # ミドルウェア
    |   └── Requests      # バリデーション
    |
    ├── Infrastructure # ** インフラストラクチャ層 **
    |   ├── DTO          # エンティティ詰め替えオブジェクト（Eloquentを継承）
    |   └── Repositories # 実装リポジトリ（インターフェースリポジトリと対応）
    |
    ├── Providers # プロバイダー
    ├── Traits # トレイト
    └── UseCase     # ** ユースケース層 **
        ├── UseCases # ユースケース
        └── Services # アプリケーションサービス 
```
