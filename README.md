Descarte Certo
===================
Another college project focused on spread content about recycle and sustainability. This is a study object.

### Table of contents:
- [What you have to have in your system](#what-you-have-to-have-in-your-system)
- [Installation](#installation)
- [Usage](#usage)
- [What if i want to test it online](#what-if-i-want-to-test-it-online)

#### What you have to have in your system
 * [PHP >= 5.6.4](http://php.net/downloads.php)
 * [MySQL Server 5.x.x](http://dev.mysql.com/downloads/mysql/) or similar as DBMS
 * [Composer](https://getcomposer.org/download/)

### Installation

You need to create a `.env` file first, you can use `.env.example` as an example, change theese 6 lines:
 - `DB_CONNECTION=mysql`
 - `DB_HOST=localhost`
 - `DB_PORT=3306`
 - `DB_DATABASE=YOUR_DATABASE_NAME`
 - `DB_USERNAME=YOUR_USERNAME`
 - `DB_PASSWORD=YOUR_PASSWORD`

Install dependencies:

```bash
composer install
```

Create database tables

```bash
php artisan migrate
```

Access [http//localhost:8000/](http//localhost:8000/) and have fun.

### Usage

Run a local app server:

```bash
php artisan serve
```

#### What if I want to test it online?
Click over there :arrow_right: <https://descarte-certo.herokuapp.com/>

> **Note:**
>
> - This application was made as a college project with **learning purpose**.
> - Powered by [Laravel 5.3](laravel.com)
