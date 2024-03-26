# CraftedBy_API

**Objectif et spécificités du projet** :
````
Développement d'une API destinée à un site e-commerce ayant pour but de présenter et vendre des produits artisanaux

- Framework PHP Laravel(v.10)

- Espace dédié aux artistes/artisans pour présenter leurs profils et créations
- Possibilité pour les artisans de gérer leurs propres comptes et de mettre à jour leurs créations
- Fonctionnalités de recherche avancés, telles que la recherche par matériau, par catégories ou par style
- Panier d'achat intuitif avec des options de personnalisation pour les produits 

- Respecter les critères de sécurité
- Impact carbone limité au mieux
````
**Initialisation** :
````
Installer php composer

Création du projet : "composer create-project laravel/laravel:^10.0 example-app"
Lancer le serveur : "php artisan serve"

Créer sa base de donnée et configurer la connexion dans le fichier ".env"
````
**DebugBar & IDE helper** : 
````
Debugbar : "composer require barryvdh/laravel-debugbar --dev"
IDE helper : "composer require --dev barryvdh/laravel-ide-helper"
````
**Générations des Migrations, Models, Factories & Seeders** :
````
- php artisan make:migration create_examples_table

- php artisan make:model Example
- php artisan make:factory ExampleFactory
- php artisan make:seeder ExampleSeeder

Run migrations : php artisan migrate
Re-run si modification migration : "php artisan migrate:fresh"

Run seeders : php artisan db:seed
Possibilité de générer ses seeders dans la même classe (DatabaseSeeder) ou de créer plusieurs classes (ExampleSeeder)
qui seront appelés dans DatabaseSeeder
````
**Controllers & CRUD** :
````
Controller simple :
- php artisan make:controller ExampleController

Controller avec fonctions CRUD associées et spécification du modèle:
- php artisan make:controller ExampleController --model=Example --resource
````
**Auth & policies** :
````
Laravel Sanctum : 
- composer require laravel/sanctum 
- php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider" 
- php artisan migrate 

Utiliser "HasApiToken" dans le modèle User
Créer le controller : "php artisan make:controller Api\\AuthController" pour gérer la création
et la connexion d'un utilisateur

Protéger l'API avec l'authentification en utilisant le middleware auth:sanctum : 
"Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');"
````
**Ressources** : 
````
https://laravel.com/docs/10.x/readme 
https://cours.brosseau.ovh/cheatsheets/laravel/quick.html
https://www.linkedin.com/pulse/laravel-api-authentication-using-sanctum-muhammad-babar-cfecc/
````

