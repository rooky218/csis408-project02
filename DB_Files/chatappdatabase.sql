create database ChatApp;

use ChatApp;

create table Users
(UserID int not null,
CreateDate date,
Active bool,
FirstName varchar(20),
LastName varchar(20),
Username varchar(20),
Email varchar(30),
Password varchar(20),
constraint Pk_UserID primary key (UserID));

create table Logins
(
UserID int,
FailedAttempts int,
SuccessfulAttempts int,
constraint fk_LoginID foreign key (UserID) references Users (UserID),
constraint pk_LoginID primary key (UserID));

create table UserStatus
(
UserID int,
UserStatus varchar(20),
constraint fk_status foreign key (UserID) references Logins (UserID)
);

create table Groups
(GroupID int not null,
GroupName varchar (20) not null,
CreateDate date,
Active bool,
constraint Pk_GroupID primary key (GroupID));

create table UserGroups
(GroupID int,
UserID int,
constraint fk_GroupID foreign key (GroupID) references Groups (GroupID),
constraint fk_UserID foreign key (UserID) references Users (UserID),
constraint PK_UserNGroups primary key (GroupID, UserID)
);

create table Messages
(
MessageID int not null,
UserID int,
RecipientID int,
constraint fk_messagesender foreign key (UserID) references Users (UserID),
constraint fk_messagerecipient foreign key (RecipientID) references Users (UserID),
constraint PK_Messages primary key (MessageID),
ParentMessageID int,
TextBody varchar(500),
DeliverTime timestamp,
DeliverDate date);

create table MessageRecipients
(
MessageID int,
SenderID int,
RecipientID int,
GroupID int references Groups (GroupID)
on delete cascade on update cascade,
constraint fk_messageID foreign key (MessageID) references Messages (MessageID),
constraint fk_senderID foreign key (SenderID) references Messages (UserID),
constraint fk_recipientID foreign key (RecipientID) references Messages (RecipientID),
constraint PK_MessageRecipients primary key (MessageID, SenderID, RecipientID, GroupID)

);

create table Photos
(
PhotoID int not null,
constraint PK_PhotoID primary key (PhotoID),
MessageID int,
FileName varchar(20),
constraint FK_PhotoMessageID foreign key (MessageID) references Messages (MessageID)
);


