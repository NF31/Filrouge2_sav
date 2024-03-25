<?php
    // Affiche les erreurs 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Recupére la connection à la BDD
    require_once('../config/connexion.php');

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
     * La fonction permet de chercher une commande avec code_article 
     *
     * @param  string $num_com
     * @param  int $code_art
     * @param  string $nom_client
     * @param  string $code_postal
     * @param  string $ville
     * @return Array
     */
    function searchAll_codeArt(string $num_com, int $code_art, string $nom_client, string $code_postal, string $ville) {
        $bdd = getbdd(); 
    
        $sql = "SELECT cmd.NUM_COMMANDE, cl.NOM_CLIENT, DATE_COM, VILLE_CLIENT, CODE_POSTAL_CLIENT, RUE_CLIENT, STATU_COMMANDE
                FROM COMMANDE AS cmd
                JOIN CLIENT AS cl ON cmd.ID_CLIENT = cl.ID_CLIENT 
                JOIN CONCERNE AS conc ON cmd.NUM_COMMANDE = conc.NUM_COMMANDE
                JOIN ARTICLE AS art ON conc.CODE_ARTICLE = art.CODE_ARTICLE
                WHERE cmd.NUM_COMMANDE LIKE :num_com 
                AND cl.nom_client LIKE :nom_client 
                AND art.CODE_ARTICLE LIKE :code_art
                AND cmd.code_postal_client LIKE :code_postal 
                AND cmd.ville_client LIKE :ville";
        
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'num_com' => '%'.$num_com.'%',
            'nom_client' => '%'.$nom_client.'%',
            'code_art' => $code_art,
            'code_postal' => '%'.$code_postal.'%',
            'ville' => '%'.$ville.'%'
        ));
    
        $resultat = $curseur->fetchAll(PDO::FETCH_ASSOC);  
        return $resultat; 
    }
    
    /**
     * La fonction permet de chercher une commande sans code_article 
     *
     * @param  mixed $num_com
     * @param  mixed $nom_client
     * @param  mixed $code_postal
     * @param  mixed $ville
     * @return void
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
     * recherche une commande en cours avec code_article
     *
     * @param  string $num_com
     * @param  int $code_art
     * @param  string $nom_client
     * @param  string $code_postal
     * @param  string $ville
     * @return Array
     */
    function searchEnCours_codeArt(string $num_com, int $code_art, string $nom_client, string $code_postal, string $ville) {
        $bdd = getbdd(); 
    
        $sql = "SELECT cmd.NUM_COMMANDE, cl.NOM_CLIENT, DATE_COM, VILLE_CLIENT, CODE_POSTAL_CLIENT, RUE_CLIENT, STATU_COMMANDE
                FROM COMMANDE AS cmd
                JOIN CLIENT AS cl ON cmd.ID_CLIENT = cl.ID_CLIENT 
                JOIN CONCERNE AS conc ON cmd.NUM_COMMANDE = conc.NUM_COMMANDE
                JOIN ARTICLE AS art ON conc.CODE_ARTICLE = art.CODE_ARTICLE
                WHERE cmd.NUM_COMMANDE LIKE :num_com 
                AND cl.nom_client LIKE :nom_client 
                AND art.CODE_ARTICLE LIKE :code_art
                AND cmd.code_postal_client LIKE :code_postal 
                AND cmd.ville_client LIKE :ville 
                AND STATU_COMMANDE LIKE 'En cours' "; 
        
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'num_com' => '%'.$num_com.'%',
            'nom_client' => '%'.$nom_client.'%',
            'code_art' => $code_art,
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

    /**
     * recherche une commande en cours avec code_article
     *
     * @param  string $num_com
     * @param  int $code_art
     * @param  string $nom_client
     * @param  string $code_postal
     * @param  string $ville
     * @return Array
     */
    function searchTerm_codeArt(string $num_com, int $code_art, string $nom_client, string $code_postal, string $ville) {
        $bdd = getbdd(); 
    
        $sql = "SELECT cmd.NUM_COMMANDE, cl.NOM_CLIENT, DATE_COM, VILLE_CLIENT, CODE_POSTAL_CLIENT, RUE_CLIENT, STATU_COMMANDE
                FROM COMMANDE AS cmd
                JOIN CLIENT AS cl ON cmd.ID_CLIENT = cl.ID_CLIENT 
                JOIN CONCERNE AS conc ON cmd.NUM_COMMANDE = conc.NUM_COMMANDE
                JOIN ARTICLE AS art ON conc.CODE_ARTICLE = art.CODE_ARTICLE
                WHERE cmd.NUM_COMMANDE LIKE :num_com 
                AND cl.nom_client LIKE :nom_client 
                AND art.CODE_ARTICLE LIKE :code_art
                AND cmd.code_postal_client LIKE :code_postal 
                AND cmd.ville_client LIKE :ville 
                AND STATU_COMMANDE LIKE 'Terminee' "; 
        
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'num_com' => '%'.$num_com.'%',
            'nom_client' => '%'.$nom_client.'%',
            'code_art' => $code_art,
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
        $sql = "SELECT *
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
            echo $e->getMessage();
        }
    }

    function changeAdress(string $rue_client, string $ville_client, int $code_postal_client, int $num_com){
        $bdd = getBdd();
        $sql = "UPDATE COMMANDE 
                SET RUE_CLIENT = :rue_client, VILLE_CLIENT = :ville_client, CODE_POSTAL_CLIENT = :code_postal_client
                WHERE NUM_COMMANDE = :num_com";
        
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'rue_client' => $rue_client,
            'ville_client' => $ville_client,
            'code_postal_client' => $code_postal_client,
            'num_com' => $num_com
        ));
    }

    function getCodeArticleAvecTicketOuvert(int $num_com) {
        try {
            $bdd = getBdd(); 
            
            // Requête SQL pour sélectionner tous les codes articles avec un ticket ouvert pour le numéro de commande donné
            $sql = "SELECT DISTINCT TICKET.CODE_ARTICLE FROM CONCERNE 
                    INNER JOIN TICKET ON CONCERNE.NUM_COMMANDE = TICKET.NUM_COMMANDE 
                    WHERE CONCERNE.NUM_COMMANDE = :num_com AND TICKET.STATUT_TICKET = 'ouvert'";
            
            $statement = $bdd->prepare($sql);
            $statement->execute(array('num_com' => $num_com));
            $codes_articles = $statement->fetchAll(PDO::FETCH_COLUMN);
            return $codes_articles;
            
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
     
    ///////////////////////////////////////////////////////
    //   AFFICHE LES TICKETS EXISTANTS SUR LA COMMANDE   //
    ///////////////////////////////////////////////////////
    
    /**
     * getTicketExp permet de rechercher les tickets d'expédition d'une commande
     *
     * @param  int $num_com
     * @return array
     */
    function getTicketExp(int $num_com) {
        $bdd = getBdd();
        $sql = "SELECT * FROM TICKET_EXP WHERE NUM_COMMANDE = :num_com";
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array('num_com' => $num_com));
        $resultat = $curseur->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    function getTicketEC(int $num_com) {
        $bdd = getBdd();
        $sql = "SELECT * FROM TICKET WHERE NUM_COMMANDE = :num_com";
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array('num_com' => $num_com));
        $resultat = $curseur->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    