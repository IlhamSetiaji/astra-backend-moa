# Astra Backend Code
## _Created Using Laravel 10_

[![Laravel 10](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)](https://laravel.com/docs/10.x/)

Astra Backend Code adalah source code backend untuk proyek management event untuk Astra Daihatsu Motor yang dikerjakan oleh tim Magang Online Academy Bathh 8

## Features

- User Management
- Event Management
- Brand Management
- Digital Income Tracking
- Marketing Purpose

## Plugins

Astra Backend Code uses a number of open source projects to work properly:

- Spatie - Role and Permission Management Tools
- Telescope - Laravel Development Watcher
- Repository Service Pattern - For Developing Using Repo Design Pattern.


## Installation

Astra Backend Code requires [PHP 8.1+](https://www.php.net/downloads.php) to run.

To start Astra Backend Code, please follow this instruction:

```sh
git clone https://github.com/IlhamSetiaji/astra-backend.git
cd astra-backend
composer install
cp .env.example .env
php artisan key:generate
```

For Seeding and Migration the Database

```sh
// set your env variables 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=astra-daihatsu
DB_USERNAME=root
DB_PASSWORD=
// execute artisan command
php artisan migrate:fresh --seed
```

To run the code:

```sh
php artisan serve
```

