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
VALUES('Сервитьор', 'Хотел-ресторант "Макси"', 'Търсим сервитьори, отговорни към работата си, усмихнати, комуникативни', 'Сервитьор, заплата 800 лв.');

INSERT INTO netit_backend_hr.tb_job_post(title, company, content, priview_content)
VALUES('Лекар', 'СБАЛАГ "Майчин дом"', 'Търсим акушер гинеколог за Родилна зала, хирург, с опит', 'Лекар, заплата 2000 лв.');

INSERT INTO netit_backend_hr.tb_job_post(title, company, content, priview_content)
VALUES('Фризьор', 'Студио за красота "Кифла" ', 'Търсим фризьор или фризьорка, но да не бъдат кифльо или кифла, отговорни, усмихнати', 'Фризьор, заплата 900 лв.');

INSERT INTO netit_backend_hr.tb_job_post(title, company, content, priview_content)
VALUES('Коминочистач', 'Покриви и покривчета', 'Търсим Търсим коминочистачи с черни бузи', 'Коминочистач, заплата 1000 лв.');

INSERT INTO netit_backend_hr.tb_job_post(title, company, content, priview_content)
VALUES('Програмист', 'SDA', 'Търсим frond-end and back-end web developer', 'Програмист, заплата 8000 лв.');

CREATE TABLE netit_backend_hr.tb_employ (
     id INTEGER AUTO_INCREMENT PRIMARY KEY,
     user_name VARCHAR(256) NOT NULL,
     fname VARCHAR(256) NOT NULL,
     lname VARCHAR(256) NOT NULL,
     tel VARCHAR(20) NOT NULL,
     age INTEGER,
     email VARCHAR(256) NOT NULL,
     pass VARCHAR(256) NOT NULL,
     company_name VARCHAR(256) NOT NULL,
     branch VARCHAR(500) NOT NULL,
     business_activity VARCHAR(3000) NOT NULL,
     employer_pass VARCHAR(256) NOT NULL
);

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

CREATE TABLE netit_backend_hr.tb_employ__role (
     empl_id INTEGER,
     role_id INTEGER,
     PRIMARY KEY(empl_id, role_id)
);

CREATE TABLE netit_backend_hr.tm_categoriesjob (
     id INTEGER AUTO_INCREMENT PRIMARY KEY,
     title VARCHAR (3000) NOT NULL
);

INSERT INTO netit_backend_hr.tm_categoriesjob(title)
VALUES('За специалисти с висше образование');

INSERT INTO netit_backend_hr.tm_categoriesjob(title)
VALUES('За специалисти със средно образование');

INSERT INTO netit_backend_hr.tm_categoriesjob(title)
VALUES('Дистанционна работа');

INSERT INTO netit_backend_hr.tm_categoriesjob(title)
VALUES('Присъствена работа');

INSERT INTO netit_backend_hr.tm_categoriesjob(title)
VALUES('Общи работници');

CREATE TABLE netit_backend_hr.tb_job_post__categoriesjob(
     job_post_id INTEGER,
     categoryjob_id INTEGER,
     PRIMARY KEY(job_post_id, categoryjob_id)
);

INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(1, 5);
INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(1, 4);

INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(2, 2);
INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(2, 4);

INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(3, 1);
INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(3, 4);

INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(4, 2);
INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(4, 4);

INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(5, 5);
INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(5, 4);

INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(6, 1);
INSERT INTO netit_backend_hr.tb_job_post__categoriesjob(job_post_id, categoryjob_id) VALUES(6, 3);
