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

CREATE TABLE COURS(
  idCours INT PRIMARY KEY NOT NULL,
  intituleCours VARCHAR(40) UNIQUE,
  professeur INT,
  accepte BOOL DEFAULT FALSE,
  dateAjout DATE,
  dureeEstimee int,
  FOREIGN KEY (professeur) REFERENCES PROFESSEUR(idProf)
  );
  
CREATE TABLE PROFESSEUR(
  idProf INT PRIMARY KEY NOT NULL,
  nom VARCHAR(40),
  prenom VARCHAR(40),
  login VARCHAR(20),
  mdp VARCHAR(20)
  );
  
CREATE TABLE APPRENANT(
  idAppr INT PRIMARY KEY NOT NULL,
  nom VARCHAR(40),
  prenom VARCHAR(40),
  login VARCHAR(20),
  mdp VARCHAR(20),
  actif BOOL DEFAULT FALSE,
  dateInscription DATE,
  dateDerniereCo Date
  );
  
CREATE TABLE SUIT(
  cours INT NOT NULL,
  apprenant INT NOT NULL,
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
  cours VARCHAR(32),
  matiere VARCHAR(32),
  FOREIGN KEY (cours) REFERENCES COURS(intituleCours),
  FOREIGN KEY (matiere) REFERENCES MATIERE(intituleMatiere)
);

CREATE TABLE QCM(
  idQCM INT PRIMARY KEY,
  intituleQCM VARCHAR(32),
  difficulte VARCHAR(32),
  matiere VARCHAR(32),
  FOREIGN KEY (matiere) REFERENCES MATIERE(intituleMatiere)
);
  
CREATE TABLE QUESTIONSQCM(
  idQuestionsQCM INT PRIMARY KEY,
  nomQCM VARCHAR(32),
  difficulte VARCHAR(32),
  textQuestion VARCHAR(64),
  FOREIGN KEY (nomQCM) REFERENCES QCM(intituleQCM)
);

CREATE TABLE REPONSESQCM(
  idReponsesQCM INT PRIMARY KEY,
  question VARCHAR(32),
  textReponse VARCHAR(64),
  estJuste BOOL(64),
  FOREIGN KEY (question) REFERENCES QUESTIONSQCM(textQuestion)
);
  
INSERT INTO COURS VALUES (11, "identites remarquables", 123, true, TO_DATE('17/12/2015', 'DD/MM/YYYY'), 2);
INSERT INTO COURS VALUES (12, "polygones", 123, false, TO_DATE('17/12/2015', 'DD/MM/YYYY'), 3);
INSERT INTO COURS VALUES (21, "figures de style", true, TO_DATE('17/12/2015', 'DD/MM/YYYY'), 3);

INSERT INTO MATIERECOURS VALUES (1, "identites remarquables", "Mathematiques");
INSERT INTO MATIERECOURS VALUES (2, "polygones", "Mathematiques");
INSERT INTO MATIERECOURS VALUES (3, "figures de style", "Francais");

INSERT INTO MATIERE VALUES (1, "Mathematiques");
INSERT INTO MATIERE VALUES (2, "Francais");
INSERT INTO MATIERE VALUES (3, "Informatique");

INSERT INTO QCM VALUES (1, "qcm1", "facile", "Francais");
INSERT INTO QCM VALUES (2, "qcm2", "facile", "Francais");
INSERT INTO QCM VALUES (3, "qcm3", "Difficile", "Francais");
INSERT INTO QCM VALUES (4, "qcm4", "Facile", "Mathematiques");
INSERT INTO QCM VALUES (5, "qcm5", "Facile", "Mathematiques");

INSERT INTO QUESTIONSQCM VALUES (1, "qcm1", "facile", "Pourquoi?");
INSERT INTO QUESTIONSQCM VALUES (2, "qcm2", "facile", "donnez la première couleur du drapeau français.");
INSERT INTO QUESTIONSQCM VALUES (3, "qcm2", "moyen", "donnez la couleur du soleil");
INSERT INTO QUESTIONSQCM VALUES (4, "qcm3", "difficile", "quelle est la température du soleil");

INSERT INTO REPONSESQCM VALUES (1, 1, "Parce que", true);
INSERT INTO REPONSESQCM VALUES (2, 2, "rouge", false);
INSERT INTO REPONSESQCM VALUES (3, 3, "jaune", true);
INSERT INTO REPONSESQCM VALUES (4, 4, "100000", false);
  
INSERT INTO PROFESSEUR VALUES (1, "Michelucci", "Dominique", "micdom", "dommic");
INSERT INTO PROFESSEUR VALUES (2, "Abrouk", "Lylia", "ablil", "lilab");
INSERT INTO PROFESSEUR VALUES (3, "Gentil", "Christian", "genchris", "chrisgen");

INSERT INTO APPRENANT VALUES (1, "Girard", "Quentin", "girquen", "quengir", true, TO_DATE('17/12/2015', 'DD/MM/YYYY'), TO_DATE('17/12/2015', 'DD/MM/YYYY'));
INSERT INTO APPRENANT VALUES (2, "Girard", "Henry", "girhen", "hengir", true, TO_DATE('17/12/2015', 'DD/MM/YYYY'), TO_DATE('17/12/2015', 'DD/MM/YYYY'));
INSERT INTO APPRENANT VALUES (3, "Desbois", "Nicolas", "desnic", "nicdes", true, TO_DATE('17/12/2015', 'DD/MM/YYYY'), TO_DATE('17/12/2015', 'DD/MM/YYYY')); 

INSERT INTO SUIT VALUES (1, 11);
INSERT INTO SUIT VALUES (1, 12);
INSERT INTO SUIT VALUES (2, 21);
INSERT INTO SUIT VALUES (3, 11);
INSERT INTO SUIT VALUES (3, 21);
  
INSERT INTO MATERIELPEDA VALUES (1, 11, 3, "....", 1);
INSERT INTO MATERIELPEDA VALUES (2, 11, 2, "....", 2);
INSERT INTO MATERIELPEDA VALUES (3, 21, 1, "....", 1);
INSERT INTO MATERIELPEDA VALUES (4, 12, 1, "....", 1);
INSERT INTO MATERIELPEDA VALUES (5, 11, 2, "....", 3);

INSERT INTO TYPEMATERIEL VALUES (1, "Texte");
INSERT INTO TYPEMATERIEL VALUES (2, "Vidéo");
INSERT INTO TYPEMATERIEL VALUES (3, "Diaporama");

INSERT INTO SUJETFORUM VALUES (1, "Calcul identité remarquable", "Comment calculer mes identités remarquables svp ?", 11, 1, 1, TO_DATE('17/12/2015', 'DD/MM/YYYY');
                               
INSERT INTO REPONSEFORUM VALUES (1, "Aucune idée mec", 1, 2, TO_DATE('17/12/2015', 'DD/MM/YYYY'));
INSERT INTO REPONSEFORUM VALUES (2, "T'as qu'à faire ça mec...", 1, 3, TO_DATE('17/12/2015', 'DD/MM/YYYY'));