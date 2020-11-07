-- This code creates the tables
create table users(
    -- AUTO_INCREMENT means that it just automatically adds 1 to the last one
    userID integer unsigned AUTO_INCREMENT not null,
    username text not null,
    password text not null,
    privileged boolean not null,
    firstName text,
    lastName text,
    primary key(userID)
);

create table teams(
    teamID integer unsigned AUTO_INCREMENT not null,
    teamName text not null,
    primary key(teamID)
);

create table notifications(
    notificationID integer unsigned not null,
    notification text not null,
    timestamp date not null,
    userID integer unsigned,
    teamID integer unsigned,
    primary key(notificationID),
    foreign key(userID) references users(userID),
    foreign key(teamID) references teams(teamID)
);

create table teamMembers(
    userID integer unsigned not null,
    teamID integer unsigned not null,
    foreign key(userID) references users(userID),
    foreign key(teamID) references teams(teamID)
);

create table activities(
    activityName text not null,
    startTime datetime not null,
    endTime datetime not null,
    teamID integer unsigned not null,
    primary key(activityName),
    foreign key(teamID) references teams(teamID)
);

create table videos(
    videoID integer unsigned AUTO_INCREMENT not null,
    videoURL text not null,
    teamID integer unsigned not null,
    primary key(videoID),
    foreign key(teamID) references teams(teamID)
);


-- This inserts some demo values for the tables
insert into users (username, password, privileged, firstName, lastName) values
('joe.mama', 'bruhCraft', false, 'Joe', 'Mama'),
('mr.teacher', 'imAteacher', true, 'Mr', 'Teacher'),
('kai.kurosawa', 'password', false, 'Kai', 'Kurosawa'),
('sporty.boy', 'zoom', false, 'Sporty', 'Boy');

insert into teams (teamName) values
('Gym Class'),
('Bos Touch');

insert into teamMembers (userID, teamID) values
(1, 1),
(3, 1),
(4, 2);

insert into videos (videoURL, teamID) values 
("https://www.youtube.com/embed/0Cp1VGTwXJ8", 1),
("https://www.youtube.com/embed/HV2R5Txs5B4", 1),
("https://www.youtube.com/embed/BeXABt5yEjo", 2);


-- Video query
SELECT videoURL FROM videos WHERE teamID in (
    SELECT teamID FROM teamMembers WHERE userID = '$userID'
) ORDER BY videoID DESC