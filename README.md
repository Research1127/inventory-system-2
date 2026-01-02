PART 1 ----------------------------------------------------------------------------------------

Install the project

-   laravel new inventory-system-2
-   cd inventory-system-2
-   php artisan serve

Create product model and its controller and migrate it

-   php artisan make:model Product -m -c

Edit migration file and add the fields needed for the database in create_products_table.php

-   fields that we have is:
    1. Name
    2. Description
    3. Price
    4. Stock

Edit the .env file

-   Enter all the database connection detail

Edit Open bootstrap/app.php

-   Add this api: **DIR**.'/../routes/api.php',

Run the migration

-   php artisan migrate

Edit Product.php

-   To put our protected fields needed in the model

Create ProductSeeder.php

-   To give dummy data to database
-   Run php artisan make:seeder ProductSeeder
-   Register ProductSeeder.php in the DatabaseSeeder.php
-   Run php artisan db:seed

Edit ProductController.php and create

-   GET method here to retrieve all product data and by id and return 200
-   POST method to create a new product data and return and return 201
-   UPDATE method to update our previous data and return 200
-   DELETE method to delete the product data base on id and return 200

Create routes/api.php file

-   Register route for get all method
-   Run php artisan serve

Open Bruno and test all our method earlier

Repository setup

-   Create a repository in github repository and named it inventory-system-2
-   Set the repository to public
-   Give a meaningful Description
-   Open terminal in our project
-   Cd to our project folder
-   Run the command below:
    1. git init
    2. git branch -M main
    3. git add .
    4. git commit -m "restful api project created"
    5. git remote add origin git@github.com:Research1127/inventory-system-2.git
    6. git push -u origin main
    7. git status
    8. git log
    9. git tag -a checkpoint-1.0 -m "tag as version 1"
    10. git push origin checkpoint-1.0

PART 2 ----------------------------------------------------------------------------------------

Install Laravel Sanctum

1. Run this command in terminal:

    - php artisan install:api
    - then it will asked about migration and click yes

2. Overriding the default model
    - Open the default model which is User.php and add the command below:
        - use Laravel\Sanctum\HasApiTokens;
        - add HasApiTokens trait

Authentication Setup

1. Create a new AuthController.php and run this command:

    - php artisan make:controller Api/Auth/AuthController
    - Add the login, register, logout and me function

2. Edit routes/api.php

    - Add the routes for login, register, logout and me

3. Using TINKER to add user data into our user table

4. Test the login and register by using json

5. Test GET ME and LOGOUT function by key in the KEY and VALUE of the tokens in the HEADERS

6. Make sure before test ME and LOGOUT must LOGIN first

Authorization Setup

1. Install spatie package and run the command below in terminal:

    - composer require spatie/laravel-permission

2. Publish config and migrations

    - php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

3. Run the migrations

    - php artisan migrate

4. Open the User.php file and update it

    - add HasRole trait
    - add protected $guard_name = 'api';

5. Imagine that we have these permission that we will use for our product

    - products-view
    - products-create
    - products-update
    - products-delete

6. Now we need to implement those permission in the seeder file, run command below:

    - php artisan make:seeder RolePermissionSeeder

7. Then open database/seeders/RolePermissionSeeder.php to create role and permission

    - Make sure have the guard because permissions use 'api' guard

8. Setup the DatabaseSeeder.php and add the RolePermissionSeeder in it

9. After that run the command below:

    - php artisan db:seed --class=RolePermissionSeeder

10. Assign role to the user using TINKER and run this command:
    - php artisan tinker
    - use Spatie\Permission\Models\Role;
    - $user = App\Models\User::where('name', 'PowerAdmin')->first(); **_ Note that i give the permission to PowerAdmin _**
    - $user->assignRole('admin');

PROTECT PRODUCT ROUTES - Give specific access to the routes

1. Just adjust the api.php and give the specific access to the routes
2. Need to add at the end of the route:
    - ->middleware('auth:sanctum')->can('products-view');
    - ->middleware('auth:sanctum')->can('products-update');
    - ->middleware('auth:sanctum')->can('products-delete');
    - ->middleware('auth:sanctum')->can('products-create');
