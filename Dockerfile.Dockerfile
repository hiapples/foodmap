# 使用官方 PHP 7.4 映像作為基礎
FROM php:7.4-apache

# 安裝 PHP 擴展（如果需要）
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 複製當前目錄內容到容器內的 /var/www/html
COPY . /var/www/html/

# 設置工作目錄
WORKDIR /var/www/html

# 暴露容器的 80 端口
EXPOSE 80
