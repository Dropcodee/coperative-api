# APPLICATION SETUP
 **Clone Repository**
 1. `git clone`
 
**Install Dependencies & Basic Setup**
1. `composer install`
2. Rename `.env.example` to `.env`
3. Generate app key - `php artisan key:generate`

**SETUP DATABASE**
```
DB_DATABASE=coperative_db
DB_USERNAME=root
DB_PASSWORD=sql database password or leave empty
```

**RUN MIGRATIONS & SEEDERS**
1. `php artisan migrate`
2. Seed roles & permissions - `php artisan db:seed --class=RolesAndPermissionSeeder`


