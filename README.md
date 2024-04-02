<text align="center">

# - CraftedBy -
**backend-API-project**

<br/>

<p align="center">
<img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="laravel">
<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="php">
<img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="mysql">
</p>
<br/>

Development of an API for e-commerce website designed to present and sell craft products.

</text>

<br/>

**Specifics :**
- PHP Framework Laravel(v.10)
- Space dedicated to artists/craftspeople to present their profiles and creations
- Artisans can manage their own accounts and update their creations
- Advanced search functions, such as searching by material, category or style
- Intuitive shopping cart with customisation options for products

- Respect safety criteria
- Minimise carbon impact

<br/>

**Initialisation :** 

Project creation :
````
composer create-project laravel/laravel:^10.0 example-app
````
Run : 
````
composer install
````
- Create your database and configure the connection in the ".env" file

Starting the server  : 
````
php artisan serve
````
<br/>

**Debugbar / IDE helper :** 

Debugbar :
```` 
composer require barryvdh/laravel-debugbar --dev
````
IDE helper :
```` 
composer require --dev barryvdh/laravel-ide-helper
````
<br/>

**Migration Generations, Models, Factories & Seeders :** 

````
php artisan make:migration create_examples_table
````
````
php artisan make:model Example
````
````
php artisan make:factory ExampleFactory
````
````
php artisan make:seeder ExampleSeeder
````
Run migrations : 
````
php artisan migrate
````
Fresh if modifications : 
````
php artisan migrate:fresh
````
Run seeders : 
````
php artisan db:seed
````
Run migrations & seeders : 
````
php artisan migrate:fresh --seed
````
Option of generating seeders in the same class (DatabaseSeeder) or creating several classes (ExampleSeeder)
which will be called in DatabaseSeeder

<br/>

**Controllers & CRUD :** 

Simple controller :
````
php artisan make:controller ExampleController
````
Controller with associated CRUD functions and model specification :
````
php artisan make:controller ExampleController --model=Example --resource
````

**Resources :** 

Enable you to display only certain attributes and expressively transform
our models and model collections into JSON
````
php artisan make:ressource ExampleResource 
````
````
php artisan make:resource Example --collection 
````
<br/>

**Auth & policies :** 

Laravel Sanctum : 
````
composer require laravel/sanctum 
````
````
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
````
````
php artisan migrate 
````

<br/>

Use "HasApiToken" in the User model
Create the controller : (user creation/connection management)
````
php artisan make:controller Api\\AuthController
````
Protect the API with authentication using the auth:sanctum middleware :
````
Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
````
<br/>

Generate Policies :
````
php artisan make:policy ExamplePolicy 
````
````
php artisan make:policy ExamplePolicy --model=Example  
````
Policy Methods > Controller Methods (called immediately before the controller methods are executed) :
- viewAny > index
- view > show
- create > store (or create)
- update > edit (or update)
- delete > destroy

<br/>

**Documentation :** 

- https://laravel.com/docs/10.x/readme 
- https://cours.brosseau.ovh/cheatsheets/laravel/quick.html
- https://www.linkedin.com/pulse/laravel-api-authentication-using-sanctum-muhammad-babar-cfecc/


