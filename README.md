Install the project

-   laravel new inventory-system-2
-   cd inventory-system-2
-   php artisan serve (this is to check whether our app are working or not)

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
