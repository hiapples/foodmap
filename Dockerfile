# 使用官方 PHP 镜像作为基础镜像
FROM php:7.4-apache

# 将本地应用程序文件复制到容器中的 /var/www/html 目录
COPY . /var/www/html/

# 设置工作目录（可选）
WORKDIR /var/www/html

# 安装任何额外的 PHP 扩展（根据需要）
RUN docker-php-ext-install mysqli

# 如果需要其他的配置或文件，可以在这里执行额外的命令
# RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev
# RUN docker-php-ext-configure gd --with-freetype --with-jpeg
# RUN docker-php-ext-install gd

# 使端口 80 可用
EXPOSE 80

# 启动 Apache 服务器（默认命令）
CMD ["apache2-foreground"]
