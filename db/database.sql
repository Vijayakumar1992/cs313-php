-- to view a table -- select * from (name of the table);
-- to create a table -- copy and paste the table 
-- \i database.sql to drop and create the tables runs the script 
-- heroku pg:psql -- connect to heroku database
-- to view table just type ;


DROP TABLE appointment;
DROP TABLE customer;
DROP TABLE service_type;
DROP TYPE homesize;
DROP TYPE servicetype;


CREATE TABLE customer(
    customer_id                  SERIAL PRIMARY KEY,  -- default 
    customer_firstname           varchar(100) NOT NULL,   -- need to preset the maximum amount of character 
    customer_lastname            varchar(100) NOT NULL,
    customer_phonenumber         VARCHAR NOT NULL, 
    customer_email               varchar(100) NOT NULL UNIQUE,
    customer_registerdate        date NOT NULL,          -- just gets the date LOOK UP HOW TO UPDATE A SINGLE TABLE 
    customer_password            varchar(255)
);

CREATE TYPE homesize AS ENUM ('small', 'medium', 'large');
CREATE TYPE servicetype AS ENUM ('interior', 'exterior', 'both');

CREATE TABLE service_type(
    service_id                  SERIAL PRIMARY KEY,
    service_homeSize            homesize, --we use enum when the list of things can't be changed          
    service_type                servicetype,             
    service_RoomSize            int,
    service_Color               varchar,
    service_TimeFrame           time,
    service_Price               smallserial  --https://www.postgresql.org/docs/9.3/datatype-numeric.html
);

CREATE TABLE appointment(
    appointment_id                  SERIAL PRIMARY KEY,
    appointment_date                timestamp, -- this will get the date and time           
    appointment_address             varchar, -- with numbers if you don't do math with them, they are consider charactor 
    customer_id                     INT REFERENCES customer(customer_id), -- to connect foreign key 
    service_id                      INT REFERENCES service_type(service_id)
);


-- VALUES (1, 2, 3)
-- research on how SERIAL WORKS AND HOW I CAN INSERT INTO TABLE WITH SERIAL DATATYPE

INSERT INTO customer
values (default, 'John', 'Smith', '8016596598', 'johnsmith@gmail.com', '12-25-2019', NULL),
(default, 'David', 'Aruldass', '8016596551', 'davidaruldass@gmail.com', '12-26-2019', NULL),
(default, 'Daniel', 'Aruldass', '8016596552', 'danielaruldass@gmail.com', '12-27-2019', NULL);

INSERT INTO service_type VALUES 
(DEFAULT, 'small', 'interior', 250, 'grey', '10:00am', '3000'),
(DEFAULT, 'medium', 'exterior', 500, 'grey', '10:00am', '4000'),
(DEFAULT, 'large', 'both', 700, 'grey', '10:00am', '5000');

INSERT INTO appointment VALUES 
(DEFAULT,'12-28-2019', '123 Walter Street #2121 Provo, Utah 84604', 1 , 1),
(DEFAULT,'12-28-2019', '124 Walter Street #2121 Provo, Utah 84604' , 2, 2),
(DEFAULT,'12-28-2019', '125 Walter Street #2121 Provo, Utah 84604' ,3 , 3);


