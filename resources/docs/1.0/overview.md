
# Database Schema Overview

Welcome to the documentation for the Photo Gallery Application. This application is designed to allow photographers to upload, manage, and share their photos within organized galleries. Users can view, like, and share these photos and galleries with others.
This document provides an overview of the database schema for the Photo Gallery Application. The schema is designed to manage users, galleries, photos, likes, and sharing functionality.

## Database Schema

The database schema is designed to handle the core functionalities of the photo gallery, including user management, photo uploads, gallery creation, and user interactions such as likes and sharing. The schema consists of the following tables:

- **User:** Stores user information such as name, email, and password.
- **Gallery:** Stores information about photo galleries created by users.
- **Photo:** Stores details about individual photos uploaded by users within galleries.
- **Like:** Tracks the likes on photos by users.
- **Share:** Logs sharing activities, including what was shared, when, and where it was shared.



## Tables and Relationships
### 1. User Table

- **id**: The primary key for the User table.
- **name**: The user's name.
- **email**: The user's email address (unique).
- **password**: The hashed password for the user.

### 2. Gallery Table

- **id**: The primary key for the Gallery table.
- **name**: The name of the gallery.
- **gallery_description**: A text description of the gallery.
- **gallery_comments**: Comments associated with the gallery.
- **user_id**: A foreign key referencing the `User.id` (indicates the owner of the gallery).
- **thumbnail**: Stores the path or URL of the gallery's thumbnail image.

#### Relationship:
Each gallery is associated with one user (`many-to-one` relationship between Gallery and User).

### 3. Photo Table

- **id**: The primary key for the Photo table.
- **photo_description**: A text description of the photo.
- **photo_comments**: Comments associated with the photo.
- **upload_date**: The date and time when the photo was uploaded.
- **gallery_id**: A foreign key referencing the `Gallery.id` (indicates the gallery the photo belongs to).
- **thumbnail**: Stores the path or URL of the photo's thumbnail image.

#### Relationship:
Each photo is associated with one gallery (`many-to-one` relationship between Photo and Gallery).

### 4. Like Table

- **id**: The primary key for the Like table.
- **user_id**: A foreign key referencing the `User.id` (indicates the user who liked the photo).
- **photo_id**: A foreign key referencing the `Photo.id` (indicates the photo that was liked).
- **liked_at**: The date and time when the like was recorded.

#### Relationship:
Each like is associated with one user and one photo (`many-to-one` relationships between Like and User, and between Like and Photo).

### 5. Share Table

- **id**: The primary key for the Share table.
- **user_id**: A foreign key referencing the `User.id` (indicates the user who shared the item).
- **photo_id**: A foreign key referencing the `Photo.id` (nullable, indicates the photo shared if applicable).
- **gallery_id**: A foreign key referencing the `Gallery.id` (nullable, indicates the gallery shared if applicable).
- **shared_at**: The date and time when the share was recorded.
- **shared_to**: The platform or email address where the item was shared.

#### Relationship:
Each share is associated with one user and can be related to either a photo or a gallery (`many-to-one` relationships between Share and User, Photo, and Gallery).

## Summary

The database schema is designed to efficiently manage the core functionalities of the Photo Gallery Application, ensuring that all user actions, such as uploading photos, organizing them into galleries, liking, and sharing, are properly recorded and managed. Each table is structured to optimize data retrieval and maintain data integrity through well-defined relationships.


