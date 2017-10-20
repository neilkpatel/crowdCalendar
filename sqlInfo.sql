
CREATE TABLE voting (
	id int(11) AUTO_INCREMENT PRIMARY KEY not null,
	event_name varchar(256) not null,
	event_datetime datetime, 
	event_description varchar(1000) not null,
	vote int(10) NOT NULL DEFAULT '0'
);



INSERT INTO voting (event_name, event_datetime, event_description)
Values ('Armageddon Festival', '2017-01-09 07:20:00', 'Armageddon Festival in the Lower East Side to celebrate a fantastic movie!');


DELETE FROM table_name;


CREATE TABLE users (
	user_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    user_first varchar(256) not null,
    user_last varchar(256) not null,
    user_email varchar(256) not null,
    user_uid varchar(256) not null,
   	user_pwd varchar(256) not null
    
);