# :sunny: [Routine Share](https://routine-share-hiro.herokuapp.com/)

![https://user-images.githubusercontent.com/64528558/91655595-b2225f80-eaec-11ea-9535-cd4597197f37.gif](https://user-images.githubusercontent.com/64528558/91655595-b2225f80-eaec-11ea-9535-cd4597197f37.gif)

### :sunny: [Routine Share](https://routine-share-hiro.herokuapp.com/)

## :warning: AWS停止中、Herokuで公開しています

変更前：[http://routine-share.work](http://routine-share.work)

**現在**　：[https://routine-share-hiro.herokuapp.com/](https://routine-share-hiro.herokuapp.com/)

**画面の表示まで時間がかかりますがご了承下さい。**

## :earth_asia: 概要

- **ルーティン（日常で毎回行うこと）をシェアするためのアプリ**です。
- 他のルーティンを参考に自分用のルーティンを作ったり、投稿したルーティンからのフィードバックで**生活の質を向上させることを目的**としました。
- **Laravelを使い、開発からDocker環境**で行っています。
- 2020年8月の**1ヶ月間で０から公開できるレベルを目標**として制作しています。

## :bulb: 作成経緯

- **コロナ禍でのライフスタイル変化**

    オンライン化が進み、ライフスタイルの変化の中で**時間をどのように管理するかが重要性を増す**と考えました。

- **自身の生活リズムの改善**

    私自身が気を抜くと夜型の不健康な生活リズムになってしまう為、ルーティンを共有して**生活の質を高めたい**という思いがありました。

 - **ルーティンの定着率を高める**

   新たなルーティンは、取り入れてもすぐには定着しません。それらを**手軽にまとめて見返すことでルーティンの定着率を高めたい**と考えました。


## :alarm_clock: 期間

2020年8月からすべて**独学**で制作しています。

## :star: 特徴

- **githubでのプルリクエストを使った開発**
    - 独学のためIssuesに近い使い方です。
- **Dockerによるコンテナ環境での開発**
    - 必要最小限の構成にしたかった事とDockerを理解する為、Laradockは使わず開発しました。
- **AWSへのデプロイ**
    - ECR,ECSを利用してデプロイしました。
    - DBの冗長性を高めています。
- **CircleCIによる自動テスト**
- レスポンシブ対応
- 管理者ユーザーによる一般ユーザーアカウント、投稿の削除

    - ユーザーはソフトデリート、削除されたユーザーの投稿は残しています。

- アップロード画像の自動リサイズ

## :notebook: 学習方法

1. **英語サイトや文献も問題なく理解できます。**

    日本語の情報だけでなく、 **Googleの英語専用検索を使い積極的に海外の情報源にも触れてきました。** 公式ドキュメントは原文の方が理解しやすい部分もあり、エラー解決やシステムへの理解がよりスムーズに進められました。

2. **経験のアウトプットも行っています**。

    自身がQiitaには何度も助けてもらっているため、微力ながら力になりたいと思い始めました。

    [@stepiko135のマイページ - Qiita](https://qiita.com/stepiko135)

## :cloud:ネットワーク構成図

![Routine-share](https://user-images.githubusercontent.com/64528558/92437213-55f0c700-f1e1-11ea-972e-4cc68345cc75.png)

## :computer: 使用技術

### フロント

- Sass
- Materialize(CSSフレームワーク)
- Javascript / jQuery

### バックエンド

- PHP 7.3
- **Laravel** 7.22.4
- Intervention Image (アップロード画像の整形)

### インフラ

- Docker Engine 19.03.12
- Docker Compose 1.26.2

    **本番環境**

    - AWS(詳細はネットワーク構成図参照)
        - RDS for MySQL8.0
        - Nginx 1.17

    **開発時環境**

    - MySQL 8.0
    - Nginx 1.17

### その他

- CircleCI
- git 2.24.3
- Linux基礎コマンド
- Github (Pull Request, Issues を使用)

## :wrench:機能
- CRUD
- 管理者機能(ユーザーはソフトデリート)
- 画像アップロード・リサイズ機能
- ランキング表示
- レスポンシブ対応
- ページネーション
- お気に入り機能
- セッション
- OGP設定

## :dvd: 利用サイト

- Qiita：経験したことのアウトプットも行っています。

    [@stepiko135のマイページ - Qiita](https://qiita.com/stepiko135)

- Twitter：2020年4月のプログラミング開始時に始めました。最近投稿は少なめです。

    [stepiko135@Twitter.com](https://twitter.com/stepiko135)

- teratail：相当考えた上で解決できなかった問題はこちらで質問しました。

    [WASWAS｜teratail（テラテイル）](https://teratail.com/users/WASWAS#question)


## :construction_worker: ローカルでの起動方法

1. docker-composeとLaravel用の `.env`を それぞれの`.env.example`を基に作成します。

    Laravel用の `.env`のAPP_KEYは4で作成します。

2. buildしてappコンテナに入ります。

    ```php
    docker-compose up -d --build
    docker-compose exec app ash
    ```

3. composerをインストールします。

    ```php
    composer install
    ```

4. APP_KEYの作成

    ```php
    php artisan key:generate
    ```

5. マイグレーション＆シーディング

    ```php
    php artisan migrate:fresh --seed
    ```

6. [http://localhost:80/](http://localhost:80/) にアクセスします。