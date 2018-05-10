# usertech_blog
Symfony 3 based blog app

# How to Install
You can choose from two methods - with or without docker
## Install using docker
1. git clone this repo
2. add usertechblog.local to hosts file
3. run $docker compose up -d
4. run $docker exec -it <container_id_or_name> composer install
5. at localshost:8090 you'll find PHPMyAdmin (credentials: admin pass), there you can import db.sql
6. browse to the usertechblog.local 

## Install without docker
1. git clone this repo
2. cd your_app folder
3. run composer install
4. create db and import db.sql
5. set app/config/parameters.yml accordingly to your database
6. inside your_app folder run php bin/console server:start