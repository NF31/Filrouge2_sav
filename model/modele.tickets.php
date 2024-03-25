<?php
    // Affiche les erreurs 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Recupére la connection à la BDD
    require_once('../config/connexion.php');

    ////////////////////////////////////////////////////
    //        SELECTIONNER LES TICKETS PAR TYPE       //
    ////////////////////////////////////////////////////
        
    /**
     * getAllTickets récupére tout les tickets d'expédition
     *
     * @return void
     */
    function getAllTicketsExp(){
        $bdd = getBdd();
        $sql = "SELECT * FROM TICKET_EXP";
        $curseur = $bdd->query($sql);
        $resultat = $curseur->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    function getTicketNPAI(){
        $bdd = getBdd();
        $sql = "SELECT * FROM TICKET_EXP WHERE CODE_TICKET LIKE 'NPAI'";
        $curseur = $bdd->query($sql);
        $resultat = $curseur->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }   

    function getTicketNP(){
        $bdd = getBdd();
        $sql = "SELECT * FROM TICKET_EXP WHERE CODE_TICKET LIKE 'NP'";
        $curseur = $bdd->query($sql);
        $resultat = $curseur->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    function getTicketEC() {
        $bdd = getBdd();
        $sql = "SELECT * FROM TICKET WHERE CODE_TICKET LIKE 'EC'";
        $curseur = $bdd->query($sql);
        $resultat = $curseur->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
    



    ////////////////////////////////////////////////////
    //    RECHERCHER UNE COMMANDE AVEC SON NUM_COM    //
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
        $resultat = $curseur->fetch(PDO::FETCH_ASSOC);
        return $resultat; 
    }
    
    /**
     * La fonction créer un ticket expédition
     *
     * @param  string $code_ticket
     * @param  int $num_com
     * @param  string $statut_ticket
     * @return void
     */
    function creatTicketExp( string $code_ticket, int $num_com, string $statut_ticket, int $idTech ){
        $bdd = getBdd(); 
        $sql = "INSERT INTO TICKET_EXP (CODE_TICKET , NUM_COMMANDE, STATUT_TICKET, ID)
                VALUES (:code_ticket, :num_commande, :statut_commande, :idTech )"; 
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'code_ticket' => $code_ticket, 
            'num_commande' => $num_com, 
            'statut_commande' => $statut_ticket,
            'idTech' => $idTech
        ));
    }
    
    /**
     * La fonction contrôle si un ticket d'expédition du même type existe déjà
     *
     * @param  string $code_ticket
     * @param  int $num_com
     * @return void
     */

    function controlTicket(int $num_com){
        $bdd = getBdd();
        $sql = "SELECT * FROM TICKET_EXP WHERE NUM_COMMANDE LIKE :num_com"; 


        $curseur = $bdd->prepare($sql);
        $curseur->execute(array('num_com' => $num_com));
        $resultat = $curseur->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    }
        
    /**
     *La fonction contrôle si un ticket EC du même type existe déjà

     *
     * @param  int $num_com
     * @param  int $cdeArticle
     * @return void
     */
    function controlTicketEC(int $num_com, int $code_article){
        $bdd = getBdd();
        $sql = "SELECT * FROM TICKET WHERE NUM_COMMANDE = :num_com AND CODE_ARTICLE = :code_article"; 
    
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'num_com' => $num_com,
            'code_article' => $code_article
        ));
        $resultat = $curseur->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    }
    
    /**
     * La fonction permet de récupérer un ticket d'expédition grâce à son numéro
     *
     * @param  mixed $num_ticket
     * @return void
     */
    function getTicketById(int $num_ticket){
        $bdd = getBdd();
        $sql = "SELECT * FROM TICKET_EXP WHERE NUM_TICKET LIKE :num_ticket";
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array('num_ticket' => $num_ticket));
        $resultat = $curseur->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    }
    function getTicketECById(int $num_ticket){
        $bdd = getBdd();
        $sql = "SELECT * FROM TICKET WHERE NUM_TICKET LIKE :num_ticket";
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array('num_ticket' => $num_ticket));
        $resultat = $curseur->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    }

       
    /**
     * la fonction créer un ticket ERREUR CLIENT
     *
     * @param  int $code_ticket
     * @param  int $num_com
     * @param  string $statut_ticket
     * @param  int $cdeArticle
     * @param  int $qteConcerne
     * @param  int $idTech
     * @return void
     */
    function createTicketEC(string $code_ticket, int $num_com, string $statut_ticket, int $cdeArticle, int $qteConcerne, int $idTech){
        $bdd = getBdd(); 
        $sql = "INSERT INTO TICKET (CODE_TICKET, NUM_COMMANDE, CODE_ARTICLE, STATUT_TICKET, QUANTITE_CONCERNEE, id_technicien)
                VALUES (:CODE_TICKET, :NUM_COMMANDE, :CODE_ARTICLE, :STATUT_TICKET,:QUANTITE_CONCERNEE, :idTech)"; 
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'CODE_TICKET' => $code_ticket, 
            'NUM_COMMANDE' => $num_com, 
            'CODE_ARTICLE' => $cdeArticle,
            'STATUT_TICKET' => $statut_ticket,
            'QUANTITE_CONCERNEE' => $qteConcerne,
            'idTech' => $idTech
        ));
        
    }
    
    /**
     * fermer un ticket d'expédition
     *
     * @param  int $num_ticket
     * @return void
     */
    function closeTicketExp(int $num_ticket){
        $bdd = getBdd();
        $sql = "UPDATE TICKET_EXP SET STATUT_TICKET = 'FERMÉ' WHERE NUM_TICKET = :num_ticket";
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array('num_ticket' => $num_ticket));
    }
        
        
    /**
     * fermer un ticket ERREUR COMMANDE
     *
     * @param  int $num_commande
     * @param  int $code_article
     * @return void
     */
    function closeTicketEC($num_commande, $code_article) {
        $bdd = getBdd();
        
        // Requête pour modifier le statut du ticket à "FERMÉE"
        $sql = "UPDATE TICKET SET STATUT_TICKET = 'FERMÉ' WHERE NUM_COMMANDE = :num_commande AND CODE_ARTICLE = :code_article";
        $statement = $bdd->prepare($sql);
        $statement->bindParam(':num_commande', $num_commande, PDO::PARAM_INT);
        $statement->bindParam(':code_article', $code_article, PDO::PARAM_INT);
        $statement->execute();
        
    }
    
?>