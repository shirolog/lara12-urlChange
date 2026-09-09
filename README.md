# Laravel URL Shortener

Laravelで制作したURL短縮アプリです。

## 概要

入力したURLから短いURLを生成することができるアプリです。

生成された短縮URLにアクセスすると、登録されている元のURLへリダイレクトします。

また、短縮URLには有効期限を設定しています。

## 主な機能

* URLの短縮
* 短縮URLから元のURLへのリダイレクト
* URL形式のバリデーション
* 生成した短縮URLのコピー
* 短縮URLの有効期限設定
* 同じURLが登録済みの場合は既存の短縮URLを使用
* 短縮URLの重複チェック

## 使用技術

* PHP 8.2
* Laravel 12
* MySQL / MariaDB
* Blade
* JavaScript
* Tailwind CSS
* Fetch API

## URL短縮の仕組み

入力された元URLから短縮URL用の識別子を生成し、データベースに保存します。

```text
元URL
↓
短縮URL用の識別子を生成
↓
データベースに保存
↓
短縮URLを表示
↓
短縮URLへアクセス
↓
元URLへリダイレクト
```

## 有効期限

短縮URLには有効期限を設定しています。

有効期限を過ぎた短縮URLへアクセスした場合は、404ページを表示します。

有効期限は環境変数で設定できます。

```env
URL_EXPIRATION_DAYS=7
```

## 環境構築

### 1. リポジトリをクローン

```bash
git clone <repository-url>
cd UrlChange
```

### 2. Composerパッケージをインストール

```bash
composer install
```

### 3. `.env`ファイルを作成

```bash
cp .env.example .env
```

### 4. アプリケーションキーを生成

```bash
php artisan key:generate
```

### 5. データベースを設定

`.env`のデータベース設定を自分の環境に合わせて変更してください。

```env
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=
```

### 6. URLの有効期限を設定

```env
URL_EXPIRATION_DAYS=7
```

### 7. マイグレーションを実行

```bash
php artisan migrate
```

### 8. アプリケーションを起動

```bash
php artisan serve
```

ブラウザからアプリケーションにアクセスしてください。

## 工夫した点

* Fetch APIを使用してページ遷移を行わずに短縮URLを生成
* 生成した短縮URLをクリップボードへコピーできるようにした
* 同じ元URLが登録済みの場合は既存の短縮URLを再利用
* 短縮URLの重複をチェック
* 短縮URLに有効期限を設定
* 有効期限が切れたURLにはアクセスできないようにした
* Laravelのバリデーションを利用して不正なURLを防止
