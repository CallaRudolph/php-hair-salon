MySQL commands backup

CREATE DATABASE hair_salon;
USE hair_salon;
CREATE TABLE stylists (id serial PRIMARY KEY, name VARCHAR (255));
CREATE TABLE clients (id serial PRIMARY KEY, client_name VARCHAR (255), phone_number VARCHAR (255));

copy hair_salon to hair_salon_test in apache
after creating Stylist and Client classes with private properties and methods, and passing all corresponding tests, a one-to-many relationship can be built between a Stylist and Clients.

ALTER TABLE clients ADD stylist_id int;
DROP DATABASE hair_salon_test;

reload apache and copy hair_salon to hair_salon_test
