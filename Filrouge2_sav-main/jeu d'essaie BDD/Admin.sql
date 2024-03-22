CREATE TABLE administrateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(255),
    motdepasse VARCHAR(255)
);

ALTER TABLE administrateur
ADD COLUMN poste VARCHAR(50) DEFAULT 'admin' NOT NULL;


INSERT INTO administrateur (nom, prenom, email, motdepasse, poste)
VALUES ('Admin', 'JEFI', 'JEFI@admin.com', 'mdpAdmin', 'admin');


GRANT
SELECT
,
INSERT
,
UPDATE
,
    DELETE ON SAV.techniciens TO 'root' @'localhost';