drop database if exists mokytis;
create database mokytis;
use mokytis;

DROP TABLE IF EXISTS COURS;
DROP TABLE IF EXISTS PROFESSEUR;
DROP TABLE IF EXISTS APPRENANT;
DROP TABLE IF EXISTS SUIT;
DROP TABLE IF EXISTS MATIERE;
DROP TABLE IF EXISTS TYPEMATERIEL;
DROP TABLE IF EXISTS MATERIELPEDA;
DROP TABLE IF EXISTS SUJETFORUM;
DROP TABLE IF EXISTS REPONSEFORUM;
DROP TABLE IF EXISTS MATIERECOURS;
DROP TABLE IF EXISTS QCM;
DROP TABLE IF EXISTS QUESTIONSQCM;
DROP TABLE IF EXISTS REPONSESQCM;

CREATE TABLE PROFESSEUR(
  idProf INT PRIMARY KEY NOT NULL,
  nom VARCHAR(40),
  prenom VARCHAR(40),
  login VARCHAR(20),
  mdp VARCHAR(20)
  );

CREATE TABLE COURS(
  idCours INT PRIMARY KEY NOT NULL,
  intituleCours VARCHAR(60) UNIQUE,
  professeur INT,
  accepte BOOL DEFAULT FALSE,
  dateAjout DATE,
  dureeEstimee int,
  FOREIGN KEY (professeur) REFERENCES PROFESSEUR(idProf)
  );

  CREATE TABLE COURSSIMPLES(
    idCours INT PRIMARY KEY NOT NULL,
    intituleCours VARCHAR(60) UNIQUE,
    professeur INT,
    accepte BOOL DEFAULT FALSE,
    dateAjout DATE,
    dureeEstimee int,
    contenu VARCHAR(1000),
    FOREIGN KEY (professeur) REFERENCES PROFESSEUR(idProf)
    );

CREATE TABLE APPRENANT(
  idAppr INT PRIMARY KEY NOT NULL,
  nom VARCHAR(40),
  prenom VARCHAR(40),
  login VARCHAR(20),
  mdp VARCHAR(20),
  actif BOOL DEFAULT FALSE,
  dateInscription DATE,
  dateDerniereConnexion DATE
  );

CREATE TABLE SUIT(
  apprenant INT NOT NULL,
  cours INT NOT NULL,
  PRIMARY KEY (cours, apprenant),
  FOREIGN KEY (cours) REFERENCES COURS(idCours),
  FOREIGN KEY (apprenant) REFERENCES APPRENANT(idAppr)
  );

CREATE TABLE MATIERE(
  idMatiere INT PRIMARY KEY,
  intituleMatiere VARCHAR(32) UNIQUE
  );

CREATE TABLE TYPEMATERIEL(
  idTypeMat INT NOT NULL PRIMARY KEY,
  typeMateriel VARCHAR(20)
  );

CREATE TABLE MATERIELPEDA(
  idMatPed INT NOT NULL PRIMARY KEY,
  cours INT,
  type INT,
  lien VARCHAR(100),
  emplacement INT,
  FOREIGN KEY (cours) REFERENCES COURS(idCours),
  FOREIGN KEY (type) REFERENCES TYPEMATERIEL(idTypeMat)
  );

CREATE TABLE SUJETFORUM(
  idSujetForum INT NOT NULL PRIMARY KEY,
  titre VARCHAR(40),
  contenu VARCHAR(400),
  cours INT,
  matiere INT,
  auteur INT,
  datePubli TIME,
  FOREIGN KEY (cours) REFERENCES COURS(idCours),
  FOREIGN KEY (matiere) REFERENCES MATIERE(idMatiere),
  FOREIGN KEY (auteur) REFERENCES APPRENANT(idAppr)
  );

CREATE TABLE REPONSEFORUM(
  idRepForum INT NOT NULL PRIMARY KEY,
  contenu VARCHAR(400),
  sujet INT,
  auteur INT,
  datePubli TIME,
  FOREIGN KEY (sujet) REFERENCES SUJETFORUM(idSujetForum),
  FOREIGN KEY (auteur) REFERENCES APPRENANT(idAppr),
  FOREIGN KEY (auteur) REFERENCES PROFESSEUR(idProf)
  );

CREATE TABLE MATIERECOURS(
  idMatiereCours INT PRIMARY KEY,
  cours INT,
  matiere INT,
  FOREIGN KEY (cours) REFERENCES COURS(idCours),
  FOREIGN KEY (matiere) REFERENCES MATIERE(idMatiere)
);
CREATE TABLE QCM(
  idQCM INT PRIMARY KEY,
  intituleQCM VARCHAR(60),
  difficulte VARCHAR(32),
  cours INT,
  FOREIGN KEY (cours) REFERENCES COURS(idCours)
);

