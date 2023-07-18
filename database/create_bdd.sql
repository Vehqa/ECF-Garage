CREATE DATABASE IF NOT EXISTS GarageParrot;

USE GarageParrot;

CREATE TABLE IF NOT EXISTS role
(
    id_role INT  AUTO_INCREMENT PRIMARY KEY,
    name_role VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS users
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email_users VARCHAR(50),
    password_users VARCHAR(255),
    id_role INT DEFAULT 2, -- 2 par défaut est égal a employé 
    FOREIGN KEY(id_role) REFERENCES role(id_role)
);

CREATE TABLE IF NOT EXISTS service
(
    id_service INT AUTO_INCREMENT PRIMARY KEY,
    title_service VARCHAR(255),
    description_service TEXT,
    price_service FLOAT,
    image_service VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS ad
(
    id_car INT AUTO_INCREMENT PRIMARY KEY,
    title_car VARCHAR(255),
    price_car FLOAT,
    model_car VARCHAR(255),
    km_car INT,
    year_car INT,
    image_car VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS review
(
    id_review INT AUTO_INCREMENT PRIMARY KEY,
    name_review VARCHAR(100),
    surname_review VARCHAR(100),
    grade_review INT,
    comment_review TEXT,
    accept_review INT
);

CREATE TABLE IF NOT EXISTS garage 
(
    id_garage INT AUTO_INCREMENT PRIMARY KEY,
    name_garage VARCHAR(255),
    adress_garage VARCHAR(255),
    phone_garage VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS hour
(
    id_hour INT  AUTO_INCREMENT PRIMARY KEY,
    monday_hour VARCHAR(255),
    saturday_hour VARCHAR(255),
    sunday_hour VARCHAR(255)
);