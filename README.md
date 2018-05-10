# usertech_blog
Symfony 3 based blog app

# How to Install
You can choose from two methods - with or without docker
## Install using docker
1. git clone this repo
```
git clone https://github.com/mareksommer/usertech_blog.git usertech_blog
```
2. add usertechblog.local to your hosts file
3. go to cloned directory
```
$cd usertech_blog
```
3. compose docker
```
$docker compose up -d
```
4. run 
```
$docker exec -it <container_id_or_name> composer install
```
5. at localhost:8090 you'll find PHPMyAdmin (credentials: admin pass), there you can import usertech_blog_db.sql
6. browse to the usertechblog.local 

## Install without docker
1. git clone this repo
```
git clone https://github.com/mareksommer/usertech_blog.git usertech_blog
```
2. 
```
$cd usertech_blog
```
3. run 
```
$composer install
```
4. create db and import usertech_blog_db.sql
5. set app/config/parameters.yml accordingly to your database
6. inside usertech_blog folder run 
```
php bin/console server:start
```