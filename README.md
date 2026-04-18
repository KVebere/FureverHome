# FureverHome 🐾

## Overview

FureverHome is designed to simplify the animal adoption process by providing a structured platform for both adopters and shelter staff. Its main functionality is matching pets with potential owners based on both of their traits. It is still WIP and needs improvements.

## Tools and Technologies

| Category | Tool / Technology | Purpose |
|----------|------------------|--------|
| Backend Framework | Laravel 12 | Application logic and MVC architecture |
| Backend Language | PHP 8.2 | Server-side programming |
| Frontend Build Tool | Vite | Fast asset bundling and dev server |
| Frontend | JavaScript, Tailwind CSS | UI development and styling |
| Database | PostgreSQL | Relational data storage |
| Backend Package Manager | Composer | PHP dependency management |
| Frontend Package Manager | npm | JavaScript dependency management |
| IDE | PhpStorm | Development and debugging |
| Version Control | Git | Source code management |

## Requirements

Ensure the following are installed:

- Laravel Herd
- PHP 8.2+
- Composer
- Node.js & npm
- PostgreSQL
- Git

> **Note:** Laravel Herd provides a pre-configured environment.

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```
   ```bash
   cd <project-folder>
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install JavaScript dependencies:
   ```bash
   npm install
   ```

4. Laravel projects usually include a `.env.example` file. If `.env` is missing, create one:
   ```env
   copy .env.example .env
   ```

5. Generate the application key:
   ```bash
   php artisan key:generate
   ```

6. Configure your database settings in `.env`:
   ```bash
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

7. Run migrations:
   ```bash
   php artisan migrate
   ```

8. Start the frontend dev server:
   ```bash
   npm run dev
   ```

9. Open the project in your browser.
