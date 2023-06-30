<h1 align="center">
    <strong>
        <i>Nowted</i>
    </strong>
</h1>

## About Nowted

Nowted is a website designed to assist users in creating, storing, and managing notes. This website offers features that allow users to organize their notes by grouping them into folders. One of Nowted's main features is its WYSIWYG (What You See Is What You Get) rich text editor. This feature allows users to easily create notes with rich text formatting. Users can highlight text, create table, create lists, or enter links quickly and intuitively

## Purpose

The purpose of making this website is to complete the final project assignment from the IT [organization](https://github.com/amccamikom) that I joined on campus

## Credits

Thanks to [Codedesign](https://codedesign.dev/challenge/nowted-app) for the idea and design (indirectly I also completed the challenge he made, lol)

## Requirements

-   PHP 8.2
-   Composer
-   NPM
-   RDBMS (I am using MySQL on this project)

## Installation

-   Clone the repository `https://github.com/mproyyan/nowted.git`
-   Change directory `cd nowted`
-   Copy environment file `cp .env.example .env`
-   Configure your database connection in `.env` file
-   Install composer dependencies `composer install`
-   Install npm dependencies `npm install`
-   Bundle static file `npm run build`
-   Run database migration and database seed `php artisan migrate --seed`. We provide 2 accounts for testing purposes which you can use freely, `jhondoe@test.com` and `jennydoe@test.com` both accounts with passwords are `password`
-   Run the app `php artisan serve`

## Tech Stack

-   [PHP 8.2](https://www.php.net/releases/8.2/en.php) - Language syntax
-   [Laravel 10](https://laravel.com/docs/10.x) - Framework
-   [Livewire](https://laravel-livewire.com/) - Laravel Library
-   [Alpine JS](https://alpinejs.dev/) - Javascript Framework
-   [Tailwind CSS](https://tailwindcss.com/) - CSS Framework
-   [MySQL](https://www.mysql.com/) - Database

## Screenshoots

<img src="https://i.ibb.co/fGmV2wF/login.png" alt="Login Page" />
<img src="https://i.ibb.co/ZNLpxcv/folder.png" alt="Folder View" />
<img src="https://i.ibb.co/DYGZ1Jp/note-create.png" alt="Create Note Page" />
<img src="https://i.ibb.co/JCXRQ0f/note.png" alt="Note View" />