CREATE TABLE QUESTIONSQCM(
  idQuestion INT PRIMARY KEY,
  qcm INT,
  difficulte VARCHAR(32),
  textQuestion VARCHAR(200),
  FOREIGN KEY (qcm) REFERENCES QCM(idQCM)
);

CREATE TABLE REPONSESQCM(
  idReponsesQCM INT PRIMARY KEY,
  question INT,
  textReponse VARCHAR(64),
  estJuste BOOL,
  FOREIGN KEY (question) REFERENCES QUESTIONSQCM(idQuestion)
);


INSERT INTO PROFESSEUR VALUES (1, "Michelucci", "Dominique", "micdom", "dommic");
INSERT INTO PROFESSEUR VALUES (2, "Abrouk", "Lylia", "ablil", "lilab");
INSERT INTO PROFESSEUR VALUES (3, "Gentil", "Christian", "genchris", "chrisgen");
INSERT INTO PROFESSEUR VALUES (4, "Denil", "Jean", "jeaden", "denjea");
INSERT INTO PROFESSEUR VALUES (5, "Deschamps", "Denis", "desden", "dendes");
INSERT INTO PROFESSEUR VALUES (6, "Bouriquet", "Christian", "bouchris", "chrisbou");
INSERT INTO PROFESSEUR VALUES (7, "Rachouf", "Zinedine", "zidane", "abc123");
INSERT INTO PROFESSEUR VALUES (8, "Abrouk", "Lylia", "ablil", "lilab");
INSERT INTO PROFESSEUR VALUES (9, "Gentil", "Christian", "genchris", "chrisgen");


INSERT INTO APPRENANT VALUES (1, "Girard", "Quentin", "girquen", "quengir", true, CURRENT_DATE(), CURRENT_DATE());
INSERT INTO APPRENANT VALUES (2, "Girard", "Henry", "girhen", "hengir", true, CURRENT_DATE(), CURRENT_DATE());
INSERT INTO APPRENANT VALUES (3, "Desbois", "Nicolas", "desnic", "nicdes", true, CURRENT_DATE(), CURRENT_DATE());
INSERT INTO APPRENANT VALUES (4, "Misaka", "Mikoto", "railgun", "toma", true, CURRENT_DATE(), CURRENT_DATE());
INSERT INTO APPRENANT VALUES (5, "Potter", "Harry", "nimbus2000", "speliarmous", true, CURRENT_DATE(), CURRENT_DATE());
INSERT INTO APPRENANT VALUES (6, "Saquet", "Frodon", "saqfro", "frosaq", true, CURRENT_DATE(), CURRENT_DATE());
INSERT INTO APPRENANT VALUES (7, "Ay", "Pierre", "mcuhc2333", "123000", true, CURRENT_DATE(), CURRENT_DATE());
INSERT INTO APPRENANT VALUES (8, "Lennon", "Bob", "lenbob", "boblen", true, CURRENT_DATE(), CURRENT_DATE());
INSERT INTO APPRENANT VALUES (9, "Laguon", "Damien", "lagdam", "damlag", true, CURRENT_DATE(), CURRENT_DATE());


INSERT INTO COURS VALUES (11, "Calcul litt??ral et identites remarquables", 2, true, CURRENT_DATE(), 8);
INSERT INTO COURS VALUES (31, "Polygones", 1, false, CURRENT_DATE(), 4);
INSERT INTO COURS VALUES (21, "figures de style", 3, true, CURRENT_DATE(), 2);
INSERT INTO COURS VALUES (41, "??nergie cin??tique", 4, true, CURRENT_DATE(), 1);
INSERT INTO COURS VALUES (51, "Verbes irr??guliers", 5, false, CURRENT_DATE(), 2);
INSERT INTO COURS VALUES (61, "Verbes r??guliers", 6, true, CURRENT_DATE(), 2);
INSERT INTO COURS VALUES (12, "th??or??me de pythagore", 2, true, CURRENT_DATE(), 4);
INSERT INTO COURS VALUES (13, "d??riv??es", 2, false, CURRENT_DATE(), 8);
INSERT INTO COURS VALUES (42, "atomes et mol??cules", 8, true, CURRENT_DATE(), 6);
INSERT INTO COURS VALUES (52, "La Syllicon Valley", 5, true, CURRENT_DATE(), 14);
INSERT INTO COURS VALUES (22, "Etude de texte m??thodologie", 3, false, CURRENT_DATE(), 5);
INSERT INTO COURS VALUES (62, "Conjugaisons au pr??sent", 6, true, CURRENT_DATE(), 8);
INSERT INTO COURS VALUES (63, "Conjugaisons au pass??", 6, true, CURRENT_DATE(), 10);
INSERT INTO COURS VALUES (32, "Programmation orient??e objet", 7, false, CURRENT_DATE(), 12);
INSERT INTO COURS VALUES (33, "Textures", 1, true, CURRENT_DATE(), 2);

