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
    UNIQUE KEY unique_securite (securitesociale),
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
    UNIQUE KEY unique_rdv_medecin (date_rdv, heure_debut, id_medecin),
    UNIQUE KEY unique_rdv_usager (date_rdv, heure_debut, id_usager),
    FOREIGN KEY (id_medecin) REFERENCES medecin (id),
    FOREIGN KEY (id_usager) REFERENCES usager (id)
);
COMMIT;

INSERT INTO individu(nom, prenom, civilite)
VALUES ('Doe', 'John', 'M'),
       ('Doe', 'Jane', 'Mme'),
       ('Doe', 'Jack', 'M'),
       ('Sofia', 'kartoshka', 'Mme'),
       ('Dupont', 'Jean', 'M'),
       ('Martin', 'Sophie', 'Mme'),
       ('Lefevre', 'Pierre', 'M'),
       ('Dubois', 'Marie', 'Mme'),
       ('Moreau', 'Paul', 'M');
;


INSERT INTO medecin(id_individu)
VALUES (1),
       (3),
       (4),
       (5);


INSERT INTO usager(adresse, datenaissance, lieunaissance, securitesociale, id_medecin, id_individu)
VALUES ('2 rue de la paix', '1990-01-01', 'Paris', '1234567890124', NULL, 8),
       ('10 Rue de la Liberté', '1980-05-15', 'Paris', '1234567890123', 1, 2),
       ('25 Avenue des Roses', '1992-08-22', 'Lyon', '9876543210987', 2, 9),
       ('8 Rue du Chêne', '1975-12-10', 'Marseille', '4567890123456', 3, 7),
       ('15 Boulevard de la Plage', '1988-03-27', 'Nice', '7890123456789', NULL, 6),
       ('5 Rue de la Paix', '1995-06-18', 'Toulouse', '2345678901234', NULL, 5);


INSERT INTO rendezvous(date_rdv, heure_debut, dureeminutes, id_medecin, id_usager)
VALUES ('2019-01-01', '10:00:00', 30, 1, 2),
       ('2019-01-01', '10:30:00', 30, 2, 2),
       ('2019-01-02', '11:00:00', 30, 1, 1);

