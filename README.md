# JobPortal-SAAD-Project Hiring Site. This is a laravel porject using mysql as the database, to run the project on a
local host you mush have:

    1) Composer https://getcomposer.org/download/
    2) Xampp https://www.apachefriends.org/download.html

------------------------------------------------------------------------------------------------------------------------------------------
To start the porject:

Download porject, Unzip in this directory
    C:\xampp\htdocs\{project folder}

1) Open Xampp, run Apache and mysql.
 
2) Open phymyadmin by opening the browser and navigating to localhost/phpmyadmin 

3) Create a new database with the name "jobportal"
 
4) Open cmd, and run the following commands
    -> php artisan composer update 
            (to install dependencies)
    -> php artisan migrate 
            (to migrate database)
    -> php artisan serve 
            (to start up the server, this command will give you a link to which port the project is running on. 
             open this link in a browser)      
------------------------------------------------------------------------------------------------------------------------------------------

To create an admin account you must add a record manually to the database (the password must be hashed) add this code 
to the route/web directory 

              Route::get('d', function () {
                  return Hash::make('adminpassword');
              });

In the browser navigate to your localhost /d, this will be your admin hashed password you can then remove this code.

In the database insert the admin hasded password and email. To login in as an admin, navigate to your localhost /admin/login
and enter your the credentials
