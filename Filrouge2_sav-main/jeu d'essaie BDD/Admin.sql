CREATE TABLE administrateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(255),
    motdepasse VARCHAR(255)
);

INSERT INTO
    administrateur (nom, prenom, email, motdepasse)
VALUES
    ('Admin', 'JEFI', 'JEFI@admin.com', 'mdpAdmin');

GRANT
SELECT
,
INSERT
,
UPDATE
,
    DELETE ON SAV.techniciens TO 'root' @'localhost';