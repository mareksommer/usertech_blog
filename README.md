# usertech_blog
Symfony 3 based blog app

# How to Install
You can choose from two methods - with or without docker
## Install using docker
1. git clone this repo
```
$ git clone https://github.com/mareksommer/usertech_blog.git usertech_blog
```
2. add usertechblog.local to your hosts file
3. go to newly created folder
```
$ cd usertech_blog
```
3. compose docker
```
$ docker-compose up -d
```
4. run
```
$docker ps -a
```
copy name of your docker www container

5. run 
```
$ docker exec -it <container_name> /bin/bash
$ composer install
```
6. at localhost:8090 you'll find PHPMyAdmin (credentials: admin pass), there you can import usertech_blog_db.sql
7. browse to the usertechblog.local 

## Install without docker
1. git clone this repo
```
$ git clone https://github.com/mareksommer/usertech_blog.git usertech_blog
```
2. go to app directory inside newly created folder
```
$ cd usertech_blog/app
```
3. run 
```
$ composer install
```
4. create db and import usertech_blog_db.sql
5. set app/config/parameters.yml accordingly to your database
6. inside usertech_blog folder run 
```
$ php bin/console server:start
```
7. browse to localhost:8000

## Notes
- blog has one predefined user with credentials: username: admin, password: admin
- you can run applicatoin with debug bar at /app_dev.php
- symfony application is in app folder in usertech_blog directory
- for pagination I use simple cursor based pagination, in real application it should be served with some infinite scroll or at least AJAX load button

### Api endpoints
- /api/posts-list
- /api/post/{id} id example: cc1ffac0-53c6-11e8-9609-0242ac1e0003

Have fun :)