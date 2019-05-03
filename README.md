@@ -0,0 +1,74 @@
# How to do things?

## Set up the project locally
* Pull the project down on your local machine into the root directory of your local server e.g. "htdocs" for XAMPP.
* Make sure you have composer installed, because it is needed for installing packages such as PHPMailer. To install it, follow the instructions here: https://getcomposer.org/download/.
* Once composer is installed, go to the project root in terminal and run:
> `composer install`
* If you see any errors in the terminal, troubleshoot before you continue.
* Copy `example.config.php` and rename the copy to `config.php`. _Do not commit this file to the repository!_
* Open `config.php` and fill out the blanks:
* "rootUrl" is whatever you type in the browser to access the project, for example `localhost/security`
* Open `phinx.yml` and fill out the information for development server
* Run `vendor/bin/phinx migrate -e development` to migrate the database tables
* Finally, you need to set up the database and tables in it.

## Creating a new feature
All routes are handled through `app/routes.php`. This is an example on how to create a new feature for creating posts:
* Create `PostController.php` inside `app\controllers`
* Run `composer dump-autoload` in the terminal after each class you make, because otherwise you will not able to use that class.
* Create folder `posts` inside `app/views`
* Create view file called `index.blade.php` inside the `posts` folder
* Add some dummy text in the view just for testing
* Create a method (function) `index` inside the controller, which will return a view like this:
```php
return view('posts.index')
```
* Add a route in the routes file like this:
```php
$router->get('posts', 'PostController@index');
```
* Navigate to the route in the browser e.g. `localhost/security/posts` and you should see the dummy text that you put in the view inside your browser.

## Blade templating engine
The project uses blade templating engine, which allows to create php based html components and php code inside of html in a clear way.
It is very simple to get started, have a look at this documentation:
https://laravel.com/docs/5.1/blade
This is documentation of Blade within laravel, but it works exactly the same way the way we use it standalone.

## Helpers
### Access the logged in user
To access the logged in user anywhere inside of php:

```php
auth()->check();
auth()->user;
```

## Migrations
Migrations are a simple and effective way to set up and make changes to your database and have that change shared among all developers.

See documentation on how to create table migrations here: http://docs.phinx.org/en/latest/migrations.html

## Query builder
To access the database, we use a query builder i.e. right now it has just a few methods, but the idea is to expand it as needed in the project.

## Models
Every entity in the project should be represented as a model, for example, take a look at `app/models/User.php`. This allows us to reuse code effectively.

## Middleware
### Route middleware
Route middleware controls access to routes inside a controller (Currently applies to all routes in controller). The middleware is specified in the __construct function in the controller:
```php
public function __construct()
{
$this->middleware = [
'Authenticated'
];
}
```
This means that the user must logged in to acces any routees in this controller. The logic for `Authenticated` middleware is set in `app/middleware/Authenticated.php`

### Global middleware
Coming soon
