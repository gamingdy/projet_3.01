CREATE TABLE IF NOT EXISTS individu (
    id       INT AUTO_INCREMENT,
    nom      VARCHAR(50),
    prenom   VARCHAR(50),
    civilite VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS medecin (
    id          INT AUTO_INCREMENT,
    id_individu INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_individu) REFERENCES individu (id)
);

CREATE TABLE IF NOT EXISTS usager (
    id              INT AUTO_INCREMENT,
    adresse         VARCHAR(50),
    datenaissance   DATE,
    lieunaissance   VARCHAR(50),
    securitesociale VARCHAR(13),
    id_medecin      INT,
    id_individu     INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_medecin) REFERENCES medecin (id),
    FOREIGN KEY (id_individu) REFERENCES individu (id)
);

CREATE TABLE IF NOT EXISTS rendezvous (
    id           INT AUTO_INCREMENT,
    date_rdv     DATE,
    heure_debut  TIME,
    dureeminutes INT,
    id_medecin   INT NOT NULL,
    id_usager    INT NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY unique_rdv (date_rdv, heure_debut, id_medecin, id_usager),
    FOREIGN KEY (id_medecin) REFERENCES medecin (id),
    FOREIGN KEY (id_usager) REFERENCES usager (id)
);
COMMIT;

INSERT INTO individu(nom, prenom, civilite)
VALUES ('Doe', 'John', 'M');

INSERT INTO individu(nom, prenom, civilite)
VALUES ('Doe', 'Jane', 'Mme');

INSERT INTO individu(nom, prenom, civilite)
VALUES ('Doe', 'Jack', 'M');

INSERT INTO individu(nom, prenom, civilite)
VALUES ('Sofia', 'kartoshka', 'Mme');

INSERT INTO medecin(id_individu)
VALUES (1);

INSERT INTO medecin(id_individu)
VALUES (4);

INSERT INTO usager(adresse, datenaissance, lieunaissance, securitesociale, id_medecin, id_individu)
VALUES ('1 rue de la paix', '1990-01-01', 'Paris', '1234567890123', 1, 2);

INSERT INTO usager(adresse, datenaissance, lieunaissance, securitesociale, id_medecin, id_individu)
VALUES ('2 rue de la paix', '1990-01-01', 'Paris', '1234567890123', NULL, 3);

INSERT INTO rendezvous(date_rdv, heure_debut, dureeminutes, id_medecin, id_usager)
VALUES ('2019-01-01', '10:00:00', 30, 1, 2);

INSERT INTO rendezvous(date_rdv, heure_debut, dureeminutes, id_medecin, id_usager)
VALUES ('2019-01-01', '10:30:00', 30, 2, 2);

INSERT INTO rendezvous(date_rdv, heure_debut, dureeminutes, id_medecin, id_usager)
VALUES ('2019-01-02', '11:00:00', 30, 1, 1);