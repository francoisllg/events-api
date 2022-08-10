# Events API Test

The Events API Test is a little project for testing my Laravel skills. 

```bash
Technologies used: Laravel 9 and PHP 8
```

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)



Clone the repository

    git clone git@github.com:francoisllg/events-api.git

Switch to the repo folder

    cd events-api

Use the package manager [composer](https://getcomposer.org/download/) to install all the dependencies of the Events API Test.

```bash
composer install
```
Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate





## Usage

First you have to the make the migrations


```php
php artisan migrate:fresh --seed
```

And run the tests in order to check if everything is ok

```php
php artisan test
```

If you want to test the routes with postman, you have to login.
The users for login are (after the migration and seed of the database) these ones:

```php
Admin user:
user: super@bmotionav.com 
pass: password

Regular user with licenses for creating events:
user: user@bmotionav.com
pass: password
```

This app uses Sanctum for authentication. After login, in the api response you will get a token. This token must be send as Bearer Token in the header of your petition

## API Routes
In order to access to the protected routes you have to login

```php
Public routes
Login => POST /api/login

Protected routes
Create Event => POST /api/events
Update Event => PATCH /api/events/{event_id}
Delete Event => DELETE /api/events/{event_id}
Get all events by user => GET api/users/{user_id}/events

```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
