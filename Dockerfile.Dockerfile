# 使用官方 PHP 7.4 映像作為基礎
FROM php:7.4-apache

# 更新 apt-get 並安裝系統依賴和 PHP 擴展
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli pdo pdo_mysql zip

# 複製應用程序代碼到容器內的 /var/www/html
COPY . /var/www/html/

# 複製自定義的 php.ini 配置文件 (如果有)
# COPY php.ini /usr/local/etc/php/

# 設置工作目錄
WORKDIR /var/www/html

# 暴露容器的 80 端口
EXPOSE 80

# 啟動 Apache
CMD ["apache2-foreground"]
