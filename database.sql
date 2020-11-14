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
    notificationID integer unsigned AUTO_INCREMENT not null,
    notification text not null,
    timestamp date,
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

insert into activities (activityName, startTime, endTime, teamID) values
('30 Push Ups', '2020-11-11 12:39:01', '2020-11-12 17:00:00', 1),
('50 Situps', '2020-11-12 14:50:00', '2020-11-13 18:00:00', 1),
('75 Burpees', '2020-11-11 18:30:00', '2020-11-16 08:00:00', 1),
('70 Push Ups', '2020-11-11 12:39:01', '2020-11-12 17:00:00', 2),
('100 Situps', '2020-11-12 14:50:00', '2020-11-13 18:00:00', 2);

insert into notifications (notification, teamID) values
("Soccer practice cancelled", 1),
("Trainer added a new activity", 1),
("NFL Training changed from 4:30pm to 5pm", 1);


-- Video query
SELECT videoURL FROM videos WHERE teamID in (
    SELECT teamID FROM teamMembers WHERE userID = $userID
) ORDER BY videoID DESC;

-- Activity query
SELECT * FROM activities WHERE teamID in (
    SELECT teamID FROM teamMembers WHERE userID = $userID
);

-- Notification query
SELECT * FROM notifications WHERE teamID in (
    SELECT teamID FROM teamMembers WHERE userID = $userID
)