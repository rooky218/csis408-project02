-- displaying settings values
select CONCAT(FirstName, ' ', LastName) as Name, Phone, Email, Username, BirthDate from Users
where UserID = variable;

-- changing settings
update Users set FirstName = 'new value' where UserID = somevariable;
update Users set LastName = 'new value' where UserID = somevariable;
update Users set Username = 'new value' where UserID = somevariable;
update Users set Email = 'new value' where UserID = somevariable;
update Users set BirthDate = '0000/00/00' where UserID = somevariable;

-- registration
insert into Users (Username, UserPassword, Email, Phone) values (variables);
insert into Users (FirstName, LastName, ZipCode, Location) values (variables);

-- profileName
select CONCAT(FirstName + ' ' + LastName) As FullName, Username, CreateDate, BirthDate, Location from Users
where UserID = variable;
