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

CREATE TABLE IF NOT EXISTS login (
    id       INT AUTO_INCREMENT,
    username VARCHAR(50),
    password VARCHAR(50),
    PRIMARY KEY (id)
);

INSERT INTO login(username, password)
VALUES ('admin', 'admin');

INSERT INTO individu(nom, prenom, civilite)
VALUES ('Doe', 'John', 'M'),
       ('Doe', 'Jane', 'Mme'),
       ('Doe', 'Jack', 'M'),
       ('Sofia', 'kartoshka', 'Mme'),
       ('Dupont', 'Jean', 'M'),
       ('Martin', 'Sophie', 'Mme'),
       ('Lefevre', 'Pierre', 'M'),
       ('Dubois', 'Marie', 'Mme'),
       ('Moreau', 'Paul', 'M'),
       ('Girard', 'Julie', 'Mme'),
       ('Smith', 'Michael', 'M'),
       ('Johnson', 'Emily', 'Mme'),
       ('Brown', 'David', 'M'),
       ('Taylor', 'Olivia', 'Mme'),
       ('Anderson', 'Daniel', 'M'),
       ('Thomas', 'Sophia', 'Mme'),
       ('Wilson', 'Matthew', 'M'),
       ('Clark', 'Emma', 'Mme'),
       ('Walker', 'Andrew', 'M'),
       ('Hall', 'Isabella', 'Mme'),
       ('Adams', 'William', 'M'),
       ('Adams', 'Sophia', 'Mme'),
       ('Baker', 'Edward', 'M'),
       ('Baker', 'Ella', 'Mme'),
       ('White', 'George', 'M'),
       ('White', 'Grace', 'Mme'),
       ('Miller', 'Christopher', 'M'),
       ('Miller', 'Emily', 'Mme'),
       ('Jones', 'Samuel', 'M'),
       ('Jones', 'Sophie', 'Mme'),
       ('Davis', 'Jonathan', 'M'),
       ('Davis', 'Alice', 'Mme'),
       ('Wilson', 'Robert', 'M');



INSERT INTO medecin(id_individu)
VALUES (1),
       (2),
       (3),
       (4),
       (5),
       (6),
       (7),
       (8),
       (9),
       (10),
       (11),
       (12),
       (13),
       (14),
       (15),
       (16);


INSERT INTO usager(adresse, datenaissance, securitesociale, id_medecin, id_individu)
VALUES ('2 rue de la paix', '1960-01-01', '1234567890124', NULL, 17),
       ('10 Rue de la Liberté', '2000-05-15', '1234567890123', 1, 18),
       ('25 Avenue des Roses', '1992-08-22', '9876543210987', 2, 19),
       ('8 Rue du Chêne', '1975-12-10', '4567890123456', 3, 20),
       ('15 Boulevard de la Plage', '1988-03-27', '7890123456789', NULL, 21),
       ('5 Rue de la Paix', '1995-06-18', '2345678901234', NULL, 22),
       ('4 Rue de la Paix', '1987-10-08', '1234567890125', NULL, 23),
       ('18 Rue de la Liberté', '1994-03-20', '1234567890126', 7, 24),
       ('28 Avenue des Roses', '1983-06-14', '9876543210988', 9, 25),
       ('14 Rue du Chêne', '1971-09-30', '4567890123457', 11, 26),
       ('21 Boulevard de la Plage', '1990-12-05', '7890123456780', NULL, 27),
       ('3 Rue de la Paix', '1986-02-18', '2345678901235', NULL, 28),
       ('8 Rue de la Liberté', '1992-05-01', '3456789012346', 6, 29),
       ('22 Avenue des Roses', '1977-08-17', '8765432109877', 8, 30),
       ('10 Rue du Chêne', '1984-01-23', '5678901234568', 10, 31),
       ('25 Boulevard de la Plage', '1996-04-12', '8901234567891', NULL, 32),
       ('6 Rue de la Paix', '1979-07-29', '3456709012346', NULL, 33);


