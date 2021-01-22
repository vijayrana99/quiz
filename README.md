> ### Online Quiz in Laravel

This is an example of online quiz boiler project with multiple level of users and quizs.

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies.

Clone the repository

    git clone https://github.com/vijaymgr/quiz.git

Switch to the repo folder

    cd quiz

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/vijaymgr/quiz.git
    cd quiz
    composer install
    cp .env.example .env
    php artisan key:generate

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, roles.

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

----------

# Testing Project

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/

# Login

Super Admin Logind Credentials

email: vijayrana.me@gmail.com
password: secret

# Note : When a new user is registered, it is registered as a 'Admin'. 'Super Admin' can change the roles and permissions of others.