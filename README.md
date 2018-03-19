Module Admin Backend - Laravel
======

> Admin pages & REST apis for module management 

## Overview

### 1. Main Features
- Module management  
Moudle list, Add, Modify, Delete, ...
- App version management  
Version list, Add, Modify, Delete, ...
 
### 2. Docker containers 
Has its own docker container for web server and Mysql database, so that anyone can develop and deploy easily with docker.   
#### 2.1 Webserver  
- Based on [php:7.1-apache](https://hub.docker.com/_/php/) docker image  
- Php Extensions  
pdo, pdo_mysql, gd, curl, mbstring, xml, tokenizer, zip, PECL  
- XDEBUG for php debug
  - ``zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20160303/xdebug.so``  
  - ``xdebug.remote_port=9000``    
  - ``xdebug.idekey=PHPSTORM``   
#### 2.2 Mysql server
- Based on [mysql:5.7](https://hub.docker.com/_/mysql/) docker image  

### 3. Techniques  
#### 3.1 Admin & RESTful Api ([Laravel PHP Framework](https://laravel.com/) v5.3.31)
- Maintains web page & api routing through web.php and api.php respectively
  - ``auth`` middleware and ``Auth`` are used to implement user authentication   
- Maintains database through migration  
- Used Error Bags for showing errors
  - Showing errors in log in page
  - Keep original input paramenters using ``old()`` helper function
  - ``request()`` helper function in blade view

#### 3.2 Admin pages
Implemented admin web pages based on [Inspinia](https://wrapbootstrap.com/theme/inspinia-responsive-admin-theme-WB0R5L90S) theme  

## Need to Improve
- Protect download data with authentication
- Improve features