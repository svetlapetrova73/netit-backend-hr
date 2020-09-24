CREATE DATABASE netit_backend_hr;
CREATE TABLE netit_backend_hr.tb_job_post (
    id 		INTEGER AUTO_INCREMENT PRIMARY KEY		,
    title 	VARCHAR(512) NOT NULL					,
    company VARCHAR(256) NOT NULL                   ,
    content TEXT NOT NULL							,
    priview_content VARCHAR(1024)
);

INSERT INTO netit_backend_hr.tb_job_post(title, company, content, priview_content)
VALUES('Чистач', 'Комунална служба','Търсим чистачка, съвестна и работлива', 'Чистачка, заплата 500 лв.');

INSERT INTO netit_backend_hr.tb_job_post(title, company, content, priview_content)
VALUES('Сервитьор', 'Хотел-ресторант', 'Търсим сервитьори, отговорни към работата си, усмихнати, комуникативни', 'Сервитьор, заплата 800 лв.');

INSERT INTO netit_backend_hr.tb_job_post(title, company, content, priview_content)
VALUES('Лекар', 'СБАЛАГ "Майчин дом"', 'Търсим Лекар за Родилна зала, хирург, с опит', 'Лекар, заплата 2000 лв.');

INSERT INTO netit_backend_hr.tb_job_post(title, company, content, priview_content)
VALUES('Фризьор', 'Студио за красота "Кифла" ', 'Търсим фризьор или фризьорка, но да не бъдат кифльо или кифла, отговорни, усмихнати', 'Фризьор, заплата 900 лв.');

INSERT INTO netit_backend_hr.tb_job_post(title, company, content, priview_content)
VALUES('Сладкар', 'Сладкарница "Неделя"', 'Търсим сладкар или сладкарка, отговорни личности, спазващи изискванията на РЗИ във връзка с предпазване от коронавирус', 'Сладкар, заплата 950 лв.');

SELECT * FROM netit_backend_hr.tb_job_post;

CREATE TABLE netit_backend_hr.tb_employ (
     id INTEGER AUTO_INCREMENT PRIMARY KEY,
     user_name VARCHAR(256) NOT NULL,
     fname VARCHAR(256) NOT NULL,
     lname VARCHAR(256) NOT NULL,
     email VARCHAR(256) NOT NULL,
     tel VARCHAR(20) NOT NULL,
     age INTEGER,
     pass VARCHAR(256) NOT NULL,
     company_name VARCHAR(256) NOT NULL,
     branch VARCHAR(500) NOT NULL,
     business_activity VARCHAR(3000) NOT NULL,
     employer_pass VARCHAR(256) NOT NULL
);

SELECT * FROM netit_backend_hr.tb_user_employ;

CREATE TABLE netit_backend_hr.tm_roles (
     id INTEGER AUTO_INCREMENT PRIMARY KEY,
     title VARCHAR(256) NOT NULL
);

INSERT INTO netit_backend_hr.tm_roles(title)
VALUES('HR');

INSERT INTO netit_backend_hr.tm_roles(title)
VALUES('SUPER');

INSERT INTO netit_backend_hr.tm_roles(title)
VALUES('EMPLOYER');

INSERT INTO netit_backend_hr.tm_roles(title)
VALUES('EMPLOY');

SELECT * FROM netit_backend_hr.tm_roles;

CREATE TABLE netit_backend_hr.tb_employ__role (
     empl_id INTEGER,
     role_id INTEGER,
     PRIMARY KEY(empl_id, role_id)
);





