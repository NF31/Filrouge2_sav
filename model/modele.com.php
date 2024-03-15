<?php

// Affiche les erreurs 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Recupére la connection à la BDD
require('config/connexion.php');


///////////////////////////////////////////////
//////    LISTER TOUTES LES COMMANDES     /////
///////////////////////////////////////////////

/**
 * La fonction permet de rechercher toutes les commandes
 *
 * @return Array
 */
function getAllCom(){
    $bdd = getBdd();

    $res = $bdd->query('SELECT * FROM COMMANDE');
    $commandes = $res->fetchAll(PDO::FETCH_ASSOC);
    
    return $commandes;
} 

/////////////////////////////////////////////////
//////    LISTER LES COMMANDES EN COURS     /////
/////////////////////////////////////////////////

/**
 * La fonction permet de rechercher les commandes avec le statut En cours 
 *
 * @return Array
 */
function getEnCourCom(){
    $bdd = getBdd();
    $res = $bdd->query("SELECT * FROM COMMANDE WHERE STATU_COMMANDE LIKE 'En cours' ");
    $commandes = $res->fetchAll(PDO::FETCH_ASSOC);

    return $commandes;
} 

/////////////////////////////////////////////////
//////     LISTER LES COMMANDES TERMINÉ     /////
/////////////////////////////////////////////////
/**
 * La fonction permet de rechercher les commandes avec le statut Terminé
 *
 * @return Array
 */
function getTermCom(){
    $bdd = getBdd();
    $res = $bdd->query("SELECT * FROM COMMANDE WHERE STATU_COMMANDE LIKE 'Terminee' ");
    $commandes = $res->fetchAll(PDO::FETCH_ASSOC);

    return $commandes;
}

////////////////////////////////////////////////////
//////      LISTER UNE COMMANDE AVEC ID        /////
////////////////////////////////////////////////////

/**
 * La fonction permet de récupérer une ligne de commande grâce à son numéro
 *
 * @param  int $num_com
 * @return Array
 */
function getComById(int $num_com){
    $bdd = getBdd(); 

    $sql = "SELECT * FROM COMMANDE WHERE NUM_COMMANDE LIKE :num_com";

    $curseur =  $bdd->prepare($sql);
    $curseur->execute(array('num_com' => $num_com ));

    $resultat = $curseur->fetch();
    
    return $resultat; 
}

////////////////////////////////////////////////////
//////     RECHERCHER UNE COMMANDE VIA FORM    /////
////////////////////////////////////////////////////

function searchAll(int $num_com, string $date_com, string $nom_client, int $code_postal, string $ville ) {
    $bdd = getbdd(); 

    $sql = "SELECT num_com, date_com, nom_client, code_postal_client, ville_client
            FROM COMMANDE 
            JOIN CLIENT ON commande.ID_CLIENT = client.ID_CLIENT 
            WHERE num_com LIKE :num_com 
            AND date_com LIKE :date_com 
            AND nom_client LIKE :nom_client 
            AND code_postal_client LIKE :code_postal 
            AND ville_client LIKE :ville"; 

    $curseur = $bdd->prepare($sql);
    $curseur->execute(array(
        'num_com' => '%'.$num_com.'%',
        'date_com' => '%'.$date_com.'%',
        'nom_client' => '%'.$nom_client.'%',
        'code_postal' => '%'.$code_postal.'%',
        'ville' => '%'.$ville.'%'
    ));

    $resultat = $curseur->fetchAll();  
    
    return $resultat;
}
