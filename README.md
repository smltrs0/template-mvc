#Template MVC
Templete que posee un esqueleto de una app MVC funcional, ideal para proyectos pequeños
## Eloquent ORM
## Simple PHP Router
### Simple example:
```php
// Require the class
include 'src\Steampixel\Route.php';

// Use this namespace
use Steampixel\Route;

// Add the first route
Route::add('/user/([0-9]*)/edit', function($id) {
  echo 'Edit user with id '.$id.'<br>';
}, 'get');

// Run the router
Route::run('/');
```
