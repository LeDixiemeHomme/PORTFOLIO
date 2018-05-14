create database forum;

use forum;

create table categories 
(id_cat int not null AUTO_INCREMENT,
 titre varchar(50),
 PRIMARY key (id_cat));

create table topics
 (id_t int not null AUTO_INCREMENT,
  titre varchar(100),
  description text,
  id_cat int NOT null,
  PRIMARY KEY(id_t),
  FOREIGN KEY(id_cat) REFERENCES categories(id_cat));

CREATE TABLE users
  (id_u INT NOT NULL AUTO_INCREMENT,
   login varchar(100),
   mdp   varchar (255),
   email varchar(255),
   avatar varchar(255),
   date_inscription datetime,
   datelastco datetime,
   ip varchar(50),
   lvl int DEFAULT 1,
   PRIMARY KEY (id_u));

CREATE TABLE posts
   (id_p INT NOT NULL AUTO_INCREMENT,
    contenu text,
    date_p datetime,
    id_u int NOT NULL,
    id_t INT NOT NULL,
    PRIMARY KEY (id_p),
    FOREIGN KEY (id_u) REFERENCES users(id_u),
    FOREIGN KEY (id_t) REFERENCES topics(id_t));
   
   
  
