-- This code creates the tables
create table users(
    userID integer unsigned not null,
    username text not null,
    password text not null,
    privileged boolean not null,
    firstName text,
    lastName text,
    primary key(userID)
);

create table teams(
    teamID integer unsigned not null,
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
    videoID integer unsigned not null,
    videoURL text not null,
    teamID integer unsigned not null,
    primary key(videoID),
    foreign key(teamID) references teams(teamID)
);