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
    idcategory  		integer NOT NULL,
    idutilisator      	integer NOT NULL,
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
    idteacher   	integer NOT NULL,
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

/* ALTER TABLE teacher ADD FOREIGN KEY (idutilisator) REFERENCES utilisator(idutilisator); */





/*---- INSERTION DE DONNÉE ----*/
INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("DUPONT", "Henri", "henro@gmail.com", "henriPwd");

INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("DUPONT1", "Henri1", "henro1@gmail.com", "henri1Pwd");

INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("DUPONT2", "Henri2", "henro2@gmail.com", "henri2Pwd");

INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("DUPONT3", "Henri3", "henro3@gmail.com", "henri3Pwd");

INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("DUPONT4", "Henri4", "henro4@gmail.com", "henri4Pwd");

INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("DUPONT5", "Henri5", "henro5@gmail.com", "henri5Pwd");





















