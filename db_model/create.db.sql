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
    dateheurerdv DATETIME,
    dureeminutes INT,
    id_medecin   INT NOT NULL,
    id_usager    INT NOT NULL,
    PRIMARY KEY (id),
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

INSERT INTO medecin(id_individu)
VALUES (1);

INSERT INTO usager(adresse, datenaissance, lieunaissance, securitesociale, id_medecin, id_individu)
VALUES ('1 rue de la paix', '1990-01-01', 'Paris', '1234567890123', 1, 2);

INSERT INTO usager(adresse, datenaissance, lieunaissance, securitesociale, id_medecin, id_individu)
VALUES ('2 rue de la paix', '1990-01-01', 'Paris', '1234567890123', NULL, 3);

INSERT INTO rendezvous(dateheurerdv, dureeminutes, id_medecin, id_usager)
VALUES ('01/01/2024 10:00:00', 30, 1, 2);