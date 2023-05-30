/*----DROP TABLE----*/

DROP TABLE IF EXISTS utilisator;

DROP TABLE IF EXISTS question;

DROP TABLE IF EXISTS isLiked;

DROP TABLE IF EXISTS answer;

DROP TABLE IF EXISTS category;

DROP TABLE IF EXISTS teacher;

/*----CREATE TABLE----*/


CREATE TABLE utilisator (
    idutilisator      	integer auto_increment,
    lastname    		varchar(50),
    firstname   		varchar(50),
    email       		varchar(100),
    password    		varchar(100),
    CONSTRAINT PK_USER PRIMARY KEY  (idutilisator)
) ;

CREATE TABLE question(
    idquestion 			integer auto_increment,
    title       		varchar(100),
    descr       		varchar(10000),
    isValidate  		boolean,
    idcategory  		integer,
    idutilisator      	integer,
    idteacher   		integer,
    CONSTRAINT PK_QUESTION PRIMARY KEY (idquestion)
);

CREATE TABLE isLiked(
    idutilisator      	integer,
    idquestion  		integer,
    CONSTRAINT PK_ISLIKED PRIMARY KEY (idutilisator,idquestion)
);

CREATE TABLE answer(
    idanswer    	integer auto_increment,
    shortText   	varchar(400),
    nameFile    	varchar(100),
    idteacher   	integer,
    idquestion      integer,
    CONSTRAINT PK_ANSWER PRIMARY KEY (idanswer)
);

CREATE TABLE category(
    idcategory  integer auto_increment,
    libele      varchar(200),
    CONSTRAINT PK_CATEGORY PRIMARY KEY (idcategory)
);

CREATE TABLE teacher(
    idteacher   	integer auto_increment,
    firstname   	varchar(50),
    lastname    	varchar(50),
    email       	varchar(100),
    password    	varchar(100),
    CONSTRAINT PK_TEACHER PRIMARY KEY (idteacher)
);



/*----FOREIGN KEY----*/

ALTER TABLE question ADD FOREIGN KEY (idcategory) REFERENCES category(idcategory);

ALTER TABLE question ADD FOREIGN KEY (idutilisator) REFERENCES utilisator(idutilisator);

ALTER TABLE question ADD FOREIGN KEY (idteacher) REFERENCES teacher(idteacher);

ALTER TABLE isLiked ADD FOREIGN KEY (idutilisator) REFERENCES utilisator(idutilisator);

ALTER TABLE isLiked ADD FOREIGN KEY (idquestion) REFERENCES question(idquestion);

ALTER TABLE answer ADD FOREIGN KEY (idteacher) REFERENCES teacher(idteacher);

ALTER TABLE answer ADD FOREIGN KEY (idquestion) REFERENCES question(idquestion);

/* ALTER TABLE teacher ADD FOREIGN KEY (idutilisator) REFERENCES utilisator(idutilisator); */





/*---- INSERTION DE DONNÉE ----*/



/*-- CATEGORY --*/
INSERT INTO category (libele)
	VALUES ("PHP");

INSERT INTO category (libele)
	VALUES ("HTML");

INSERT INTO category (libele)
	VALUES ("CSS");

INSERT INTO category (libele)
	VALUES ("JAVASCRIPT");












