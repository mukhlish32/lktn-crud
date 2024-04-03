<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Introduction

This Laravel website features basic CRUD functionality for managing user data. This guide offers step-by-step instructions on how to set up and run the website on your local device.

## Requirements

Before proceeding, make sure you have the following installed:

- PHP (version >= 8.1)
- Laravel (version 10.48.4)
- PostgreSQL (version 16)

## Installing

1. Clone the repository:

   ```bash
   git clone https://github.com/mukhlish32/lktn-crud.git
   ```

2. Change into the project directory:

   ```bash
   cd lktn-crud
   ```

3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`. Update the database configuration according to your setup.

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Run the database migrations. Make sure the database has already been created before migrating.

   ```bash
   php artisan migrate
   ```

7. Seed the database with dummy data:

   ```bash
   php artisan db:seed
   ```

## Running the Application

To start the development server, run the following command:

```bash
php artisan serve
```

You can now access the website at http://localhost:8000 in your web browser.

![image](https://github.com/mukhlish32/lktn-crud/assets/85531251/3024f399-6c8f-47cc-bd17-5091d229197f)

# Author
- Muhammad Mukhlish Syarif



<p align="center"><b> ~ THANK YOU ~ </b></p>
