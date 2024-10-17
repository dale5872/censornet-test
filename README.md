# Description

The goal of this task was to create a simple PHP Application, using the Laravel framework, which stores records of Vegetables.

# Running the Application

The application was intiialised using Laravel Sail, so can easily be ran using Docker.

First, run the following docker command to install all dependencies:
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

and then run
```
./vendor/bin/sail up
```

This will boot up the Laravel application on port 80, along with a MySQL instance on port 3306.

Taken from https://laravel.com/docs/11.x/sail

# Implementation

This application uses a RDBMS database (MySQL) which stores the records of all the Vegetables, and allows a user to index, read,
create, update and delete Vegetable records, via RESTful APIs. Each endpoint returns well-formed JSON. The endpoints are defined as:

GET /api/vegetables - Fetches  all Vegetables\
GET /api/vegetables/{id} - Fetches a single Vegetable \
POST /api/vegetables - Creates a new Vegetable entry \
&emsp; Body: \
&emsp; { \
&emsp;&emsp; 'name': string \
&emsp;&emsp; 'description': string \
&emsp;&emsp; 'classification': string \
&emsp;&emsp; 'name': boolean \
&emsp; }
\
PATCH /api/vegetables/{id} - Updates an existing Vegetable entry \
&emsp; Body: \
&emsp; { \
&emsp;&emsp; 'name': string \
&emsp;&emsp; 'description': string \
&emsp;&emsp; 'classification': string \
&emsp;&emsp; 'name': boolean \
&emsp; }
\
DELETE /api/vegetables/{id} - Deletes a Vegetable entry



# Future Steps

Some considerations for future steps could be:

- Create a relationship model called 'Classification' so that different Vegetables can be linked
to a defined classification
- The application could be expanded to other food types
- The application could be further expanded to link different ingredients together to form a meal plan.
