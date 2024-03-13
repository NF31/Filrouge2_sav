-- -- Supprimer la base de données SAV si elle existe déjà
DROP DATABASE IF EXISTS SAV;

-- -- Créer la base de données SAV
CREATE DATABASE SAV;

-- Création de la table techniciens
CREATE TABLE techniciens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    poste ENUM('SAV', 'Hotline')
);

-- Insertion des données d'essai dans la table techniciens
INSERT INTO techniciens (nom, prenom, poste) VALUES
('Dupont', 'Jean', 'Hotline'),
('Martin', 'Paul', 'Hotline'),
('Dubois', 'Marie', 'Hotline'),
('Leclerc', 'Pierre', 'Hotline'),
('Lefebvre', 'Sophie', 'Hotline'),
('Moreau', 'Luc', 'Hotline'),
('Roux', 'Emilie', 'Hotline'),
('Garcia', 'Thomas', 'SAV'),
('Fournier', 'Julie', 'SAV'),
('Leroy', 'David', 'SAV');
