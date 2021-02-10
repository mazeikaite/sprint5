1.Run CLI command inside of the {app-directory}:

composer install

** or php composer.phar install if composer is not installed globally.

2.Create new schema in your database (must be same name as in DB DATABASE= )

3.Make a copy of .env.example and erase the ".example" extention.

4.Update .env file with your credentials.
5.Run php artisan migrate in CLI inside your project.
