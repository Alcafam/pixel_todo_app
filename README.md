# Pixel Todo App
# short demo

https://github.com/user-attachments/assets/085fe45c-736b-4c45-a6c4-37fec2c2d4b4


## Short Intro

Just to challenge myself, I integrated AJAX to handle requests in this project. 

## Initial Actions

To get started with the project, follow these steps:

1. Install PHP dependencies:
   ```bash
   composer install
   ```

2. Copy the example environment file and generate a new .env file:
    ```bash
    cp .env.example .env
    ```

3. Generate a new application key:
    ```bash
    php artisan key:generate
    ```

4. Install JavaScript dependencies:
    ```bash
    npm install
    ```
    
5. Compile the assets for development:
    ```bash
    npm run dev
    ```
    
6. Run database migrations:
    ```bash
    php artisan migrate
    ```
    
7. Serve the application:
    ```bash
    php artisan serve
    ```

## Optional
You can also clear various caches for better performance or troubleshooting:
    ```bash
    php artisan optimize:clear
    ```

## .env Content
Make sure to configure your .env file with the following database settings:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pixel_todo_app
DB_USERNAME=root
DB_PASSWORD=
````
