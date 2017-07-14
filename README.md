# _Hair Salon_

#### _PHP Database Basics Independent Project for Epicodus, 7.14.2017_

#### By _**Calla Rudolph (<mailto:callarudolph@gmail.com>)**_

## Description

_This PHP database project allows a salon owner to manage individual stylists from a list. Each stylist can be edited or deleted. Every stylist can maintain a list of active clients. Each client can also be edited or deleted. This database makes use of a foreign key between a stylist and clients, as there is a one-to-many relationship present._

## Setup Requirements

This project requires proper computer installation of [MAMP](https://www.mamp.info/en/), [Composer](https://getcomposer.org/), and [PHP](https://secure.php.net/).

* Open GitHub site on your browser: https://github.com/CallaRudolph/php-hair-salon
* Select the dropdown (green box) "Clone or download"
* Copy the link for the GitHub repository
* Open Terminal on your computer
* In Terminal, perform the following steps:
  * type 'cd desktop' and press enter
  * type 'git clone', copy the repository link and press enter
  * type 'cd php-hair-salon' to access the path on your computer
  * type 'composer install' in terminal to download dependencies (Silex, Twig, PHPUnit)
* In browser, type 'localhost:8888/phpmyadmin' to access Apache and databases
  * Click 'import' tab and choose file 'hair_salon.sql' to import database to your computer
* In MAMP, perform the following steps:
    * Open preferences>ports and verify that Apache Port is 8888
    * Go to preferences>web server and click the file folder next to document root
  * Select the php-hair-salon directory
  * Select the web folder inside the directory
  * Click OK at the bottom of preferences and then click 'Start Servers'
* In your browser, enter 'localhost:8888' to access the web app
* Type a Stylist name in the input field to get started!

## Specifications
1. The program maintains a list of stylists that the user enters when clicking the 'Make a new hire' button.
```
  * Example Input: 'Becky', 'Diana'
  * Example Output:
    * Becky
    * Diana
```
2. The user can click on a stylist and enter a new client with a phone number, which is then added to a client list under that stylist.
```
  * Example Input: 'Marissa' '503.333.3333'
  * Example Output:
          Becky's Clients:
          * Marissa
            * Phone#: 503.333.3333
```
3. The user can click 'edit this stylist' and rename the stylist, which will then route the user back to the stylist's page with the stylist's new name.
```
  * Example Input: 'Becky' renamed to 'Felicia'
  * Example Output on stylist's page:
    * Felicia's Clients:
```

4. The user can click 'edit this stylist' and remove the stylist, which will then route the user back to the home page with a list of the updated stylists.
```
  * Example Input: click 'Fire this stylist' on the edit page for Becky
  * Example Output on home page:
    * Diana
```

5. The user can click on the name of an individual client and be directed to an edit page for the client. The user can now edit the client with a new name and/or phone number and be routed back to the home page to choose a stylist to view.
```
  * Example Input: click 'Marissa' from the client list on stylist Becky's page and change Marissa to 'Maggie'.
  * Example Output on home page:
    * Becky (if user clicks Becky, 'Marissa' now appears as 'Maggie')
```

6. The user can click on the name of an individual client and be directed to an edit page for the client. The user can now remove the client and be routed back to the home page to choose a stylist to view.
```
  * Example Input: click 'Marissa' from the client list on stylist Becky's page and then click 'Forever remove this nasty client'.
  * Example Output on home page:
    * Becky (if user clicks Becky, 'Marissa' is no longer listed)
```

7. The user can click on a button from the stylist page to remove all clients from that stylist and be directed back to the home page.
```
  * Example Input: Under the list of clients 'Micah' and 'Abigail', click 'Remove all clients for Becky' on stylist Becky's page.
  * Example Output on home page:
    * Becky (if user clicks Becky, there are no clients to view)
```

8. The user can click on a button from the home page to remove all stylists from the hair salon.
```
  * Example Input: Under the list of stylists 'Becky' and 'Michelle', click 'Fire everybody' on the home page.
  * Example Output on home page:
    * 'You don't have any stylists yet!'
```

## MySQL Commands
The following MySQL commands were entered when creating the database and during testing:

* CREATE DATABASE hair_salon;
* USE hair_salon;
* CREATE TABLE stylists (id serial PRIMARY KEY, name VARCHAR (255));
* CREATE TABLE clients (id serial PRIMARY KEY, client_name VARCHAR (255), phone_number VARCHAR (255));

* copy hair_salon to hair_salon_test in phpMyAdmin
* after creating Stylist and Client classes with private properties and methods, and passing all corresponding tests, a one-to-many relationship can be built between a Stylist and Clients:
    * ALTER TABLE clients ADD stylist_id int;   
    * DROP DATABASE hair_salon_test;
    * reload phpMyAdmin and copy hair_salon to hair_salon_test

## Technologies Used

PHP, HTML, Bootstrap CSS, Silex, Twig, Composer, MAMP, PHPUnit, MySQL, phpMyAdmin

### License

Copyright &copy; 2017 Calla Rudolph

_Please email me at the above address with any comments or improvements you have found!_

This software is licensed under the MIT license.
