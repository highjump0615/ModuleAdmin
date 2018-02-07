FROM php:7.1-apache

# Install developer dependencies
RUN apt-get update -y && apt-get install -y libpng-dev curl libcurl4-openssl-dev libxml2-dev vim git unzip

# Install php extensions
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql 
#RUN docker-php-ext-install openssl
RUN docker-php-ext-install gd 
RUN docker-php-ext-install curl 
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install xml
RUN docker-php-ext-install tokenizer
RUN docker-php-ext-install zip

# Install PECL extension
RUN pecl channel-update pecl.php.net
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20160303/xdebug.so" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_autostart=true" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_mode=req" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_port=10000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_log=/var/log/xdebug_remote.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_connect_back=Off" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN a2enmod rewrite
RUN service apache2 restart
