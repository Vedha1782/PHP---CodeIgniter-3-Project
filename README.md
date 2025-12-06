PHP Assessment – CodeIgniter 3 Project

**Project Overview**

This is a PHP (CodeIgniter 3) based assessment project that implements:

User Registration

User Login (with password hashing)

Session Management

Employee CRUD (if included in your assessment)

Secure MVC structure

MySQL Database integration

The project is built following CodeIgniter 3 framework conventions to ensure clean, maintainable, and testable code.

**Tech Stack Used**

**Backend**

PHP 8.x

CodeIgniter 3

MySQL (MariaDB)

XAMPP (Apache + MySQL)

Frontend

HTML5

CSS3

Bootstrap 5

JavaScript

**Project Structure**

application/

system/

assets/

index.php

**Database Configuration**

Database name: php\_assessment

Tables included:

users

employee

cities

states

address

How to Import:

Open phpMyAdmin

Create a new database named:

php\_assessment

Click Import

Select the file:

php\_assessment.sql

Click Go

**Setup \& Installation Steps**

1\. Clone / Download the project

Place the folder inside your XAMPP htdocs:

C:\\xampp\\htdocs\\php\_assessment

2\. Configure the base URL

Inside:

application/config/config.php

Set:

$config\['base\_url'] = 'http://localhost/php\_assessment/';

3\. Configure the database

File:

application/config/database.php

Ensure:

'hostname' => 'localhost',

'username' => 'root',

'password' => '',

'database' => 'php\_assessment',

'dbdriver' => 'mysqli',

4\. Start Apache \& MySQL

Open XAMPP → Start both services.

**How to Run the Project**

Once everything is set:

Open browser → Visit:

http://localhost/php\_assessment/index.php/auth/login

Demo Login Credentials

Email: jui122@gmail.com

Password: 112233

**Additional Notes**

Must run on PHP 7.4 – 8.x

Avoid renaming folders, especially “application” and “system”

Sessions require the folder:

application/session/

(if not present, CI auto-creates it)

Logs folder should exist:

application/logs/

If using a different port (e.g., 8080), update base\_url accordingly.

