
use ChatApp;

create table Users
(
Admin bool,
UserID int not null AUTO_INCREMENT,
CreateDate date,
EmailVerified bool,
Phone varchar(20),
PhoneA varchar(20),
FirstName varchar(20),
LastName varchar(20),
Username varchar(20),
Email varchar(30),
ZipCode varchar(20),
UserPassword varchar(20),
Location varchar(20),
BirthDate date,
constraint Pk_UserID primary key (UserID)) ENGINE = INNODB;

create table Logins
(
UserID int,
FailedAttempts int,
SuccessfulAttempts int,
constraint fk_LoginID foreign key (UserID) references Users (UserID),
constraint pk_LoginID primary key (UserID)) ENGINE = INNODB;

create table UserStatus
(
UserID int,
UserStatus varchar(20),
constraint fk_status foreign key (UserID) references Logins (UserID)
) ENGINE = INNODB;

create table Groups
(GroupID int not null AUTO_INCREMENT,
GroupName varchar (20) not null,
CreateDate date,
Active bool,
constraint Pk_GroupID primary key (GroupID)) ENGINE = INNODB;

create table UserGroups
(GroupID int,
UserID int,
constraint fk_GroupID foreign key (GroupID) references Groups (GroupID),
constraint fk_UserID foreign key (UserID) references Users (UserID),
constraint PK_UserNGroups primary key (GroupID, UserID)
) ENGINE = INNODB;

create table Messages
(
MessageID int not null AUTO_INCREMENT,
SenderID int,
RecipientID int,
RoomID int not null AUTO_INCREMENT,
constraint fk_messagesender foreign key (SenderID) references Users (UserID),
constraint fk_messagerecipient foreign key (RecipientID) references Users (UserID),
constraint PK_Messages primary key (MessageID),
ParentMessageID int,
TextBody varchar(500),
DeliverTime timestamp) ENGINE = INNODB;

create table MessageRecipients
(
MessageID int,
SenderID int,
RecipientID int,
GroupID int references Groups (GroupID)
on delete cascade on update cascade,
constraint fk_messageID foreign key (MessageID) references Messages (MessageID),
constraint fk_senderID foreign key (SenderID) references Messages (SenderID),
constraint fk_recipientID foreign key (RecipientID) references Messages (RecipientID),
constraint PK_MessageRecipients primary key (MessageID, SenderID, RecipientID, GroupID)

) ENGINE = INNODB;

create table Photos
(
PhotoID int not null AUTO_INCREMENT,
constraint PK_PhotoID primary key (PhotoID),
MessageID int,
FileName varchar(20),
constraint FK_PhotoMessageID foreign key (MessageID) references Messages (MessageID)
) ENGINE = INNODB;
