# 環境構築　　

## Docker作成  
1. git clone git@github.com:miho-85-ux/testcontact-form.git  
2. docker-compose up -d --build  

## Laravel環境構築  
1. docker-compose exec php bash  
2. composer install  
3. cp .env.example .env     .env.exampleファイルから.envファイルを作成し、環境変数を変更  
4. php artisan key:generate  
5. php artisan migrate  
6. php artisan db:seed  

# 開発環境
* お問い合わせフォーム:http://localhost  
* phpmyadmin:http://localhost:8080

