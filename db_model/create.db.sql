CREATE TABLE Individu(
                         Id_Individu COUNTER,
                         nom VARCHAR(50),
                         prenom VARCHAR(50),
                         civilite VARCHAR(50),
                         PRIMARY KEY(Id_Individu)
);

CREATE TABLE Médecin(
                        Id COUNTER,
                        Id_Individu INT NOT NULL,
                        PRIMARY KEY(Id),
                        FOREIGN KEY(Id_Individu) REFERENCES Individu(Id_Individu)
);

CREATE TABLE Usager(
                       Id_Usager COUNTER,
                       adresse VARCHAR(50),
                       dateNaissance DATE,
                       lieuNaissance VARCHAR(50),
                       securiteSociale VARCHAR(13),
                       Id INT NOT NULL,
                       Id_Individu INT NOT NULL,
                       PRIMARY KEY(Id_Usager),
                       FOREIGN KEY(Id) REFERENCES Médecin(Id),
                       FOREIGN KEY(Id_Individu) REFERENCES Individu(Id_Individu)
);

CREATE TABLE RendezVous(
                           Id_RendezVous COUNTER,
                           dateHeureRDV DATETIME,
                           dureeMinutes INT,
                           Id INT NOT NULL,
                           Id_Usager INT NOT NULL,
                           PRIMARY KEY(Id_RendezVous),
                           FOREIGN KEY(Id) REFERENCES Médecin(Id),
                           FOREIGN KEY(Id_Usager) REFERENCES Usager(Id_Usager)
);
