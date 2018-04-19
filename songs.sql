CREATE SCHEMA IF NOT EXISTS Songs;
USE Songs;
DROP TABLE IF EXISTS Artist ;
CREATE TABLE IF NOT EXISTS Artist (
	 ArtistID INT NOT NULL AUTO_INCREMENT,
	 ArtistName VARCHAR(255) NOT NULL,
	 UNIQUE (ArtistName),
	 PRIMARY KEY (ArtistID)
);
DROP TABLE IF EXISTS Album ;
CREATE TABLE IF NOT EXISTS Album (
	 AlbumID INT NOT NULL AUTO_INCREMENT,
	 ArtistID INT NOT NULL,
	 AlbumTitle VARCHAR(255) NOT NULL,
	 UNIQUE (AlbumTitle),
	 PRIMARY KEY (AlbumID),
	 FOREIGN KEY (ArtistID) REFERENCES artist(ArtistID)
);
DROP TABLE IF EXISTS Song ;
CREATE TABLE IF NOT EXISTS Song (
	 SongID INT NOT NULL AUTO_INCREMENT,
	 ArtistID INT  NOT NULL,
	 SongTitle VARCHAR(50) NOT NULL,
	 SongLength TIME NOT NULL,
	 SongYear YEAR NOT NULL,
	 PRIMARY KEY (SongID),
	 FOREIGN KEY(ArtistID) REFERENCES artist(ArtistID)
);
DROP TABLE IF EXISTS Customer ;
CREATE TABLE IF NOT EXISTS Customer (
	 CustomerID INT NOT NULL AUTO_INCREMENT,
	 FirstName VARCHAR(20),
	 LastName VARCHAR(20),
	 Email VARCHAR(255),
	 StreetAddress VARCHAR(50),
	 City VARCHAR(10),
	 State VARCHAR(2),
	 Zipcode INT(5),
	 Wallet DECIMAL(13,2),
	 Password VARCHAR(25) NOT NULL,
	 UNIQUE (Email),
	 PRIMARY KEY (CustomerID)
);
DROP TABLE IF EXISTS Playlist ;
CREATE TABLE IF NOT EXISTS Playlist (
  playlistID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  CustomerID int NOT NULL,
  playlistName varchar(50) NOT NULL,
  FOREIGN KEY(CustomerID) REFERENCES Customer(CustomerID)
);

DROP TABLE IF EXISTS Playlist_Songs;
CREATE TABLE IF NOT EXISTS Playlist_Songs (
  PlaylistID int NOT NULL,
  SongID int NOT NULL,
  PRIMARY KEY (PlaylistID, SongID),
  FOREIGN KEY (PlaylistID) REFERENCES playlist(PlaylistID),
  FOREIGN KEY (SongID) REFERENCES song(SongID)
);
