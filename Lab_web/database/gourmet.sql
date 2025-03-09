drop database if exists GOURMET;
create database GOURMET;
USE GOURMET;

CREATE TABLE Reviewer(
	ID CHAR(5) UNIQUE,
    Username VARCHAR(255) PRIMARY KEY,
    Email VARCHAR(255) UNIQUE,
    Biography LONGTEXT,
    Location TEXT ,
    Num_post INT CHECK (Num_post >= 0),
    TITLE ENUM('Amateur','Immediate','Advanced','Expert')  DEFAULT 'Amateur'
);

CREATE TABLE Restaurent(
	ID CHAR(5) UNIQUE,
    Res_name VARCHAR(255),
    Res_type ENUM('Fine Dining', 'Fast food', 'Bistro', 'Buffet', 'Bakery') NOT NULL DEFAULT 'Fine Dining',
    Location TEXT NOT NULL
);

CREATE TABLE Post (
	ID INT AUTO_INCREMENT PRIMARY KEY,
    Price FLOAT CHECK (Price > 0),
    Image VARCHAR(255),
    Postname VARCHAR(255) ,
    Post_datetime DATETIME ,
    Username VARCHAR(255) ,
    Description LONGTEXT ,
    Rating ENUM('1','2','3','4','5') DEFAULT '1',
    Restaurent_ID CHAR(5),
    Restaurent_type ENUM('Fine Dining', 'Fast food', 'Bistro', 'Buffet', 'Bakery')  DEFAULT 'Fine Dining'
);

ALTER TABLE Post 
ADD CONSTRAINT fk_Post_Username 
FOREIGN KEY (Username) 
REFERENCES Reviewer(Username) 
ON DELETE CASCADE 
ON UPDATE CASCADE;

ALTER TABLE Post 
ADD CONSTRAINT fk_Post_Restaurent_ID
FOREIGN KEY (Restaurent_ID) 
REFERENCES Restaurent(ID) 
ON DELETE CASCADE 
ON UPDATE CASCADE;
