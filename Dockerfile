# 使用官方的 PHP 7.4 基礎映像
FROM php:7.4-apache

# 安裝 PHP 擴展
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 複製應用程序文件到容器中
COPY src/ /var/www/html/

# 設置工作目錄
WORKDIR /var/www/html

# 開放 80 端口
EXPOSE 80
