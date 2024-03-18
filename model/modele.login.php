<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../config/connexion.php');



function login()
{
    $connexion = getBdd();
    $sql = "SELECT * FROM techniciens"; // Requête pour sélectionner tous les enregistrements de la table techniciens
    $requete = $connexion->query($sql);
    if (!$requete) {
        echo "Problème de connexion à la table techniciens";
        return false; // Retourner false en cas d'échec de la requête
    } else {
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat; // Retourner le résultat de la requête
    }
}
//var_dump(login());

function getEmails()
{
    $connexion = getBdd();
    $sql = "SELECT email FROM techniciens";
    $requete = $connexion->query($sql);
    if (!$connexion->query($sql)) {
        echo "problème de connexion à la table techniciens";
    } else {
        $resultat = $requete->fetchAll(PDO::FETCH_COLUMN);
    }

    return $resultat;
}


$emails = getEmails(); // Récupérer toutes les adresses email depuis la base de données


foreach ($emails as $email) {
    echo "Email : $email<br>";
}

function getPasswords()
{
    $connexion = getBdd();
    $sql = "SELECT motdepasse FROM techniciens";
    $requete = $connexion->query($sql);
    if (!$connexion->query($sql)) {
        echo "problème de connexion à la table techniciens";
    } else {
        $resultat = $requete->fetchAll(PDO::FETCH_COLUMN);
    }

    return $resultat;
}

$passwords = getPasswords(); // Récupérer tous les mots de passe depuis la base de données

foreach ($passwords as $password) {
    echo "Mot de passe : $password<br>";
}
