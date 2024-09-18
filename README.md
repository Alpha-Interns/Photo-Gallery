# Getting Started

Welcome to the **Photo Gallery App** documentation. This guide will walk you through the steps needed to set up and run the application on your local machine.

- Sidenotes

## Prerequisites

Before you begin, ensure you have the following installed:

- **PHP** (>= 8.0)
- **laravel** (^11)
- **Composer**
- **Node.js** (with npm or yarn)
- **MySQL or SQLite** (for the database)
- **Git** (optional for version control)

## 1. Clone the Repository

If you haven't already, clone the project from the repository:

```bash
git clone https://github.com/yourusername/photo-gallery.git
```
Navigate into the project repository:
```bash
cd photo-gallery 
```

## 2. Install Dependencies
You will need to install both PHP and Node.js dependencies.

### PHP Dependencies
Use Composer to install the necessary PHP packages:
```bash
composer install
```
### Node.js Dependencies
Install the required frontend dependencies using npm or yarn:

```bash
# Using npm
npm install

# Or using yarn
yarn install
```
## 3. Configure the Environment
Duplicate the `.env.example` file to create your `.env file`:

```bash
cp .env.example .env
```
### Environment Variables
Update the following fields in your `.env` file:

- **APP_NAME**: `Photo Gallery`
- **DB_CONNECTION**: Set this to `mysql` or `sqlite` depending on your setup.
- **DB_DATABASE**: The name of the database you'll use.
- **DB_USERNAME**: Your database username.
- **DB_PASSWORD**: Your database password.

Example `.env` settings:
```env
APP_NAME=Photo Gallery
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=photo_gallery_db
DB_USERNAME=root
DB_PASSWORD=secret
```
### Generate Application Key
Run the following command to generate an application key:

```bash
php artisan key:generate
```
## 4. Set Up the Database
If you're using MySQL, create a database for the application:

```sql
CREATE DATABASE photo_gallery_db;
```
Run the database migrations to set up the tables:

```bash
php artisan migrate
```
(Optional) Seed the database with dummy data:

```bash
php artisan db:seed
```
## 5. Compile Assets (TailwindCSS)
Since the project is using TailwindCSS for the UI, compile the frontend assets using the following command:

```bash
# Using npm
npm run dev

# Or using yarn
yarn dev
``` 
For production:

```bash
npm run prod

# Or

yarn prod
```
This will compile your CSS and JavaScript files for the app.

## 6. Run the Application
Now, you can start the Laravel development server:

```bash
php artisan serve
```
Your application should now be running at `http://127.0.0.1:8000`.

## 7. TailwindCSS Customization
If you wish to modify the TailwindCSS styles, edit the `tailwind.config.js` file located in the project root directory. Here, you can:

- Add custom color schemes.
- Extend utility classes.
- Modify default behavior.

After making changes, recompile the assets:
```bash
npm run dev
```
## 8. Testing the Application
To ensure everything is working as expected, you can run the Laravel test suite:

```bash
php artisan test
```
This will execute the unit and feature tests included in the application.
