# Technical Test using Laravel/AngularJS/MySQL for carzam

Technical test realised following the requirements.

I have little knowledge on queues and functional tests so I decided to do not work on these parts.
I however felt pretty confident with the rest of the project and set up:
 - Laravel for the backend with API routes
 - MySQL with only one table
 - AngularJS to communicate with API and display results.

## Functionalities
This can be used to get information about cars stored in database. There are options to filter by Make, Model, Badge, Variant and Colour. Pagination and cache have been put in place to speed up results and lower database usage.

## Technical features
 - Usage of query cache to minimise IO with database.
 - Usage of Eloquent to access database from PHP.
 - Usage of Unit Tests and TDD to ensure higher code quality.
 - Developed with PHP 5.5.9, MySQL 14.14 on Ubuntu 14.04.

## Installation
 - Extract content of archive in a folder accessible to your webserver.
 - Update `.env.` file to match database host, login and password.
 - Insert MySQL dump `carzam.sql` in a Database called `carzam`.
 - Access web page by going to `public` URL, e.g. `http://127.0.0.1/carzam/public/`

## Unit tests
 - `sudo vim /etc/php5/cli/conf.d/20-xdebug.ini` and add line `xdebug.max_nesting_level = 500` to avoid error when unit testing.
 - Following Laravel standards, unit test files are located in `tests`.
