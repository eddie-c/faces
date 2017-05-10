# faces
face library

INSTALL 
-------------------------------------------

1. sudo apt-get install -y php mysql php-mbstring php-xml

2. 需要apache或者nginx

3. 你需要composer
      <ul>
      <li>1） 访问https://getcomposer.org/download/，获取最新的composer，手动下载composer.phar
      百度云连接：https://pan.baidu.com/s/1gfDYxBP
      </li>
      <li>
      2)  拷贝composer.phar 并重命名，保存为 /usr/bin/local/composer， 并chmod u+x 
      </li>
      <li>
      3)  修改composer使用国内镜像 ：
          composer config -g repo.packagist composer https://packagist.phpcomposer.com
      </li>
      <li>
      4） 切换到/var/www/path/to/project,执行：
          composer create-project "laravel/laravel" faces
          </li>
          <li>
      5)  最后将项目代码拷贝到生成的项目的对应的目录
      </li>
  </ul>
3. 配置nginx或者apache

