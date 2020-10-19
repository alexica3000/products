## products
API for product catalog (PHP, Laravel framework, docker, docker-compose)

How to install:
 * clone the repository
 * navigate to repository folder and create the image: `sudo docker-compose build`
 * for the first running server: `sudo docker-compose up -d`
 * inside of the container:
 > `composer install`  
 > `npm install`  
 > `php artisan key:generate`  
 > `php artisan jwt:secret`   
 > `php artisan migrate`  
 * create new .env file from .env.example and change all constants
 * create the first user from Laravel Tinker:
 > `php artisan tinker`  
 > `User::addUser(['name' => 'super_admin', 'email' => 'super@admin.com'], 'RHBYoe');`

## middlewares
* **jwt** - ensures that JWT token is present and valid

## actions:
 * getting a list of all categories
 * getting a list of all products
 * gtting a list of products in a specific category
 * gtting a list of subcategories in a specific category
 * user authorization
 * add / edit / delete category (for authorized users)
 * add / edit / delete product (for authorized users)
