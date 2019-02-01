-- to view a table -- select * from (name of the table);
-- to create a table -- copy and paste the table 
-- \i database.sql to drop and create the tables 
-- heroku pg:psql -- connect to heroku database


DROP TABLE appointment;
DROP TABLE customer;
DROP TABLE service_type;
DROP TYPE homesize;
DROP TYPE servicetype;


CREATE TABLE customer(
    customer_id                  SERIAL PRIMARY KEY,  -- default 
    customer_firstname           varchar(100),   -- need to preset the maximum amount of character 
    customer_lastname            varchar(100),
    customer_phonenumber         int, 
    customer_email               varchar(100),
    customer_registerdate        date,          -- just gets the date LOOK UP HOW TO UPDATE A SINGLE TABLE 
    customer_gender              varchar(5)
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
    customer_id                     SERIAL REFERENCES customer(customer_id), -- to connect foreign key 
    service_id                      SERIAL REFERENCES service_type(service_id)
);

