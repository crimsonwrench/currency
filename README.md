# Currency Converter
A simple currency converting API written in php+laravel+mysql

# Requirements
  * PHP >= 7.1.3
  * Composer
  * PDO PHP Extension + pdo_mysql  
  * MySQL with configured database & user
  
# Installation
  
### Clone git repository:

```
git clone https://github.com/crimsonwrench/currency.git
```

### Install project dependencies:

```
composer install
```

### Copy .env.example file in project root folder to .env

```
cp .env.example .env
```

### Configure MySQL connection in .env file

```
DB_CONNECTION=mysql
DB_HOST=YOUR_DB_HOST
DB_PORT=YOUR_DB_PORT 
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_USER_NAME
DB_PASSWORD=YOUR_PASSWORD
```

### Generate App Key

```
php artisan key:generate
```

### Migrate database

```
php artisan migrate && php artisan db:seed
```

### Run server

```
php artisan serve --port=8080
```
