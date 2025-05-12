# ProyectoFinalGestHorarios

## Description

ProyectoFinalGestHorarios is a web application developed with Laravel for managing academic schedules. It allows managing environments, teachers, laboratories, academic periods, and schedules, facilitating organization and planning in educational settings.

## Requirements

-   PHP >= 8.0
-   Composer
-   MySQL or compatible database
-   Node.js and npm (for asset and frontend management)

## Installation

1. Clone the repository:

    ```bash
    git clone <repository-url>
    cd ProyectoFinalGestHorarios
    ```

2. Install PHP dependencies with Composer:

    ```bash
    composer install
    ```

3. Copy the environment configuration file and set it up:

    ```bash
    cp .env.example .env
    ```

    Configure the environment variables, especially the database connection.

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Run the migrations to create the database tables:

    ```bash
    php artisan migrate
    ```

6. (Optional) Run the seeders to populate the database with initial data:

    ```bash
    php artisan db:seed
    ```

7. Install Node.js dependencies and compile assets:
    ```bash
    npm install
    npm run dev
    ```

## Usage

To start the development server, run:

```bash
php artisan serve
```

Then, access the application in the browser at:

```
http://localhost:8000
```

Login credentials:
Coordinator: mcadena@unimayor.edu.co
Password: 123456

Teacher credentials:
Email: andres@example.com
Password: 123456

## Project Structure

-   `app/` - Contains the main application logic (models, controllers, middleware).
-   `config/` - Configuration files.
-   `database/` - Migrations, seeders, and factories for the database.
-   `public/` - Publicly accessible files, including the entry point `index.php`.
-   `resources/` - Blade views, CSS, and JavaScript files.
-   `routes/` - Web and API route definitions.
-   `storage/` - Generated files, logs, and cache.
-   `tests/` - Unit and feature tests.

Relevant documentation for the project can be found in the documentacion folder.

## Technologies Used

-   Laravel Framework
-   PHP
-   MySQL
-   Bootstrap (for frontend styles and components)
-   DataTables (for dynamic tables)
-   jQuery

## Contributions

Contributions are welcome. Please open an issue or submit a pull request.

## License

This project is licensed under the CC BY-NC 4.0 License. See the LICENSE file for details.

## Contact

For more information, contact the main developer.
