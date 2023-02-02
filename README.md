### Todo Api With Authentication
 simple todo api with authentication using Laravel framework, if you find any issues or bugs you can report to us
## Usage <br>
Setup the repository <br>
```
git clone https://github.com/coswat/todo-api.git
cd todo-api
composer install
cp .env.example .env 
php artisan key:generate
php artisan cache:clear && php artisan config:clear 
php artisan serve 
```

## Database Setup <br>
```
mysql;
create database laravel-todo;
exit;
```


### Setup your database credentials in the ```.env``` file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-todo
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

### Sanctum
Before you can use Laravel Sanctum, you obviously need to make sure that you install it through Composer. Besides that, you should upblish the Sanctum configuration file as well.
```
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

### Migrate tables
```
php artisan migrate
```
<p align="center"><a href="https://github.com/coswat/todo-api#coswat"><img src="http://randojs.com/images/barsSmallTransparentBackground.gif" alt="Animated footer bars" width="100%"/></a></p>
<br/>
<p align="center"><a href="https://github.com/coswat/todo-api#"><img src="http://randojs.com/images/backToTopButtonTransparentBackground.png" alt="Back to top" height="29"/></a></p>
