/*----DROP TABLE----*/

DROP TABLE IF EXISTS Utilisator;

DROP TABLE IF EXISTS Question;

DROP TABLE IF EXISTS IsLiked;

DROP TABLE IF EXISTS Answer;

DROP TABLE IF EXISTS Category;

DROP TABLE IF EXISTS Teacher;

/*----CREATE TABLE----*/


CREATE TABLE Utilisator (
    idUser      integer auto_increment,
    lastname    varchar(50),
    firstname   varchar(50),
    email       varchar(100),
    password    varchar(100),
    CONSTRAINT PK_USER PRIMARY KEY  (idUser)
) ;

CREATE TABLE Question(
    idQuestion integer auto_increment,
    title       varchar(100),
    descr       varchar(10000),
    isValidate  boolean,
    idCategory  integer NOT NULL,
    idUser      integer NOT NULL,
    idTeacher   integer,
    CONSTRAINT PK_QUESTION PRIMARY KEY (idQuestion)
);

CREATE TABLE IsLiked(
    idUser      integer,
    idQuestion  integer,
    CONSTRAINT PK_ISLIKED PRIMARY KEY (idUser,idQuestion)
);

CREATE TABLE Answer(
    idAnswer    integer auto_increment,
    shortText   varchar(400),
    nameFile    varchar(100),
    idTeacher   integer NOT NULL,
    CONSTRAINT PK_ANSWER PRIMARY KEY (idAnswer)
);

CREATE TABLE Category(
    idCategory  integer auto_increment,
    libele      varchar(200),
    CONSTRAINT PK_CATEGORY PRIMARY KEY (idCategory)
);

CREATE TABLE Teacher(
    idTeacher   integer auto_increment,
    firstname   varchar(50),
    lastname    varchar(50),
    email       varchar(100),
    password    varchar(100),
    CONSTRAINT PK_TEACHER PRIMARY KEY (idTeacher)
);



/*----FOREIGN KEY----*/

ALTER TABLE Question ADD FOREIGN KEY (idCategory) REFERENCES Category(idCategory);

ALTER TABLE Question ADD FOREIGN KEY (idUser) REFERENCES Utilisator(idUser);

ALTER TABLE Question ADD FOREIGN KEY (idTeacher) REFERENCES Teacher(idTeacher);

ALTER TABLE IsLiked ADD FOREIGN KEY (idUser) REFERENCES Utilisator(idUser);

ALTER TABLE IsLiked ADD FOREIGN KEY (idQuestion) REFERENCES Question(idQuestion);

ALTER TABLE Answer ADD FOREIGN KEY (idTeacher) REFERENCES Teacher(idTeacher);




