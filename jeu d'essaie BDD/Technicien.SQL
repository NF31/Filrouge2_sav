-- Supprimer la base de données SAV si elle existe déjà
DROP DATABASE IF EXISTS SAV;
-- Créer la base de données SAV
CREATE DATABASE SAV;
USE SAV;
-- Création de la table techniciens
CREATE TABLE techniciens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    poste ENUM('SAV', 'Hotline'),
    email VARCHAR(255),
    motdepasse VARCHAR(255)
);

-- Insertion des données d'essai dans la table techniciens
INSERT INTO
    techniciens (nom, prenom, poste, email, motdepasse)
VALUES
    (
        'Dupont',
        'Jean',
        'Hotline',
        'jean.dupont@example.com',
        'mdpJean123'
    ),
    (
        'Martin',
        'Paul',
        'Hotline',
        'paul.martin@example.com',
        'mdpPaul456'
    ),
    (
        'Dubois',
        'Marie',
        'Hotline',
        'marie.dubois@example.com',
        'mdpMarie789'
    ),
    (
        'Leclerc',
        'Pierre',
        'Hotline',
        'pierre.leclerc@example.com',
        'mdpPierre987'
    ),
    (
        'Lefebvre',
        'Sophie',
        'Hotline',
        'sophie.lefebvre@example.com',
        'mdpSophie654'
    ),
    (
        'Moreau',
        'Luc',
        'Hotline',
        'luc.moreau@example.com',
        'mdpLuc321'
    ),
    (
        'Roux',
        'Emilie',
        'Hotline',
        'emilie.roux@example.com',
        'mdpEmilie234'
    ),
    (
        'Garcia',
        'Thomas',
        'SAV',
        'thomas.garcia@example.com',
        'mdpThomas567'
    ),
    (
        'Fournier',
        'Julie',
        'SAV',
        'julie.fournier@example.com',
        'mdpJulie890'
    );

