# faces
face library

INSTALL 
-------------------------------------------

1. sudo apt-get install -y php mysql php-mbstring php-xml php-pdo php-mysqli

2. 需要apache或者nginx

3. 你需要composer
      <ul>
      <li>访问https://getcomposer.org/download/，获取最新的composer，手动下载composer.phar
      百度云连接：https://pan.baidu.com/s/1gfDYxBP
      </li>
      <li>拷贝composer.phar 并重命名，保存为 /usr/bin/local/composer， 并chmod u+x </li>
      <li>修改composer使用国内镜像 ：
          composer config -g repo.packagist composer https://packagist.phpcomposer.com</li>
      <li>切换到/var/www/path/to/project,执行：
          composer create-project "laravel/laravel" faces</li>
      <li>最后将项目代码拷贝到生成的项目的对应的目录</li>
      </ul>
3. 配置nginx或者apache

4. 问题
   <ul>
   <li>如果访问php文件，是404，则查看php-fpm是否启动，手动执行php-fpm</li>
   <li>laravel可以开启debug模式，对应的文件是/config/app.php</li>
   <li>记得在项目目录下要有.env文件，里面会配置key</li>
   </ul>

