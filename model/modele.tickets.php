<?php
    // Affiche les erreurs 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Recupére la connection à la BDD
    require('../config/connexion.php');
    
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
    function creatTicketExp( string $code_ticket, int $num_com, string $statut_ticket){
        $bdd = getBdd(); 
        $sql = "INSERT INTO TICKET_EXP (CODE_TICKET , NUM_COMMANDE, STATUT_TICKET)
                VALUES (:code_ticket, :num_commande, :statut_commande )"; 
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'code_ticket' => $code_ticket, 
            'num_commande' => $num_com, 
            'statut_commande' => $statut_ticket
        ));
    }
?>