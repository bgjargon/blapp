## Running the demo

1. Checkout with `git clone https://github.com/bgjargon/blapp.git`
1. Create a mysql database, name it as you wish and edit the `.env` to reflect the proper db name and credentials
1. Initiate the database with `php artisan migrate:fresh`
1. Fill the database with `php -f cron.php`
1. Configure the cron to run every day at 23:00 hours (i.e. `0 23 * * * /path/to/php -f /path/to/cron.php` ) to fetch the latest match data and update the DB. 
1. Run with `php artisan serve`