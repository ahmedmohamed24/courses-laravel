# courses-laravel
**Egy courses !** it is an interactive website between students and instructors, where the instructors add their courses to a particular category and students can view them 

### Getting started 
```console
 composer install
```
```console
  npm install && npm run dev
```
### Data base 
#### There are two approaches to use the database 
1. Importing the database file in phpmyadmin (or any other database software)
   
2. using the credentials provided in the .env file to contact the remote database on heroku
> DB_CONNECTION=mysql
> DB_HOST=us-cdbr-east-02.cleardb.com
> DB_PORT=3306
> DB_DATABASE=heroku_bea30df3f5506a4
> DB_USERNAME=b73ea827a4c771
> DB_PASSWORD=8e8a4a2f

3. migrate the database 
```console
    php artisan migrate
```
```console
    php artisan tinker
    factory(\App\Models\Admin::class,10)->create()
    factory(\App\Models\Student::class,100)->create()
    factory(\App\Models\Category::class,20)->create()
    factory(\App\Models\Instructor::class,60)->create()
    factory(\App\Models\Course::class,140)->create()
    factory(\App\Models\Lecture::class,1000)->create()
    factory(\App\Models\Review::class,1000)->create()
```   
## for login to admin dashboar use the following credentials 

visit [admin link](http://egy-courses.herokuapp.com/admin/login) and enter these credentials 
> admin@gmail.com

> 123456
## for more Information and test live
Visit the website live at [egy](https://egy-courses.herokuapp.com/)

 Our screenshots & presentation [google-slides](https://drive.google.com/drive/folders/1pjaACDl8NapDv6qeLiXgMxCdRPu_jnQ_?usp=sharing)



