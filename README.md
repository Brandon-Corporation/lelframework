Framework Brandon Corporation

Requirement :
laravel 7.x
voyager


How to install :
# 1.0 Install Laravel
composer create-project --prefer-dist laravel/laravel $DIR_NAME

# 1.1 Require Voyager
cd $DIR_NAME && composer require tcg/voyager

# 1.2 Copy .env.example to .env and update the DB & App URL config
cp .env.example .env

# 1.3 Generate a Laravel key
php artisan key:generate

# 1.4 Run the Voyager Installer
php artisan voyager:install

# 1.5 Create a Voyager Admin User
php artisan voyager:admin $YOUR_EMAIL --create

# 2
add in config/app.php : \Bcorp\Lelframework\BcorpLelServiceProvider::class,

# 2.1
composer require bcorp/lelframework

# 2.2
php artisan bcorp:install

# 3
composer require laravel/ui --dev

# 3.1
npm install
npm run dev



How to use :
For the first time, you need to change a bit of settings. Connect in voyager with an admin account and go to : setting.

You have to change your team name and add, if you have, your discord server.


Add a new manga :
On the admin backend, click on ‘manga’, and create the manga sheet.

Add a new chapter:
On the admin backend, click on ‘chapitre’, and create the chapitre sheet. Attach to it a manga sheet.

Add images on a chapter:
Now, you have to go on ‘media manager’, and create a folder with the name of your manga. 
In this folder, add a new folder with this name ‘ch1’. The last step is to upload images on it.
Here's an example with three files :

[manga name] -> ch1 -> img1.png
            -> img2.png
            -> img3.png
        -> ch2 -> img1.png
            -> img2.png
            -> img3.png
            -> img4.png
        -> ch3 -> img1.jpeg
            -> img2.jpeg
            -> img3.jpeg

No entry has been created on the database for manga’s images. ‘Media manager’ is a safe place to upload files, and you can crop images. 
You can change the image without modifying the database.


Of course, if you are a developper, you can override views and controllers.
