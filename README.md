# Dog API Project

This project is a technical test for a job, designed to demonstrate understanding of Laravel, RESTful APIs, and handling polymorphic relationships. The project involves fetching data from an external API (dog.ceo), saving this data into a Laravel database, and managing relationships between users, breeds, and parks.

## Table of Contents

-   [Requirements](#requirements)
-   [Installation](#installation)
-   [Configuration](#configuration)
-   [Usage](#usage)
-   [API Endpoints](#api-endpoints)
-   [Models](#models)
-   [Controllers](#controllers)
-   [Migrations](#migrations)
-   [Troubles and Solutions](#troubles-and-solutions)

## Requirements

-   PHP 8.x
-   Laravel 11
-   MySQL

## Installation

1. Clone the repository:

    ```bash
    git clone <repository-url>
    cd <repository-directory>

    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Create a copy of the .env file:

    ```bash
    cp .env.example .env
    ```

4. Generate an application key:

## Configuration

1. Update the .env file with your database configuration:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

2. Run the database migrations:
    ```bash
    php artisan migrate
    ```

## Usage

Start the development server:
`bash
    php artisan serve
    `

# API Endpoints

## Breeds

    •	GET /api/breed - Fetch all breeds from the dog.ceo API and save them to the database.
    •	GET /api/breed/{breed} - Fetch images of a specific breed from the dog.ceo API.
    •	GET /api/breed/random - Fetch a random breed from the dog.ceo API.
    •	GET /api/breed/{breed}/image - Fetch a random image of a specific breed from the dog.ceo API.

## Associations

    •	POST /api/user/{userId}/associate-park - Associate a park with a user.
    •	POST /api/user/{userId}/associate-breed - Associate a breed with a user.
    •	POST /api/park/{parkId}/associate-breed - Associate a breed with a park.

# Models

## User

    •	Attributes: name, email, location
    •	Relationships:
    •	breeds (morphedByMany)
    •	parks (morphedByMany)

## Park

    •	Attributes: name
    •	Relationships:
    •	breeds (morphToMany)
    •	users (morphToMany)

## Breed

    •	Attributes: name
    •	Relationships:
    •	users (morphedByMany)
    •	parks (morphedByMany)

# Controllers

## BreedController

Handles fetching breed data from the dog.ceo API and saving it to the database.

## UserController

Handles associating breeds and parks with users.

## ParkController

Handles associating breeds with parks.

# Migrations

    •	create_users_table
    •	create_breeds_table
    •	create_parks_table
    •	create_parkables_table
    •	create_breedables_table

# Troubles

Initially, there was confusion regarding the creation of polymorphic tables and their relationships. The exercise required creating three polymorphic tables: userable, parkable, and breedable. However, an update specified only parkable and breedable were needed. This led to a series of adjustments to ensure correct implementation.

There was confusion regarding the API endpoint for fetching a random breed. The endpoint GET /api/breed/random exists and was included in the routes, although it was initially misunderstood. The URL https://dog.ceo/api/breed/random specified in the brief does not exist. However, the brief specifically requested using it, so it was implemented with a note.

The brief mentions that some parks only allow certain breeds, but no data for parks was provided. Therefore, this functionality could not be fully implemented or demonstrated.
