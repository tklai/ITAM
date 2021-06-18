# ITAM
This ITAM (IT Assets Management) system is a laravel-based project, which is created during the individual project of BSc of Business Information Technology. This system aims to provide a Single Source of Truth environment to manage all IT assets in one place.

# System
The project is based on Laravel Framework version 5.6. Server requirements can be found in [Laravel Docs](https://laravel.com/docs/5.6#server-requirements). 
To install:
1. Clone this repository to your web server directory, make a new copy of `.env.example` and rename it to `.env`.
2. Change the properties in `.env` file. Only APP_* and DB_* properties are used in this system.
3. Run the following code to install the dependencies of the system:
```
composer install
```
4. Migrate the schemas to database:
```
php artisan migrate
```
5. Create user by using `php artisan tinker`:
```
$user = new App\User();
$user->username('some-username');
$user->name('some-full-name');
$user->password(bcrypt('secrets'));
$user->save();
```
6. The system should be ready in this stage.

# License
Copyright 2021 TK Lai

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
