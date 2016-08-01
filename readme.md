# ShopBuddy API

This is an implementation for ShopBuddy API using the Laravel Framework

## Installation

* `git clone https://Einnor@bitbucket.org/Einnor/shop-buddy-api.git projectname`
* `cd projectname`
* `composer install`
* `php artisan key:generate`
* Create a database and inform *.env*
* `php artisan migrate --seed` to create and populate tables. Edit `UsersTableSeeder` to match credentials of the admin you want
* Inform *config/mail.php* for email sends
* `php artisan vendor:publish` to publish filemanager
* `php artisan serve` to start the app on http://localhost:8000/

## Api Documentation

To get started with the api, route to `/apidoc`