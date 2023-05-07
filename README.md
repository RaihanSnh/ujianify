# ujianify

### Installation

1. Install composer packages
    ```sh
    composer install
    ```

2. Install npm dependencies 
    ```sh
    yarn
    ```

3. Copy the env.example file to .env 
   ```sh
   cp .env.example .env
   ```

4. Generate encryption key (it used to hash user passwords)
    ```sh
    php artisan generate:key
    ```

5. Run database migrations to create all required tables.
    ```sh
    php artisan migrate
    ```
   
6. Build vite
    ```sh
    yarn build
    ```

7. Build scripts
    ```sh
    php artisan build:javascript
    ```

8. Create admin user
    ```sh
    php artisan user:admin:create
    ```

### Run Development Server

1. Run vite
    ```sh
    yarn dev
    ```

2. Run laravel server
    ```sh
    php artisan serve
    ```
   
### Contributing Guide

Please follow to our code style by using php-cs-fixer.
**PLEASE** type: `vendor/bin/php-cs-fixer fix` before commit.
