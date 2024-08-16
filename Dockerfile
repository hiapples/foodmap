# 使用官方 PHP 镜像作为基础镜像
FROM php:7.4-apache

# 复制应用程序代码到容器内的 /var/www/html 目录
COPY ./src /var/www/html

# 安装 PHP 扩展和 Apache 模块
RUN docker-php-ext-install mysqli \
    && a2enmod rewrite

# 设置工作目录
WORKDIR /var/www/html

# 公开 80 端口
EXPOSE 80