INSERT INTO COURSSIMPLES VALUES (11, "Calcul litt??ral et identites remarquables", 2, true, CURRENT_DATE(), 8, "du calcul avec des lettres oulala ??a fait peur");
INSERT INTO COURSSIMPLES VALUES (31, "Polygones", 1, false, CURRENT_DATE(), 4, "monome aux pluriel");
INSERT INTO COURSSIMPLES VALUES (21, "figures de style", 3, true, CURRENT_DATE(), 2, "clair obscur");
INSERT INTO COURSSIMPLES VALUES (41, "??nergie cin??tique", 4, true, CURRENT_DATE(), 1, "pour vous faire bouger");
INSERT INTO COURSSIMPLES VALUES (51, "Verbes irr??guliers", 5, false, CURRENT_DATE(), 2, "pas tr??s r??gulier tout ??a");
INSERT INTO COURSSIMPLES VALUES (61, "Verbes r??guliers", 6, true, CURRENT_DATE(), 2, "tr??s r??gulier");
INSERT INTO COURSSIMPLES VALUES (12, "th??or??me de pythagore", 2, true, CURRENT_DATE(), 4, "un petit triangle pour le monsieur");
INSERT INTO COURSSIMPLES VALUES (13, "d??riv??es", 2, false, CURRENT_DATE(), 8, "des deltas en veux-tu en voil??");
INSERT INTO COURSSIMPLES VALUES (42, "atomes et mol??cules", 8, true, CURRENT_DATE(), 6, "des toutes petites choses");
INSERT INTO COURSSIMPLES VALUES (52, "La Syllicon Valley", 5, true, CURRENT_DATE(), 14, "la vall??e du sable plat");
INSERT INTO COURSSIMPLES VALUES (22, "Etude de texte m??thodologie", 3, false, CURRENT_DATE(), 5, "FUYEZ PAUVRES FOUS");
INSERT INTO COURSSIMPLES VALUES (62, "Conjugaisons au pr??sent", 6, true, CURRENT_DATE(), 8, "no lo sabes");
INSERT INTO COURSSIMPLES VALUES (63, "Conjugaisons au pass??", 6, true, CURRENT_DATE(), 10, "no lo supiste");
INSERT INTO COURSSIMPLES VALUES (32, "Programmation orient??e objet", 7, false, CURRENT_DATE(), 12, "POOOOOOOOOO");
INSERT INTO COURSSIMPLES VALUES (33, "Textures", 1, true, CURRENT_DATE(), 2, "texels en 2D");


INSERT INTO MATIERE VALUES (1, "Mathematiques");
INSERT INTO MATIERE VALUES (2, "Francais");
INSERT INTO MATIERE VALUES (3, "Informatique");
INSERT INTO MATIERE VALUES (4, "Physique-Chimie");
INSERT INTO MATIERE VALUES (5, "Anglais");
INSERT INTO MATIERE VALUES (6, "Espagnol");


INSERT INTO MATIERECOURS VALUES (1, 11, 1);
INSERT INTO MATIERECOURS VALUES (2, 21, 2);
INSERT INTO MATIERECOURS VALUES (3, 31, 3);
INSERT INTO MATIERECOURS VALUES (4, 41, 4);
INSERT INTO MATIERECOURS VALUES (5, 51, 5);
INSERT INTO MATIERECOURS VALUES (6, 61, 6);
INSERT INTO MATIERECOURS VALUES (7, 12, 1);
INSERT INTO MATIERECOURS VALUES (8, 13, 1);
INSERT INTO MATIERECOURS VALUES (9, 42, 4);
INSERT INTO MATIERECOURS VALUES (10, 52, 5);
INSERT INTO MATIERECOURS VALUES (11, 22, 2);
INSERT INTO MATIERECOURS VALUES (12, 62, 6);
INSERT INTO MATIERECOURS VALUES (13, 63, 6);
INSERT INTO MATIERECOURS VALUES (14, 32, 3);
INSERT INTO MATIERECOURS VALUES (15, 33, 3);


