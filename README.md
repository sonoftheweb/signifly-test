## Scoreboard

This is my submission to the assignment to build a score board that will be used on screen (large and small).

Things to note:
1. This is an SPA application built with Laravel and VueJs
2. While I may have installed vue router, there is only one page and admin section has not been added fully.
3. Following the scope of what needs to be presented, I ensured that the app can populate it's database using seeders and scores are easily altered (double click to trigger update modal).


#### Installation
1. Pull the repo `git pull http://repo-url`
2. In the root folder, run `npm install && composer install` to install all dependencies.
3. Create a new .env file in the root folder and copy over the contents of .env.example to the new .env file. You do not need to alter anything as the database is file based (SQLite).
4. Run `php artisan setup` to setup the application. This runs all migrations and seeders as well as clears cache.
5. Run `npm run dev && php artisan serve` to start the server. In your browser, you may access the application via http://loalhost::8000.
