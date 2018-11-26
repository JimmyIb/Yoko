connect scott/tiger

set echo on


set linesize 200;
set pagesize 50;

-- Drop all tables
DROP TABLE Yoko CASCADE CONSTRAINT;
DROP TABLE Product CASCADE CONSTRAINT;
DROP TABLE Client CASCADE CONSTRAINT;
DROP TABLE PointsTier CASCADE CONSTRAINT;

-- Create Yoko table
CREATE TABLE Yoko
	(branchID NUMBER(5),
	 productID NUMBER(5),
	 staff VARCHAR(250),
	 inventory VARCHAR2(250),
	 CONSTRAINT Yoko_branchID_pk PRIMARY KEY (branchID));

-- Create Product table
CREATE TABLE Product
	(productID NUMBER(5),
	 description VARCHAR(250),
	 productSize VARCHAR(10),
	 price NUMERIC(6,2),
	 points NUMBER(4),
	 CONSTRAINT Product_productID_pk PRIMARY KEY (productID)
	 );
 
 -- Create PointsTier table
CREATE TABLE PointsTier
	(pointsTierID NUMBER(5),
	 --description VARCHAR(250),
	 points NUMBER(4),
	 tierName VARCHAR(10),
	 CONSTRAINT PointsTier_pointsTierID_pk PRIMARY KEY (pointsTierID));
  
-- Create Client table
CREATE TABLE Client
	(clientID NUMBER(5),
	 productID NUMBER(5),
	 pointsTierID NUMBER(5),
	 points NUMBER(4),
	 name VARCHAR(20),
	 address VARCHAR(30),
	 ageGroup VARCHAR(5),
	 email VARCHAR(80),
	 phoneNumber VARCHAR(10),
	 occupation VARCHAR(15),
	 CONSTRAINT Client_clientID_pk PRIMARY KEY (clientID),
	 CONSTRAINT Client_productID_fk FOREIGN KEY (productID) REFERENCES Product (productID));
	 
-- Insert into Yoko
INSERT INTO Yoko VALUES(2, 4, 'Cashier', 'Cheesecake');
INSERT INTO Yoko VALUES(1, 6, 'Cashier', 'Cheesecake');
INSERT INTO Yoko VALUES(4, 5, 'Cashier', 'Cheesecake');
INSERT INTO Yoko VALUES(3, 7, 'Cashier', 'Cheesecake');

-- Insert into Product
INSERT INTO Product VALUES(3, 'Cheesecake', 'Medium', 3.4, 100);

-- Insert into PointsTier
INSERT INTO PointsTier VALUES(2, 200, 'Silver');

-- Insert into Client
INSERT INTO Client VALUES(5, 3, 2, 100, 'Emily Datits', '422 5th Avenue', 18-22, 'emilydatits@gmail.com', 412-414-414, 'Engineer');



  
  
  
  
  
