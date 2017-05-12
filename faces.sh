#! /bin/bash
# 删除原有容器
docker rm -f faces

# 启动容器
docker run \
  --name faces \
  --link mysql:DB_HOST \
  -v ~/gitcode/faces:/var/www/html \
  --expose 80 \
  -w /var/www/html \
  -d php ./artisan serve --host=172.17.0.8 --port=80

