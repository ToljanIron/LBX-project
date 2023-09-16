## Requirements
- Docker
- GIT CLI

## Installation and Setup

1. Unzip the project folder and navigate to it using the terminal.:

   ```shell
   cd LBX-project

2. Navigate to the api directory and copy the .env.example file to .env:
   ```shell
   
   cd api
   cp .env.example .env

3. Return to the project's root directory:
   ```shell
   
   cd ..

4. Start the Docker containers using docker-compose:
   ```shell
   
   docker-compose up -d

5. Check if the lbx-composer container is running. If it's not, start it:
    ```shell
    docker start lbx-composer
    cd api
    php artisan key:generate
    docker exec -it lbx-php php artisan migrate
    docker exec -it lbx-php php artisan queue:work

## Data Import
1. Copy the data file for import (e.g., import.csv) into the lbx-nginx container:
   ```shell
   
   docker cp <file path>/import.csv <container-id>:/usr/share/nginx/html/

2. Then, enter the lbx-nginx container:
   ```shell
   
   docker exec -it lbx-nginx bash

3. Perform data import using cURL:
   ```shell
   
   curl -X POST -H 'Content-Type: multipart/form-data' -F 'file=@/usr/share/nginx/html/import.csv' http://localhost/api/employee

## How to Use `curl` to Send HTTP Requests

### To send HTTP requests to your Laravel application via the command line, you can use the `curl` utility. Here's how to do it:

## Data Import
1. GET Request with Pagination:
   To send a GET request to the `/employee` route with pagination, specify the page number using the `page` query parameter. For example, to retrieve the second page of employees (assuming 10 employees per page), use the following command:
   ```shell
   
   curl -X GET 'http://localhost/api/employee?page=2'
- This will retrieve the list of employees on the specified page.

2. GET Request for a Specific Employee:
   To send a GET request to the /employee/{id} route to retrieve details of a specific employee, replace {id} with the actual "Employee ID" in the following command:
   ```shell
   
   curl -X GET 'http://localhost/api/employee/1'
- This will fetch the details of the employee with the given ID.

3. DELETE Request to Delete an Employee:
   To send a DELETE request to the /employee/{id} route to delete a specific employee, replace {id} with the actual employee "Employee ID" in the following command:

   ```shell
   
   curl -X DELETE 'http://localhost/api/employee/1'
- This will delete the employee with the specified ID. 
   
