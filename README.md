# プロジェクト名

todo

# 概要

Todoアプリです。カテゴリごとに登録・編集・検索・削除ができます。

## 環境
- PHP バージョン: 7.4
- Laravel バージョン: 8.83
- データベース: MySQL(Docker使用)

## セットアップ手順

1. このリポジトリをクローン
```bash
git clone git@github.com:haruna-satoh/todo.git
cd todo
```

2. Dockerを起動
```bash
docker compose up -d --build
```

3. .envファイルを作成
```bash
cp src/.env.example src/.env
```

4. Laravelアプリケーションのセットアップ
PHPコンテナ内で実行
```bash
docker compose exec php bash
composer install
php artisan key:generate
php artisan migrate
```

5. アプリにアクセス

・ [http://localhost](http://localhost)
    →Todoアプリのトップページが表示されます（ログイン必須）
・ [http://localhost:8080/](http://localhost:8080/)
    →phpMyAdminが開きます(DB確認用)

## 認証機能

このアプリはユーザー認証機能（ログイン/新規登録）が実装されています。

Laravel Fortifyを使用しています。

### ログイン方法
1. 新規登録画面から任意のユーザー情報を入力してアカウントを作成してください。
2. 登録後、自動的にログイン状態となりTodo一覧ページが開きます。