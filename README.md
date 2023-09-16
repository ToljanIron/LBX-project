### Welcome to the LBX repository - your new best friend in managing employee data. LBX is a powerful application for importing and managing data about your company's employees. Follow these instructions to start using LBX right now.

## Requirements
- Docker
- GIT CLI

## Installation and Setup

1. Clone the repository:

   ```shell
   git clone https://github.com/ToljanIron/LBX.git
   cd LBX
   
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
