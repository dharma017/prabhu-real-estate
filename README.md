## Prabhu Real Estate

### Frameworks
1. Laravel 5.6
2. Materialize
3. Admin BSB Material Design

### Admin Features
1. Dashboard
2. Sliders
3. Properties
4. Features
5. Amenities
6. Pages
7. Settings
    1. Profile
    2. Message
    3. Change Password
    4. General Setting

### Agent Features
1. Properties (CRUD)
2. Settings
    1. Profile
    2. Message
    3. Change Password

### Install
01. `git clone git@github.com:dharma017/prabhu-real-estate.git`
02. `cd prabhu-real-estate`
03. `composer install`
04. `cp .env.example .env`
05. `php artisan key:generate`
06. `php artisan migrate`
07. `php artisan db:seed`
08. `php artisan storage:link`
09. `php artisan serve`

#### Cridentials
01. 
    Email: `admin@admin.com` 
    Password: `123456`
02. 
    Email: `agent@agent.com` 
    Password: `123456`