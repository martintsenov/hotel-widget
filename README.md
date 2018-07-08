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

Description of the Widget app workflow
--------------------------------------
1. `http::/<host_url>/widget/<id>`