# 使用官方 PHP 與 Apache 組合的基礎映像
FROM php:7.4-apache

# 複製應用代碼到容器內的 /var/www/html 目錄
COPY ./src /var/www/html

# 安裝 MySQLi PHP 擴展
RUN docker-php-ext-install mysqli

# 啟用 Apache 的 mod_rewrite 模組
RUN a2enmod rewrite

# 設置工作目錄
WORKDIR /var/www/html

# 曝露 80 端口
EXPOSE 80

