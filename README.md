# プロジェクト名

todo

# 概要

Todoアプリ

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
    →todoアプリのトップページが表示されます
・　[http://localhost:8080/](http://localhost:8080/)
    →phpMyAdminが開きます(DB確認用)