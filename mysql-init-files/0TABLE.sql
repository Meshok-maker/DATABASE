CREATE DATABASE IF NOT EXISTS travel_agency_db;
USE travel_agency_db;

CREATE TABLE IF NOT EXISTS clients
(
    clients_id  BIGINT PRIMARY KEY AUTO_INCREMENT,
    surname     VARCHAR(255) NOT NULL,
    first_name  VARCHAR(255) NOT NULL,
    middle_name VARCHAR(255) NOT NULL,
    dob         DATE         NOT NULL,
    adress      VARCHAR(255) NOT NULL,
    telephone   VARCHAR(255) NOT NULL,
    visa        DATE
);

CREATE TABLE IF NOT EXISTS country
(
    country_id   BIGINT PRIMARY KEY AUTO_INCREMENT,
    country_name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS city
(
    city_id    BIGINT PRIMARY KEY AUTO_INCREMENT,
    country_id BIGINT       NOT NULL,
    city_name  VARCHAR(255) NOT NULL,
    FOREIGN KEY (country_id) REFERENCES country (id)
);

CREATE TABLE IF NOT EXISTS hotels
(
    hotels_id          BIGINT PRIMARY KEY AUTO_INCREMENT,
    host_city          BIGINT       NOT NULL,
    accommodation_type ENUM ('accommodation is not included','single','double','family'),
    hotel_name         VARCHAR(255) NOT NULL,
    raiting            INT          NOT NULL,
    FOREIGN KEY (host_city) REFERENCES city (id),
    price              BIGINT       NOT NULL
);

CREATE TABLE IF NOT EXISTS tours
(
    tour_id        BIGINT PRIMARY KEY AUTO_INCREMENT,
    type_tour      ENUM ('Auto tour','Cruise','Mountain','Exotic','Healing','Excursion','Business'),
    type_food      ENUM ('Breakfast only', 'Breakfast and lunch', 'All inclusive'),
    hotel          BIGINT NOT NULL,
    begin_date     DATE   NOT NULL,
    end_date       DATE   NOT NULL,
    is_needed_visa BOOLEAN DEFAULT (FALSE),
    price          BIGINT NOT NULL,
    FOREIGN KEY (hotel) REFERENCES hotels (id)
);

CREATE TABLE IF NOT EXISTS sales
(
    sales_id  BIGINT PRIMARY KEY AUTO_INCREMENT,
    client_id BIGINT NOT NULL,
    tour_id   BIGINT NOT NULL,
    FOREIGN KEY (client_id) REFERENCES clients (id),
    sale_date DATE   NOT NULL,
    FOREIGN KEY (tour_id) REFERENCES tours (id)
);

