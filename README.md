Widget Prototype
=====================

Installation
------------
1. Clone github repo `clone https://github.com/martintsenov/hotel-widget`.
2. Download composer from https://getcomposer.org/download/ (Manual Download, composer.phar) 
   and then run `php composer.phar install`
3. DB script in /data/db-script.sql
4. Set Http server DocumentRoot to "<htdocs-folder-path>/hotel-widget/public"
5. Copy `.env.dist` as `.env` and set the database credentials

Requirements
------------
* [Symfony 4.1](https://symfony.com/roadmap/4.1)
* [PHP](https://secure.php.net/downloads.php) (7.1.*)
* Install APCu extension for PHP (https://pecl.php.net/package/APCu)
```
- download dll https://pecl.php.net/package/APCu/5.1.8/windows (7.1 Thread Safe (TS) x86)
- copy php_apcu.dll to  <php-folder>\php\ext
- add in <php-folder>\php\php.ini
extension=php_apcu.dll
[apcu]
extension=php_apcu.dll
apc.enabled=1
apc.shm_size=32M
apc.ttl=7200
apc.enable_cli=1
apc.serializer=php
```

Description of the Widget app workflow
--------------------------------------
1. `http://<host_url>/widget/<id>`