-- INSERT INTO QCM VALUES (1, "Evaluation niveau math??matiques", "Facile", 1);
-- INSERT INTO QCM VALUES (2, "Evaluation niveau francais", "Facile", 2);
-- INSERT INTO QCM VALUES (3, "Evaluation niveau informatique", "Facile", 3);
-- INSERT INTO QCM VALUES (4, "Evaluation niveau physique-chimie", "Facile", 4);
-- INSERT INTO QCM VALUES (5, "Evaluation niveau anglais", "Facile", 5);
-- INSERT INTO QCM VALUES (6, "Evaluation niveau espagnol", "Facile", 6);

INSERT INTO QCM VALUES (7, "Validation cours calcul litt??ral et identites remarquables", "Moyen", 11);
INSERT INTO QCM VALUES (8, "Validation cours figures de style", "Moyen", 21);
INSERT INTO QCM VALUES (9, "Validation cours Polygones", "Difficile", 31);
INSERT INTO QCM VALUES (10, "Validation cours ??nergie cin??tique", "Facile", 41);
INSERT INTO QCM VALUES (11, "Validation cours Verbes irr??guliers", "Facile", 51);
INSERT INTO QCM VALUES (12, "Validation cours Verbes r??guliers", "Facile", 61);
INSERT INTO QCM VALUES (13, "Validation cours th??or??me de pythagore", "Facile", 12);
INSERT INTO QCM VALUES (14, "Validation cours d??riv??es", "Moyen", 13);
INSERT INTO QCM VALUES (15, "Validation cours atomes et mol??cules", "Moyen", 42);
INSERT INTO QCM VALUES (16, "Validation cours La Syllicon Valley", "Facile", 52);
INSERT INTO QCM VALUES (17, "Validation cours Etude de texte m??thodologie", "Facile", 22);
INSERT INTO QCM VALUES (18, "Validation cours Conjugaisons au pr??sent", "Facile", 62);
INSERT INTO QCM VALUES (19, "Validation cours Conjugaisons au pass??", "Difficile", 63);
INSERT INTO QCM VALUES (20, "Validation cours Programmation orient??e objet", "Moyen", 32);
INSERT INTO QCM VALUES (21, "Validation cours Textures", "Facile", 33);

 -- modification Thomas


-- INSERT INTO QUESTIONSQCM VALUES (1, 1, "facile", "Pourquoi?");
-- INSERT INTO QUESTIONSQCM VALUES (2, 2, "facile", "Donnez la premi??re couleur du drapeau fran??ais.");
-- INSERT INTO QUESTIONSQCM VALUES (3, 3, "moyen", "Donnez la couleur du soleil");
-- INSERT INTO QUESTIONSQCM VALUES (4, 3, "difficile", "Quelle est la temp??rature du soleil");
-- INSERT INTO QUESTIONSQCM VALUES (5, 4, "facile", "quelle est la diff??rence entre poids et masse ?");
-- INSERT INTO QUESTIONSQCM VALUES (6, 5, "difficile", "S??lectionner les phrases ?? la forme indirecte :");
-- INSERT INTO QUESTIONSQCM VALUES (7, 6, "difficile", "Que veut dire 'empezar' en espagnol ?");
INSERT INTO QUESTIONSQCM VALUES (8, 7, "moyen", "Lorsque l???on d??veloppe et r??duit l???expression E=(3a+2)(5a-4), on obtient :");
INSERT INTO QUESTIONSQCM VALUES (9, 7, "moyen", "Lorsque l???on d??veloppe et r??duit l???expression D=-4a(2a-7), on obtient :");
INSERT INTO QUESTIONSQCM VALUES (10, 7, "difficile", "Lorsque l???on d??veloppe ?? l???aide d???une identit?? remarquable l???expression J=(t-7)^2, on obtient :");


