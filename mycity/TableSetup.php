<html><head><title>Setting up database</title></head><body>



<h3>Setting up...</h3>



<?php

include_once 'function.php';


createTable('administrator',
            'AdminID VARCHAR(128) PRIMARY KEY,
             AdminPassword VARCHAR(128),
	     AdminName VARCHAR(128),
	     AdminEmailID VARCHAR(128),
	     AdminPhone VARCHAR(128),
	     ProfileImage VARCHAR(128),
             DateTime DATETIME');

createTable('gcm_registrationid',
            'AppId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	     RegistrationID text');

createTable('category',
	    'CategoryID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
             CategoryName VARCHAR(128),
	     CategoryIconPath VARCHAR(128),
	     md5Hash VARCHAR(128),
	     OrderNo INT');

createTable('subcategory',
	    'SubCategoryID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
             SubCategoryName VARCHAR(128),
	     SubCategoryIconPath VARCHAR(128),
	     md5Hash VARCHAR(128),
	     OrderNo INT,
	     CategoryID INT,
	     Amount INT,
	     FOREIGN KEY (CategoryID) REFERENCES category(CategoryID)');

createTable('store',
            'StoreID VARCHAR(128) PRIMARY KEY,
             Password VARCHAR(128),             
             StoreName  VARCHAR(128),
             PhoneNumber1 VARCHAR(128),
	     PhoneNumber2 VARCHAR(128),
	     EmailID  VARCHAR(128),
	     StoreImage  VARCHAR(128),
	     Category INT,
	     SubCategory INT,
	     EstablishedDate DATE,
	     OwnerName  VARCHAR(128),
	     AboutStore Text,
             OpenTime TIME,
             CloseTime TIME,
             WeekOff VARCHAR(128),
             AddressName  Text,
             PlaceName  Text,
             CityName  VARCHAR(128),
             StateName  VARCHAR(128),
             CountryName  VARCHAR(128),
             ZIP  VARCHAR(128),
	     Latitude  VARCHAR(128),
             Longitude  VARCHAR(128),
             StoreValidity  VARCHAR(128),
             BussinessMode INT,
             RegisteredBy  VARCHAR(128),
	     RegisterDateTime DATE,
	     FOREIGN KEY (Category) REFERENCES category(CategoryID),
             FOREIGN KEY (SubCategory) REFERENCES subcategory(SubCategoryID)');



createTable('cityname',
            'cityName VARCHAR(128) PRIMARY KEY,
             cityPinCode VARCHAR(128)');

createTable('storeimage',
            'storeImageID VARCHAR(128) PRIMARY KEY,
	     StoreID VARCHAR(128),
             StoreImage VARCHAR(128),
	     FOREIGN KEY (StoreID) REFERENCES store(StoreID)');


createTable('storeregistration',
            'storeregistrationID VARCHAR(128) PRIMARY KEY,
	     StoreID VARCHAR(128),
             AdminID VARCHAR(128),
	     RegisterDateTime DATETIME,
	     FOREIGN KEY (StoreID) REFERENCES store(StoreID),
	     FOREIGN KEY (AdminID) REFERENCES administrator(AdminID)');


createTable('otps',
            'id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	     otp VARCHAR(128),
             businessID VARCHAR(128) NOT NULL
             ');


createTable('businessdeveloper',
            'EmployeID VARCHAR(128) PRIMARY KEY,
             Password VARCHAR(128),
	     Name VARCHAR(128),
	     EmailID VARCHAR(128),
	     PhoneNo VARCHAR(128),
	     ProfileImage VARCHAR(128),
	     CityName VARCHAR(128),
	     Status INT,
             DateTime DATETIME,
	     FOREIGN KEY (CityName) REFERENCES cityname(cityName)');



?>









<br />...done.

</body></html>

