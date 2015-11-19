
## Find My Campuses Friends

Project to help students with lack of internships to send requests to companies

## Stack Used

* [!Laravel PHP](https://laravel.com)
* [!Composer](https://getcomposer.org)
* [!Bootstrap](https://getbootstrap.com)
* [!MySQL](https://www.mysql.com)


### How to run the application

#### **Windows**

* Install Xampp: http://www.qoncious.com/questions/how-install-xampp-windows-7
* Install composer on Xampp: http://www.techflirt.com/install-composer-xampp
* Clone this repo if you havent done so using **https://github.com/joaonzangoII/find_my_campuses_friend.git**
* Setup a database on your phpmyadmin
* Rename the **.env.example** inside the project folder to **.env**
* Change the details of your database in the **.env** file
* Run **composer install** in the root of your project to install all dependencies the application needs to run properly
* Run **php artisan migrate --seed** or **php artisan migrate and php artisan db:seed** to migrate and seed the tables the application needs to run
* Run **php artisan serve** to start a local development server or put the project folder under your xampp httdocs and use your browser to access the website.