-- INSERT INTO REPONSESQCM VALUES (1, 1, "Parce que", true);
-- INSERT INTO REPONSESQCM VALUES (2, 2, "Rouge", false);
-- INSERT INTO REPONSESQCM VALUES (3, 3, "Jaune", false);
-- INSERT INTO REPONSESQCM VALUES (4, 4, "100000", false);
-- INSERT INTO REPONSESQCM VALUES (5, 5, "I like cats", false);
-- INSERT INTO REPONSESQCM VALUES (6, 6, "Aller", false);
-- INSERT INTO REPONSESQCM VALUES (7, 1, "Pourquoi pas ?", false);
-- INSERT INTO REPONSESQCM VALUES (8, 2, "Bleu", true);
-- INSERT INTO REPONSESQCM VALUES (9, 3, "Blanc", true);
-- INSERT INTO REPONSESQCM VALUES (10, 5, "Cats are loved by me", true);
-- INSERT INTO REPONSESQCM VALUES (11, 6, "Commencer", true);
INSERT INTO REPONSESQCM VALUES (12, 8, "-5a^2", false);
INSERT INTO REPONSESQCM VALUES (13, 8, "15a^2-2a-8", true);
INSERT INTO REPONSESQCM VALUES (14, 8, "15a^2-8", false);
INSERT INTO REPONSESQCM VALUES (15, 9, "-8a-7", false);
INSERT INTO REPONSESQCM VALUES (16, 9, "20a", false);
INSERT INTO REPONSESQCM VALUES (17, 9, "-8a^2+28a", true);
INSERT INTO REPONSESQCM VALUES (18, 10, "t^2-49", false);
INSERT INTO REPONSESQCM VALUES (19, 10, "t^2-14t-49", true);
INSERT INTO REPONSESQCM VALUES (20, 10, "t^2-14t+49", false);
--
--
INSERT INTO SUIT VALUES (1, 11);
INSERT INTO SUIT VALUES (1, 12);
INSERT INTO SUIT VALUES (1, 13);
INSERT INTO SUIT VALUES (2, 21);
INSERT INTO SUIT VALUES (2, 22);
INSERT INTO SUIT VALUES (3, 11);
INSERT INTO SUIT VALUES (3, 21);
INSERT INTO SUIT VALUES (4, 51);
INSERT INTO SUIT VALUES (4, 52);
INSERT INTO SUIT VALUES (4, 61);
INSERT INTO SUIT VALUES (4, 62);
INSERT INTO SUIT VALUES (4, 63);
INSERT INTO SUIT VALUES (5, 32);
INSERT INTO SUIT VALUES (6, 11);
INSERT INTO SUIT VALUES (6, 12);
INSERT INTO SUIT VALUES (6, 13);
INSERT INTO SUIT VALUES (6, 31);
INSERT INTO SUIT VALUES (6, 32);
INSERT INTO SUIT VALUES (6, 33);
INSERT INTO SUIT VALUES (7, 21);
INSERT INTO SUIT VALUES (7, 22);
INSERT INTO SUIT VALUES (8, 21);
INSERT INTO SUIT VALUES (8, 22);


INSERT INTO TYPEMATERIEL VALUES (1, "Texte");
INSERT INTO TYPEMATERIEL VALUES (2, "Vid??o");
INSERT INTO TYPEMATERIEL VALUES (3, "Diaporama");
INSERT INTO TYPEMATERIEL VALUES (4, "Audio");
INSERT INTO TYPEMATERIEL VALUES (5, "Image");


INSERT INTO MATERIELPEDA VALUES (1, 11, 1, "text1.txt", 1);
INSERT INTO MATERIELPEDA VALUES (2, 11, 1, "text2.txt", 2);
INSERT INTO MATERIELPEDA VALUES (3, 21, 1, "text3.txt", 1);
INSERT INTO MATERIELPEDA VALUES (4, 12, 1, "text4.txt", 1);
INSERT INTO MATERIELPEDA VALUES (5, 11, 1, "text5.txt", 3);


INSERT INTO SUJETFORUM VALUES (1, "Calcul identit?? remarquable", "Comment calculer mes identit??s remarquables svp ?", 11, 1, 1, CURRENT_DATE());
INSERT INTO SUJETFORUM VALUES (2, "Probl??me de conjugaison ", "Je voudrais simplement savoir quelle est la conjugaison que je dois employer dans cette phrase: 'En Espa??a, aunque el gobierno dijo que ??? [reducir] el costo de las protecciones, nada cambi??.'", 62, 6, 4, CURRENT_DATE());

INSERT INTO REPONSEFORUM VALUES (1, "Aucune id??e mec", 1, 2, CURRENT_DATE());
INSERT INTO REPONSEFORUM VALUES (2, "T'as qu'?? faire ??a mec...", 1, 3, CURRENT_DATE());
INSERT INTO REPONSEFORUM VALUES (3, "Bonsoir, indicatif pass?? simple ---> subjonctif imparfait donc : Dijo que = reducir =subjonctif imparfait.", 2, 7, CURRENT_DATE());
INSERT INTO REPONSEFORUM VALUES (4, "Le temps de la conjugaison du verbe 'reducir' est tributaire de 'bien que' (en se r??f??rant ?? la phrase fran??aise comme phrase d'origine) , puis il faut appliquer la concordance des temps au verbe 'cambiar', donc ?? vous de voir.", 2, 6, CURRENT_DATE());
