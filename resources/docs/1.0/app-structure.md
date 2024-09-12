# App Structure
The Photo Gallery Application follows the standard Laravel framework structure. Below is an overview of the important directories and files within the application.

- Sidenotes


## Root Directory
- **app/**: Contains the core logic of your application.
- **Models/**: Defines the application's data structure and relationships. Key models include:
    - `User.php`: Handles user data and authentication.
    - `Gallery.php`: Manages galleries created by users.
    - `Photo.php`: Represents individual photos uploaded by users.
    - `Like.php`: Tracks user likes on photos or galleries.
    - `Share.php`: Manages shared galleries or photos.
    
- **Http/Controllers/**: Handles incoming requests and returns responses.
    - `GalleryController.php`: Manages gallery-related requests (CRUD operations).
    - `PhotoController.php`: Handles photo uploads, edits, and deletions.
    - `AuthController.php`: Manages user authentication (login, registration).

- **config/**: Contains configuration files for the application (database, mail, services, etc.).

- **database/**:
    - **migrations/**: Stores migration files for creating, updating, and managing the database schema.
    - **seeders/**: Contains classes to populate the database with sample data.
    - **factories/**: Generates mock data for testing purposes.

- **routes/**:
- `web.php`: Defines routes that are available to users through the browser.
- `api.php`: Manages API endpoints used in the application.

- **resources/**:
    - **views/**: Blade templates that render the HTML for the app, using Tailwind CSS for styling.
    - **js/**: Custom JavaScript for client-side interactions (if any).
    - **css/**: Custom styles, though the app primarily uses Tailwind CSS.
- **public/**:
    - **storage/**: Contains uploaded photos and other publicly accessible files.
    
## Key Files
- `.env`: Contains environment-specific settings such as database credentials, mail settings, and API keys.
- `composer.json`: Lists the dependencies required by Laravel.
- `package.json`: Lists frontend dependencies (for using npm, if applicable).
- `artisan`: Laravel's command-line interface for running tasks like migrations and creating models.

## Frontend Structure
- **Tailwind CSS**: The app uses Tailwind CSS for the design of the UI. The Blade templates leverage utility-first classes provided by Tailwind for responsiveness and ease of customization.
    - Styles are generally embedded directly within Blade templates using Tailwind classes for layout, typography, and component styling.

This app structure is designed to ensure maintainability, scalability, and ease of development.

