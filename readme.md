# requirements
- sqlite
- php

# How to setup db

now the postgressql db is used, as for contribution, please create new issues to ask the developers.

## Developers'
### cheetsheet for laravel

#### db
##### migration
- `php artisan make:migration xxx_xxx_table` create migration
- `php artisan migrate` migrate all migrations
##### seeder
- `composer dump-autoload` regenerate auto load
- `php artisan db:seed` seed db
- `php artisan migrate:refresh --seed` refresh db
