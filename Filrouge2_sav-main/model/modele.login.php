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
    $sql = "SELECT * FROM techniciens";
    $requete = $connexion->query($sql);
    if (!$connexion->query($sql)) {
        echo "problème de connexion à la table techniciens";
    } else {
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    return $resultat;
}


$emails = getEmails(); // Récupérer toutes les adresses email depuis la base de données

/*foreach ($emails as $technicien) {
    echo "Email : " . $technicien['email'] . ", Poste : " . $technicien['poste'] . "<br>";
}*/


function getPasswords()
{
    $connexion = getBdd();
    $sql = "SELECT motdepasse,poste FROM techniciens";
    $requete = $connexion->query($sql);
    if (!$connexion->query($sql)) {
        echo "problème de connexion à la table techniciens";
    } else {
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    return $resultat;
}

$passwords = getPasswords(); // Récupérer tous les mots de passe depuis la base de données

 /*foreach ($passwords as $technicien) {
     echo "Mot de passe : " . $technicien['motdepasse'] . ", Poste : " . $technicien['poste'] . "<br>";
 }
*/


function loginAdmin()
{
    $connexion = getBdd();
    $sql = "SELECT * FROM administrateur"; // Requête pour sélectionner tous les enregistrements de la table techniciens
    $requete = $connexion->query($sql);
    if (!$requete) {
        echo "Problème de connexion à la table administrateur";
        return false; // Retourner false en cas d'échec de la requête
    } else {
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat; // Retourner le résultat de la requête
    }
}

//var_dump(loginAdmin());
function getEmailsAdmin()
{
    $connexion = getBdd();
    $sql = "SELECT * FROM administrateur";
    $requete = $connexion->query($sql);
    if (!$connexion->query($sql)) {
        echo "problème de connexion à la table administrateur";
    } else {
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    return $resultat;
}


$emails = getEmailsAdmin(); // Récupérer toutes les adresses email depuis la base de données

/*foreach ($emails as $admnistrateur) {
    echo "Email : " . $admnistrateur['email'] . ", Poste : " . $admnistrateur['poste'] . "<br>";
}*/

function getPasswordsAdmin()
{
    $connexion = getBdd();
    $sql = "SELECT motdepasse,poste FROM administrateur";
    $requete = $connexion->query($sql);
    if (!$connexion->query($sql)) {
        echo "problème de connexion à la table administrateur";
    } else {
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    return $resultat;
}

$passwords = getPasswordsAdmin(); // Récupérer tous les mots de passe depuis la base de données

/*
foreach ($passwords as $admnistrateur) {
   echo "Mot de passe : " . $admnistrateur['motdepasse'] . ", Poste : " . $admnistrateur['poste'] . "<br>";
 
}*/