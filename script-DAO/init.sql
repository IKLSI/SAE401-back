DROP TABLE EtuSemestre;
DROP TABLE EtuComp;
DROP TABLE EtuModule;
DROP TABLE Avis;
DROP TABLE Etudiant;
DROP TABLE Semestre;
DROP TABLE Annee;
DROP TABLE Coefficient;
DROP TABLE Competence;
DROP TABLE Module;
DROP TABLE Utilisateur;

CREATE TABLE Etudiant
(
    id_etu int,
    code_etu VARCHAR(10),
    nom_etu VARCHAR(30),
    prenom_etu VARCHAR(30),
    groupe_TD VARCHAR(2),
    groupe_TP VARCHAR(2),
    cursus VARCHAR(30),
    alternant BOOLEAN,
    PRIMARY KEY (id_etu)
);

CREATE TABLE Semestre
(
    id_semestre int,
    annee int,
    PRIMARY KEY (id_semestre),
    FOREIGN KEY (annee) REFERENCES Annee(annee)
);

CREATE TABLE Annee 
(
    id_annee int,
    annee int,
    PRIMARY KEY (id_annee, annee)
);

CREATE TABLE Competence 
(
    id_comp int,
    id_semestre int,
    label VARCHAR(50),
    PRIMARY KEY (id_comp),
    FOREIGN KEY (id_semestre) REFERENCES Semestre(id_semestre)
);

CREATE TABLE Module
(
    id_module int,
    label VARCHAR(50),
    PRIMARY KEY (id_module)
);

CREATE TABLE Coefficient 
(
    id_coef int,
    id_comp int,
    id_module int,
    coef int,   
    PRIMARY KEY (id_coef)
    FOREIGN KEY (id_comp) REFERENCES Competence(id_comp),
    FOREIGN KEY (id_module) REFERENCES Modules(id_module)
);

CREATE TABLE EtuSemestre
(
    id_etu int,
    id_semestre int,
    absences int,
    rang int,
    moyenne float,
    PRIMARY KEY (id_etu, id_semestre),
    FOREIGN KEY (id_etu) REFERENCES Etudiant(id_etu),
    FOREIGN KEY (id_semestre) REFERENCES Semestre(id_semestre)
);

CREATE TABLE EtuComp
(
    id_etu int,
    id_comp int,
    moyenne_comp float,
    passage VARCHAR(10),
    PRIMARY KEY (id_etu, id_comp),
    FOREIGN KEY (id_etu) REFERENCES Etudiant(id_etu),
    FOREIGN KEY (id_comp) REFERENCES Competence(id_comp)
);

CREATE TABLE EtuModule
(
    id_etu int,
    id_coef int,
    note float,
    PRIMARY KEY (id_etu, id_coef),
    FOREIGN KEY (id_etu) REFERENCES Etudiant(id_etu),
    FOREIGN KEY (id_coef) REFERENCES Modules(id_coef)
);

CREATE TABLE Avis 
(
    id_avis int,
    id_etu int,
    avis_master TEXT,
    avis_inge TEXT,
    PRIMARY KEY (id_avis),
    FOREIGN KEY (id_etu) REFERENCES Etudiant(id_etu)
);

CREATE TABLE Utilisateur 
(
    id_user int,
    login_user VARCHAR(50),
    password_user VARCHAR(50),
    isAdmin BOOLEAN,
    PRIMARY KEY (id_user)
);