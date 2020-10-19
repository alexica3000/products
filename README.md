# products
API for product catalog (PHP, Laravel framework, docker, docker-compose)

How to install:
 - clone the repository
 - navigate to repository folder and create the image: `sudo docker-compose build`
 - for the first running server: `sudo docker-compose up -d`
 - inside of the container:
 > `composer install`  
 > `npm install`  
 > `php artisan key:generate`  
 > `php artisan jwt:secret`   
 > `php artisan migrate`  
 - create new .env file from .env.example and change all constants
 
