# Library Management System

## Description

A Library Management System built using Hack language. This application allows you to manage library operations, including books, users, and loans.

## Features

- Manage books and users
- Track book loans
- Secure authentication and authorization
- Dashboard for administrative tasks

## Requirements

- [XAMPP](https://www.apachefriends.org/index.html) or a similar local development environment
- PHP 
- Composer (for dependency management)

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/luis199521/Library-Managment.git
cd Library-Managment
```
### 2. Install Dependencies
Run the following command to install the necessary PHP dependencies using Composer:

```bash
composer install
```

### 3. Set Up VirtualHost
To run this application, you need to set up a VirtualHost in your local development environment. Here's how you can configure it with XAMPP:

On Windows with XAMPP
Open Apache Configuration

Open the Apache configuration file httpd-vhosts.conf. You can find this file in your XAMPP installation directory under apache\conf\extra\httpd-vhosts.conf.

Add VirtualHost Configuration

Add the following configuration to the httpd-vhosts.conf file:

```apache
Copiar código
<VirtualHost *:80>
    ServerAdmin webmaster@biblioteca.test
    DocumentRoot "C:/xampp/htdocs/Library-Managment/public"
    ServerName biblioteca.test
    ServerAlias www.biblioteca.test

    ErrorLog "logs/biblioteca.test-error.log"
    CustomLog "logs/biblioteca.test-access.log" common

    <Directory "C:/xampp/htdocs/Library-Managment/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
Replace "C:/xampp/htdocs/Library-Managment/public" with the path to your Library-Managment directory.
Ensure that the path to the public directory is correct.
Update Hosts File

Open the hosts file located at C:\Windows\System32\drivers\etc\hosts with a text editor (run as Administrator). Add the following line to map the domain to your local server:

```apache
127.0.0.1 biblioteca.test
Restart Apache
```
Restart Apache through the XAMPP Control Panel to apply the changes.

## Access the Application

Open your web browser and navigate to http://biblioteca.test. You should see the application running.

## Usage
Access the Login Page

Go to http://biblioteca.test to access the login page.

Create and Manage Library Data

Use the dashboard and other interfaces to manage books, users, and loans.

## Contributing
Contributions are welcome! Please follow the standard fork-and-pull request workflow. Make sure to follow the coding guidelines and write tests for new features.

## License
This project is licensed under the MIT License - see the LICENSE file for details.
