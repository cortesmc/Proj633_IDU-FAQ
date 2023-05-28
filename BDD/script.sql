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

/*-- UTILISATOR --*/
INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("PLEBANI", "Theo", "pet@etu-univ-smb.fr", "prout");

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

INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("FERREIRA", "Mathieu", "mathieu@gmail.com", "mdp");

INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("LEBON", "Mathys", "mathys@gmail.com", "caca");

INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("CADOUX", "Lila", "lila@gmail.com", "test");

INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("CORTES", "Andres", "andres@gmail.com", "test");

INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("IBNABDELJALIL", "Adam", "adam@gmail.com", "test");

INSERT INTO utilisator (lastname, firstname, email, password)
	VALUES ("RATTANAVONG", "Arthur", "arthur@gmail.com", "test");


/*-- CATEGORY --*/
INSERT INTO category (libele)
	VALUES ("PHP");

INSERT INTO category (libele)
	VALUES ("HTML");

INSERT INTO category (libele)
	VALUES ("CSS");

INSERT INTO category (libele)
	VALUES ("JAVASCRIPT");


/*-- TEACHER --*/
INSERT INTO teacher (lastname, firstname, email, password)
	VALUES ("Cortes", "Andres", "acortes@univ-smb.fr", "petitpoussin");

INSERT INTO teacher (lastname, firstname, email, password)
	VALUES ("PLEBANI", "Theo", "theo@univ-smb.fr", "petitpoussin");

INSERT INTO teacher (lastname, firstname, email, password)
	VALUES ("FERREIRA", "Mathieu", "mathieu@univ-smb.fr", "petitpoussin");

INSERT INTO teacher (lastname, firstname, email, password)
	VALUES ("LEBON", "Mathys", "mathys@univ-smb.fr", "petitpoussin");

INSERT INTO teacher (lastname, firstname, email, password)
	VALUES ("CADOUX", "Lila", "lila@univ-smb.fr", "petitpoussin");

INSERT INTO teacher (lastname, firstname, email, password)
	VALUES ("IBNABDELJALIL", "Adam", "adam@univ-smb.fr", "petitpoussin");

INSERT INTO teacher (lastname, firstname, email, password)
	VALUES ("RATTANAVONG", "Arthur", "arthur@univ-smb.fr", "petitpoussin");

/*-- QUESTION --*/
-- INSERT INTO question (title, descr, isValidate, idcategory, idutilisator, idteacher)
-- 	VALUES ("Titre de la question",
--             "Description de la question", 
--             '0', 
--             'NULL', 'NULL', 'NULL');

-- INSERT INTO question (title, descr, isValidate, idcategory, idutilisator, idteacher)
-- 	VALUES ("Titre de la question 2 ",
--             "Description de la question 2", 
--             '0', 
--             'NULL', 'NULL', 'NULL');

-- INSERT INTO question (title, descr, isValidate, idcategory, idutilisator, idteacher)
-- 	VALUES ("Titre de la question 3",
--             "Description de la question 3", 
--             '0', 
--             'NULL', 'NULL', 'NULL');

-- INSERT INTO question (title, descr, isValidate, idcategory, idutilisator, idteacher)
-- 	VALUES ("Titre de la question 3",
--             "Description de la question 4", 
--             '0', 
--             'NULL', 'NULL', 'NULL');


-- /*-- ANSWERS --*/
-- INSERT INTO answer (shortText, nameFile, idteacher, idquestion)
-- 	VALUES ("La reponse 1 a la question 1",
--             "Vraiment un texte super long pour décrire la reponse, iciciiicic !", 
--             '1', '1');

-- INSERT INTO answer (shortText, nameFile, idteacher, idquestion)
-- 	VALUES ("La reponse 2 a la question 1",
--             "Vraiment un texte super long pour décrire la reponse, iciciiicic !", 
--             '1', '1');

-- INSERT INTO answer (shortText, nameFile, idteacher, idquestion)
-- 	VALUES ("La reponse 3 a la question 1",
--             "Vraiment un texte super long pour décrire la reponse, iciciiicic !", 
--             '2', '1');

-- INSERT INTO answer (shortText, nameFile, idteacher, idquestion)
-- 	VALUES ("La reponse 4 a la question 1",
--             "Vraiment un texte super long pour décrire la reponse, iciciiicic !", 
--             '3', '1');



-- INSERT INTO answer (shortText, nameFile, idteacher, idquestion)
-- 	VALUES ("La reponse 1 a la question 2",
--             "Vraiment un texte super long pour décrire la reponse, iciciiicic !", 
--             '3', '2');

-- INSERT INTO answer (shortText, nameFile, idteacher, idquestion)
-- 	VALUES ("La reponse 2 a la question 2",
--             "Vraiment un texte super long pour décrire la reponse, iciciiicic !", 
--             '1', '2');

-- INSERT INTO answer (shortText, nameFile, idteacher, idquestion)
-- 	VALUES ("La reponse 3 a la question 2",
--             "Vraiment un texte super long pour décrire la reponse, iciciiicic !", 
--             '5', '2');



-- INSERT INTO answer (shortText, nameFile, idteacher, idquestion)
-- 	VALUES ("La reponse 1 a la question 3",
--             "Vraiment un texte super long pour décrire la reponse, iciciiicic !", 
--             '6', '3');

-- INSERT INTO answer (shortText, nameFile, idteacher, idquestion)
-- 	VALUES ("La reponse 2 a la question 3",
--             "Vraiment un texte super long pour décrire la reponse, iciciiicic !", 
--             '4', '3');

-- INSERT INTO answer (shortText, nameFile, idteacher, idquestion)
-- 	VALUES ("La reponse 3 a la question 3",
--             "Vraiment un texte super long pour décrire la reponse, iciciiicic !", 
--             '7', '3');










