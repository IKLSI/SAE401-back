DROP TABLE IF EXISTS EtuSemestre CASCADE;
DROP TABLE IF EXISTS EtuComp CASCADE;
DROP TABLE IF EXISTS EtuModule CASCADE;
DROP TABLE IF EXISTS Avis CASCADE;
DROP TABLE IF EXISTS Etudiant CASCADE;
DROP TABLE IF EXISTS Semestre CASCADE;
DROP TABLE IF EXISTS Annee CASCADE;
DROP TABLE IF EXISTS Coefficient CASCADE;
DROP TABLE IF EXISTS Competence CASCADE;
DROP TABLE IF EXISTS Module CASCADE;
DROP TABLE IF EXISTS Utilisateur CASCADE;
DROP TABLE IF EXISTS Fichier CASCADE;

CREATE TABLE Etudiant
(
    id_etu int,
    code_etu VARCHAR(10),
    nom_etu VARCHAR(30),
    prenom_etu VARCHAR(30),
    groupe_TD VARCHAR(10),
    groupe_TP VARCHAR(10),
    cursus VARCHAR(30),
    alternant BOOLEAN,
    PRIMARY KEY (id_etu)
);

CREATE TABLE Annee 
(
    id_annee SERIAL,
    annee VARCHAR(9),
    PRIMARY KEY (id_annee)
);

CREATE TABLE Semestre
(
    id_semestre SERIAL,
    label VARCHAR(12),
    id_annee int,
    PRIMARY KEY (id_semestre),
    FOREIGN KEY (id_annee) REFERENCES Annee(id_annee)
);

CREATE TABLE Competence 
(
    id_comp SERIAL,
    id_semestre int,
    label VARCHAR(50),
    PRIMARY KEY (id_comp),
    FOREIGN KEY (id_semestre) REFERENCES Semestre(id_semestre)
);

CREATE TABLE Module
(
    id_module SERIAL,
    label VARCHAR(50),
    PRIMARY KEY (id_module)
);

CREATE TABLE Coefficient 
(
    id_coef SERIAL,
    id_comp int,
    id_module int,
    coef int,   
    PRIMARY KEY (id_coef),
    FOREIGN KEY (id_comp) REFERENCES Competence(id_comp),
    FOREIGN KEY (id_module) REFERENCES Module(id_module)
);

CREATE TABLE EtuSemestre
(
    id_etu int,
    id_semestre int,
    absences int,
    rang int,
    moyenne float,
    validation VARCHAR(5),
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
    bonus float,
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
    FOREIGN KEY (id_coef) REFERENCES Coefficient(id_coef)
);

CREATE TABLE Avis 
(
    id_avis SERIAL,
    id_etu int,
    avis_master VARCHAR(20),
    avis_inge VARCHAR(20),
    commentaire TEXT,
    PRIMARY KEY (id_avis),
    FOREIGN KEY (id_etu) REFERENCES Etudiant(id_etu)
);

CREATE TABLE Utilisateur 
(
    id_user SERIAL,
    login_user VARCHAR(50),
    password_user VARCHAR(65),
    isAdmin BOOLEAN,
	uuid_user VARCHAR(36),
    PRIMARY KEY (id_user)
);

CREATE TABlE Fichier
(
    id_fichier SERIAL,
    nom_fichier TEXT,
    type VARCHAR(30),
    id_annee int,
    id_semestre int,
    PRIMARY KEY (id_fichier),
    FOREIGN KEY (id_annee) REFERENCES Annee(id_annee),
    FOREIGN KEY (id_semestre) REFERENCES Semestre(id_semestre)
);


INSERT INTO Annee (annee) VALUES ('2022-2023');
INSERT INTO Utilisateur (login_user, password_user, isAdmin) VALUES ('admin', '$2y$10$VIg4LgZHlt3cXL/spsBpGu4HngYD6Osnj8ox.W75eiFYOrrWv2fhG', true);
INSERT INTO Utilisateur (login_user, password_user, isAdmin) VALUES ('user', '$2y$10$SiFa7utiZPusNgIJ0nx45uikj1vfjvuzVi1s8wCfIcO3iii5kuiF6', false);
