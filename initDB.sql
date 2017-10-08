CREATE TABLE Users (
    UserID int NOT NULL,
    Name varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    Gender varchar(255)
    Photo varchar(255)
    Birthday DATE, 
    RegistrationDate TIMESTAMP
    PRIMARY KEY (UserID)
);
CREATE TABLE Following (
	UserFollowing int NOT NULL, 
	UserFollowed int NOT NULL,
	FOREIGN KEY (UserFollowed) REFERENCES Users(UserID),
	FOREIGN KEY (UserFollowing) REFERENCES Users(UserID)
	PRIMARY	KEY (UserFollowing, UserFollowed);
);
CREATE TABLE Content (
    ContentID int NOT NULL,
    Name varchar(255) NOT NULL,
    Type varchar(255) NOT NULL,
    Author varchar(255),
    Photo varchar(255),
    Genre varchar(255), 
	ReleaseDate DATE, 
	Description varchar(255),
    RegistrationDate TIMESTAMP,
    PRIMARY KEY (ContentID)
);