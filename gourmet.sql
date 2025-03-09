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
    Image LONGBLOB,
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

/*
	Select the name of restaurent from post,
*/

SELECT * 
FROM Post JOIN Restaurent 
ON Post.Restaurent_ID = Restaurent.ID
ORDER BY Post.Post_datetime DESC;

DELIMITER //

CREATE PROCEDURE GetTop10RecentPosts()
BEGIN
    SELECT 
        r.Username AS Reviewer_Name,
        p.Postname AS Post_Name,
        res.Res_name AS Restaurent_Name,
        res.Res_type AS Restaurent_Type,
        res.Location AS Restaurent_Location,
        p.Post_datetime AS Post_DateTime
    FROM Post p
    JOIN Reviewer r ON p.Username = r.Username
    JOIN Restaurent res ON p.Restaurent_ID = res.ID
    ORDER BY p.Post_datetime DESC
    LIMIT 10;
END //

CREATE PROCEDURE GetAllPostUser(Username VARCHAR(255))
BEGIN
	SELECT p.Postname AS Post_Name,
		   res.Res_name AS Restaurent_Name,
           res.Res_type AS Restaurent_Type,
           res.Location AS Restaurent_Location,
           p.Post_datetime AS Post_DateTime,
           p.Description AS Post_Decription
	FROM Post p
    JOIN Reviewer r ON p.Username = r.Username
    JOIN Restaurent res ON p.Restaurent_ID = res.ID
    ORDER BY p.Post_datetime DESC;
END //

DELIMITER ;

call GetTop10RecentPosts();
call GetAllPostUser('FoodieFan123');