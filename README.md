MySQL commands backup

CREATE DATABASE hair_salon;
USE hair_salon;
CREATE TABLE stylists (id serial PRIMARY KEY, name VARCHAR (255));
CREATE TABLE clients (id serial PRIMARY KEY, client_name VARCHAR (255), phone_number VARCHAR (255));

copy hair_salon to hair_salon_test in apache
