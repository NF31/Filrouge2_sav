<?php
    // Affiche les erreurs 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Recupére la connection à la BDD
    require('../config/connexion.php');

    ///////////////////////////////////////////////
    //        LISTER TOUTES LES COMMANDES        //
    ///////////////////////////////////////////////

    /**
     * La fonction permet de rechercher toutes les commandes
     *
     * @return Array
     */
    function getAllCom(){
        $bdd = getBdd();
        $res = $bdd->query('SELECT * FROM COMMANDE JOIN CLIENT ON commande.ID_CLIENT = client.ID_CLIENT');
        $commandes = $res->fetchAll(PDO::FETCH_ASSOC);
        return $commandes; 
    } 

    /////////////////////////////////////////////////
    //        LISTER LES COMMANDES EN COURS        //
    /////////////////////////////////////////////////

    /**
     * La fonction permet de rechercher les commandes avec le statut En cours 
     *
     * @return Array
     */
    function getEnCourCom(){
        $bdd = getBdd();
        $res = $bdd->query("SELECT * FROM COMMANDE JOIN CLIENT ON commande.ID_CLIENT = client.ID_CLIENT WHERE STATU_COMMANDE LIKE 'En cours' ");
        $commandes = $res->fetchAll(PDO::FETCH_ASSOC);
        return $commandes; 
    }

    /////////////////////////////////////////////////
    //        LISTER LES COMMANDES TERMINÉ         //
    /////////////////////////////////////////////////

    /**
     * La fonction permet de rechercher les commandes avec le statut Terminé
     *
     * @return Array
     */
    function getTermCom(){
        $bdd = getBdd();
        $res = $bdd->query("SELECT * FROM COMMANDE JOIN CLIENT ON commande.ID_CLIENT = client.ID_CLIENT WHERE STATU_COMMANDE LIKE 'Terminee' ");
        $commandes = $res->fetchAll(PDO::FETCH_ASSOC);
        return $commandes; 
    }

    ////////////////////////////////////////////////////
    //          LISTER UNE COMMANDE AVEC ID           // 
    ////////////////////////////////////////////////////

    /**
     * La fonction permet de récupérer une ligne de commande grâce à son numéro
     *
     * @param  int $num_com
     * @return Array
     */
    function getComById(int $num_com){
        $bdd = getBdd(); 
        $sql = "SELECT * FROM COMMANDE JOIN CLIENT ON commande.ID_CLIENT = client.ID_CLIENT WHERE NUM_COMMANDE LIKE :num_com";

        $curseur =  $bdd->prepare($sql);
        $curseur->execute(array('num_com' => $num_com ));
        $resultat = $curseur->fetch();
        return $resultat; 
    }

    ////////////////////////////////////////////////////
    //     RECHERCHER UNE COMMANDE VIA FORM           //
    ////////////////////////////////////////////////////

    /**
     * La fonction permet de chercher un commande avec ces paramètres 
     *
     * @param  string $num_com
     * @param  string $nom_client
     * @param  string $code_postal
     * @param  string $ville
     * @return Array
     */
    function searchAll(string $num_com, string $nom_client, string $code_postal, string $ville ) {
        $bdd = getbdd(); 

        $sql = "SELECT *
                FROM COMMANDE 
                JOIN CLIENT ON commande.ID_CLIENT = client.ID_CLIENT 
                WHERE NUM_COMMANDE LIKE :num_com 
                AND nom_client LIKE :nom_client 
                AND code_postal_client LIKE :code_postal 
                AND ville_client LIKE :ville"; 

        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'num_com' => '%'.$num_com.'%',
            'nom_client' => '%'.$nom_client.'%',
            'code_postal' => '%'.$code_postal.'%',
            'ville' => '%'.$ville.'%'
        ));

        $resultat = $curseur->fetchAll(PDO::FETCH_ASSOC);  
        return $resultat; 
    } 
    
    /**
     * Recherche une commande avec ces paramètres et le statut En cours
     *
     * @param  string $num_com
     * @param  string $nom_client
     * @param  string $code_postal
     * @param  string $ville
     * @return Array
     */
    function searchEnCours(string $num_com, string $nom_client, string $code_postal, string $ville ) {
        $bdd = getbdd(); 

        $sql = "SELECT *
                FROM COMMANDE 
                JOIN CLIENT ON commande.ID_CLIENT = client.ID_CLIENT 
                WHERE NUM_COMMANDE LIKE :num_com 
                AND nom_client LIKE :nom_client 
                AND code_postal_client LIKE :code_postal 
                AND ville_client LIKE :ville
                AND STATU_COMMANDE LIKE 'En cours' "; 

        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'num_com' => '%'.$num_com.'%',
            'nom_client' => '%'.$nom_client.'%',
            'code_postal' => '%'.$code_postal.'%',
            'ville' => '%'.$ville.'%'
        ));

        $resultat = $curseur->fetchAll(PDO::FETCH_ASSOC);  
        return $resultat; 
    } 
    
    /**
     * Recherche une commande avec ces paramètres et le statut Terminé
     *
     * @param  string $num_com
     * @param  string $nom_client
     * @param  string $code_postal
     * @param  string $ville
     * @return Array
     */
    function searchTerm(string $num_com, string $nom_client, string $code_postal, string $ville ) {
        $bdd = getbdd(); 

        $sql = "SELECT *
                FROM COMMANDE 
                JOIN CLIENT ON commande.ID_CLIENT = client.ID_CLIENT 
                WHERE NUM_COMMANDE LIKE :num_com 
                AND nom_client LIKE :nom_client 
                AND code_postal_client LIKE :code_postal 
                AND ville_client LIKE :ville
                AND STATU_COMMANDE LIKE 'Terminee' "; 

        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'num_com' => '%'.$num_com.'%',
            'nom_client' => '%'.$nom_client.'%',
            'code_postal' => '%'.$code_postal.'%',
            'ville' => '%'.$ville.'%'
        ));

        $resultat = $curseur->fetchAll(PDO::FETCH_ASSOC);  
        return $resultat; 
    } 


    ////////////////////////////////////////////////////
    //     AFFICHER LES DETAIL D'UNE COMMANDE         //
    ////////////////////////////////////////////////////

    /**
     * La fonction permet de récupérer les détails d'une commande
     *
     * @param  int $num_com
     * @return Array
     */
    function getDetailCom(int $num_com){
        $bdd = getBdd();
        $sql = "SELECT CLIENT.NOM_CLIENT, ARTICLE.NOM_ARTICLE, CONCERNE.QUANTITE_CONCERNE 
                FROM CONCERNE 
                INNER JOIN COMMANDE ON CONCERNE.NUM_COMMANDE = COMMANDE.NUM_COMMANDE 
                INNER JOIN ARTICLE ON CONCERNE.CODE_ARTICLE = ARTICLE.CODE_ARTICLE 
                INNER JOIN CLIENT ON COMMANDE.ID_CLIENT = CLIENT.ID_CLIENT 
                WHERE CONCERNE.NUM_COMMANDE = :nom_com ;";

        $curseur = $bdd->prepare($sql);
        try {
            $curseur->execute(array('nom_com' => $num_com ));
            $resultat = $curseur->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }