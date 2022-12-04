## 商品管理システム

### 環境構築手順

* Gitクローン
* .env.example をコピーして .env を作成
* MySQLかPostgreSQLのデータベース作成（名前：item_management）  
  ローカルでMAMPを使用しているのであれば、MySQL推奨
* .env にデータベース接続情報追加
```
例）
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=item_management
DB_USERNAME=root
DB_PASSWORD=root
```
* APP_KEY生成
```
$ php artisan key:generate
```
* Composerインストール
```
$ composer install
```
* フロント環境構築
```
$ npm install
$ npm run dev
```
* マイグレーション
```
$ php artisan migrate
```
#   I t e m - m a n a g e r  
 #   I t e m - m a n a g e r  
 #   I t e m s  
 #   I t e m - m a n a g e r  
 