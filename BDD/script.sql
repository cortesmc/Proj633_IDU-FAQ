/*----DROP TABLE----*/

DROP TABLE IF EXISTS utilisator;

DROP TABLE IF EXISTS question;

DROP TABLE IF EXISTS isLiked;

DROP TABLE IF EXISTS answer;

DROP TABLE IF EXISTS category;

DROP TABLE IF EXISTS teacher;

/*----CREATE TABLE----*/


CREATE TABLE utilisator (
    idUser      integer auto_increment,
    lastname    varchar(50),
    firstname   varchar(50),
    email       varchar(100),
    password    varchar(100),
    CONSTRAINT PK_USER PRIMARY KEY  (idUser)
) ;

CREATE TABLE question(
    idQuestion integer auto_increment,
    title       varchar(100),
    descr       varchar(10000),
    isValidate  boolean,
    idCategory  integer NOT NULL,
    idUser      integer NOT NULL,
    idTeacher   integer,
    CONSTRAINT PK_QUESTION PRIMARY KEY (idQuestion)
);

CREATE TABLE isLiked(
    idUser      integer,
    idQuestion  integer,
    CONSTRAINT PK_ISLIKED PRIMARY KEY (idUser,idQuestion)
);

CREATE TABLE answer(
    idAnswer    integer auto_increment,
    shortText   varchar(400),
    nameFile    varchar(100),
    idTeacher   integer NOT NULL,
    CONSTRAINT PK_ANSWER PRIMARY KEY (idAnswer)
);

CREATE TABLE category(
    idCategory  integer auto_increment,
    libele      varchar(200),
    CONSTRAINT PK_CATEGORY PRIMARY KEY (idCategory)
);

CREATE TABLE teacher(
    idTeacher   integer auto_increment,
    firstname   varchar(50),
    lastname    varchar(50),
    email       varchar(100),
    password    varchar(100),
    CONSTRAINT PK_TEACHER PRIMARY KEY (idTeacher)
);



/*----FOREIGN KEY----*/

ALTER TABLE question ADD FOREIGN KEY (idCategory) REFERENCES category(idCategory);

ALTER TABLE question ADD FOREIGN KEY (idUser) REFERENCES utilisator(idUser);

ALTER TABLE question ADD FOREIGN KEY (idTeacher) REFERENCES teacher(idTeacher);

ALTER TABLE isLiked ADD FOREIGN KEY (idUser) REFERENCES utilisator(idUser);

ALTER TABLE isLiked ADD FOREIGN KEY (idQuestion) REFERENCES question(idQuestion);

ALTER TABLE answer ADD FOREIGN KEY (idTeacher) REFERENCES teacher(idTeacher);




