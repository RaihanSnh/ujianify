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

3. Generate encryption key (it used to hash user passwords)
    ```sh
    php artisan generate:key
    ```

4. Run database migrations to create all required tables.
    ```sh
    php artisan migrate
    ```
   
5. Build vite
    ```sh
    yarn build
    ```

6. Create admin user
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