INSERT INTO rendezvous(date_rdv, heure_debut, dureeminutes, id_medecin, id_usager)
VALUES ('2019-01-01', '10:00:00', 30, 1, 2),
       ('2019-01-01', '10:30:00', 30, 2, 2),
       ('2019-01-02', '11:00:00', 30, 1, 1),
       ('2020-03-15', '09:00:00', 30, 1, 2),
       ('2022-03-18', '14:30:00', 45, 3, 4),
       ('2024-03-20', '11:15:00', 60, 4, 6),
       ('2023-03-22', '16:00:00', 30, 2, 4),
       ('2024-03-25', '10:45:00', 45, 4, 3),
       ('2024-03-28', '15:30:00', 60, 1, 1),
       ('2024-03-30', '13:00:00', 30, 3, 3),
       ('2024-04-02', '08:45:00', 45, 1, 5),
       ('2024-04-05', '14:15:00', 60, 2, 1),
       ('2022-04-08', '12:30:00', 30, 4, 3),
       ('2024-04-10', '10:30:00', 45, 3, 1),
       ('2024-04-12', '15:45:00', 60, 1, 4),
       ('2024-04-15', '13:15:00', 30, 3, 6),
       ('2024-04-18', '11:00:00', 45, 2, 4),
       ('2024-04-20', '09:30:00', 60, 4, 2),
       ('2021-04-23', '14:00:00', 30, 1, 3),
       ('2024-04-26', '12:15:00', 45, 3, 5),
       ('2024-04-29', '16:30:00', 60, 4, 1),
       ('2020-05-02', '08:00:00', 30, 2, 6),
       ('2024-05-05', '14:45:00', 45, 4, 1),
       ('2024-05-08', '12:00:00', 30, 3, 2),
       ('2024-05-11', '10:15:00', 45, 1, 4),
       ('2024-05-14', '15:30:00', 60, 2, 3),
       ('2024-05-17', '13:45:00', 30, 4, 5),
       ('2024-05-20', '11:00:00', 45, 3, 6),
       ('2024-05-23', '09:15:00', 60, 1, 5),
       ('2024-05-26', '14:30:00', 30, 3, 1),
       ('2024-05-29', '12:45:00', 45, 4, 2),
       ('2024-06-01', '17:00:00', 60, 2, 4),
       ('2024-06-04', '15:15:00', 30, 1, 6),
       ('2024-06-07', '13:30:00', 45, 3, 3),
       ('2024-06-10', '11:45:00', 60, 4, 1),
       ('2024-06-13', '10:00:00', 30, 2, 2),
       ('2024-06-16', '08:15:00', 45, 1, 4),
       ('2024-06-19', '13:30:00', 60, 2, 3),
       ('2024-06-22', '11:45:00', 30, 4, 5),
       ('2024-06-25', '10:00:00', 45, 3, 6),
       ('2024-06-28', '08:15:00', 60, 1, 5),
       ('2024-07-01', '13:30:00', 30, 3, 1),
       ('2024-07-04', '11:45:00', 45, 4, 2),
       ('2024-07-07', '10:00:00', 60, 2, 4),
       ('2024-07-10', '08:15:00', 30, 1, 6),
       ('2024-07-13', '13:30:00', 45, 3, 3),
       ('2024-07-16', '11:45:00', 60, 4, 1),
       ('2024-07-19', '10:00:00', 30, 2, 2),
       ('2024-07-22', '08:15:00', 45, 1, 4),
       ('2024-07-25', '13:30:00', 60, 2, 3),
       ('2024-07-28', '11:45:00', 30, 4, 5),
       ('2024-07-31', '10:00:00', 45, 3, 6),
       ('2024-08-03', '08:15:00', 60, 1, 5),
       ('2024-08-06', '13:30:00', 30, 3, 1),
       ('2024-08-09', '11:45:00', 45, 4, 2),
       ('2024-08-12', '10:00:00', 60, 2, 4),
       ('2024-08-15', '08:15:00', 30, 1, 6),
       ('2024-08-18', '13:30:00', 45, 3, 3),
       ('2024-08-21', '11:45:00', 60, 4, 1),
       ('2024-08-24', '10:00:00', 30, 2, 2),
       ('2024-08-27', '08:15:00', 45, 1, 4),
       ('2024-08-30', '13:30:00', 60, 2, 3),
       ('2024-09-02', '11:45:00', 30, 4, 5),
       ('2024-09-05', '10:00:00', 45, 3, 6),
       ('2024-09-08', '08:15:00', 60, 1, 5),
       ('2024-09-11', '13:30:00', 30, 3, 1),
       ('2024-09-14', '11:45:00', 45, 4, 2),
       ('2024-09-17', '10:00:00', 60, 2, 4),
       ('2024-09-20', '08:15:00', 30, 1, 6);
