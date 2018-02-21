create database ChatApp;

use ChatApp;

create table Users
(UserID varchar(20) not null,
CreateDate date,
Active bool,
constraint Pk_UserID primary key (UserID));

create table Logins
(
UserID varchar(20) not null primary key references Users (UserID)
on delete cascade on update cascade,
FirstName varchar(20),
LastName varchar(20),
email varchar(30),
UserPassword varchar (20));

create table Groups
(GroupID int not null,
GroupName varchar (20) not null,
CreateDate date,
Active bool,
constraint Pk_GroupID primary key (GroupID));

create table UserGroups
(GroupID int not null references Groups (GroupID)
on delete cascade on update cascade,
UserID varchar(20) not null references Users (UserID)
on delete cascade on update cascade,
constraint PK_UserNGroups primary key (GroupID, UserID)
);

create table Messages
(
MessageID int not null,
UserID varchar(20) references Users (UserID)
on delete cascade on update cascade,
RecipientID varchar(20) references Users (UserID)
on delete cascade on update cascade,
constraint PK_Messages primary key (MessageID, UserID, RecipientID),
ParentMessageID int,
TextBody varchar(500),
DeliverTime timestamp,
DeliverDate date);

create table MessageRecipients
(
MessageID int references Messages (MessageID)
on delete cascade on update cascade,
SenderID varchar(20) references Users (UserID)
on delete cascade on update cascade,
RecipientID varchar(20) references Users (UserID)
on delete cascade on update cascade,
GroupID int references Groups (GroupID)
on delete cascade on update cascade,
constraint PK_MessageRecipients primary key (MessageID, SenderID, RecipientID, GroupID));

create table Photos
(
PhotoID int not null,
constraint PK_PhotoID primary key (PhotoID),
MessageID int,
FileName varchar(20),
constraint FK_MessageID foreign key (MessageID) references Messages (MessageID)
on delete cascade on update cascade);
