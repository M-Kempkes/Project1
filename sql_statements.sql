CREATE DATABASE project1;
CREATE TABLE account(
    id int NOT NULL AUTO_INCREMENT,
    email varchar(255)NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE(email)
); 
CREATE TABLE persoon(
    id int NOT NULL AUTO_INCREMENT,
    voornaam varchar(255),
    achternaam varchar(255),
    username varchar(255),
    accountid int,
    PRIMARY KEY (id),
    FOREIGN KEY (accountid) REFERENCES account(id),
    UNIQUE(username)
);

CREATE USER 'dbconnection'@'127.0.0.1' IDENTIFIED BY 'DbConnection!';
GRANT ALL PRIVILEGES ON *.* TO 'dbconnection'@'127.0.0.1';
