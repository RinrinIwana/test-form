# お問い合わせフォーム

## 環境構築
Dockerビルド
1. git clone
2. docker compose up -d build

MySQLはOSによって起動しない場合があるのでそれぞれPCに合わせてdocker-compose.ymlファイルを編集してください。

使用PCがMacのApple Silicon／M1チップのため、platformを指定してamd64イメージを使用しています。

Laravel環境構築
1. docker compose exec php bash
2. composer install
3. env.exampleファイルから.envを作成
4. php artisan migrate

php artisan migrate

## 使用技術(実行環境)
Laravel Framework 8.83.8

PHP 7.4.9

mysql  Ver 15.1

## ER図
<img width="370" height="478" alt="スクリーンショット 2025-07-13 6 07 20" src="https://github.com/user-attachments/assets/f2bac116-80d0-402a-bafc-0827cd8c779b" />


## URL
開発環境：http://localhost/
phpMyAdmin：http://localhost:8080/
