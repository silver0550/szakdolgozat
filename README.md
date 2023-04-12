# Base repository

This repository is the core of my thesis. 
This skeleton is based on the Laravel Framework, which has thorough [documentation](https://laravel.com).

## Setup

To initialize the project run the `init.sh` script:
```bash
./init.sh
```
This script install dependecies via `composer`, creates a `.env` file, and sets up the app key.
In this file set all necessary configurations, like database connection settings:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<DATABASE_NAME>
DB_USERNAME=<DB_USERNAME>
DB_PASSWORD=<DB_PASSWORD>
```
Is also necessary the email addres of the 'Super Admin' and the 'hashed Defalt Password' like this:
```
SUPER_ADMIN='super@admin.com'
DEFAULT_PASSWORD='$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
```
## Setting up the database
After the database connection is set up correctly, migrations, and seeders can be run with the following:
```bash
php artisan migrate
```
During project development this command should be run, to update the tables.
If there are any seeders the `--seed` option can be provided.
To make a fresh migration, which drops all tables and recreate them run:
```bash
php artisan migrate:fresh
```

## Starting the dev server
After the initial configurations, the dev server can be started like:
```bash
php artisan serve
```


