#! /bin/bash
# 删除原有容器
docker rm -f faces

# 启动容器
docker run \
  --name faces \
  --link mysql:DB_HOST \
  -v ~/gitcode/faces:/var/www/html \
  -v ~/gitcode/faces/000-default.conf:/etc/apache2/sites-enabled/000-default.conf \
  -v ~/gitcode/faces/apache2.conf:/etc/apache2/apache2.conf \
  --expose 80 \
  -w /var/www/html/public \
  -d php:7.1.4-apache
