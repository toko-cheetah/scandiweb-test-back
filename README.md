# Scandiweb Test Back

## Introduction:

This is a PHP and MySQL-based backend application that serves as the server-side component of the product management system. The backend provides RESTful API endpoints for handling GET, POST, and DELETE requests. It is used in conjunction with a Vue.js frontend application.

API Base URL: https://scandiweb-test-back.000webhostapp.com/

## Endpoints:

- GET Request Endpoint: /
- POST Request Endpoint: /product-create.php
- DELETE Request Endpoint: /product-delete.php?ids=

## Database:

The backend application uses MySQL as its database management system. It has a 'products' table that contains the details of all the products. The database configurations can be found in the 'config' and 'database' folders.

## Dependencies:

The backend application uses the following dependencies:

- PHP: v7.4.23 or higher
- MySQL: v5.7 or higher
