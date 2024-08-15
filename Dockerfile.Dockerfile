# 使用 PHP 7.4 的官方映像
FROM php:7.4-apache

# 複製應用程序代碼到 /var/www/html
COPY . /var/www/html/

# 暴露端口 80
EXPOSE 80