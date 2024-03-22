<?php
    // Affiche les erreurs 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Recupére la connection à la BDD
    require_once('../config/connexion.php');
    
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
     * La fonction créer un ticket Erreur Client
     *
     * @param  mixed $code_ticket = ERREUR TICKET
     * @param  mixed $num_com 
     * @param  mixed $statut_ticket= EN COURS / TERMINEE
     * @param  mixed $cdeArticle = 
     * @return void
     */
    function createTicketEC(string $code_ticket, int $num_com, string $statut_ticket, int $cdeArticle, int $qteConcerne){
        $bdd = getBdd(); 
        $sql = "INSERT INTO TICKET (CODE_TICKET, NUM_COMMANDE, CODE_ARTICLE, STATUT_TICKET, QUANTITE_CONCERNEE)
                VALUES (:CODE_TICKET, :NUM_COMMANDE, :CODE_ARTICLE, :STATUT_TICKET,:QUANTITE_CONCERNEE )"; 
        $curseur = $bdd->prepare($sql);
        $curseur->execute(array(
            'CODE_TICKET' => $code_ticket, 
            'NUM_COMMANDE' => $num_com, 
            'CODE_ARTICLE' => $cdeArticle,
            'STATUT_TICKET' => $statut_ticket,
            'QUANTITE_CONCERNEE' => $qteConcerne
        ));
        
    }


/**
 * getSuggestionsArticles retourne tout les nom d'articles de la table "ARTICLE
 *
 * @return string
 */
function getSuggestionsArticles() {
    try {
        $bdd = getBdd(); 
        $sql = "SELECT NOM_ARTICLE FROM ARTICLE";
        $statement = $bdd->prepare($sql);
        $statement->execute();
        $suggestions = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $suggestions;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

/**
 * getCodeArticleByNom récupère le nom de l'article en fonction de son nom
 *
 * @param  mixed $nom_article
 * @return void
 */
function getCodeArticleByNom($nom_article) {
    try {
        $bdd = getBdd();
        $sql = "SELECT CODE_ARTICLE FROM ARTICLE WHERE NOM_ARTICLE = :nom_article";
        $statement = $bdd->prepare($sql);
        $statement->execute(array(':nom_article' => $nom_article));
        $resultat = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        if (!$resultat) {
            return null;
        }
        return $resultat['CODE_ARTICLE'];
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

/**
 * getQuantiteConcernee
 *
 * @param  int $num_commande
 * @param  int $code_article
 * @return void
 */
function getQuantiteConcernee($num_commande, $code_article) {
    try {
        $bdd = getBdd(); 
        $sql = "SELECT QUANTITE_CONCERNEE FROM TICKET WHERE NUM_COMMANDE = :num_commande AND CODE_ARTICLE = :code_article AND STATUT_TICKET = 'ouvert'";
        $statement = $bdd->prepare($sql);
        $statement->execute(array(':num_commande' => $num_commande, ':code_article' => $code_article));
        $resultat = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        if (!$resultat) {
            return null;
        }
        return $resultat['QUANTITE_CONCERNEE'];
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}


/**
 * insertStockSAV
 *
 * @param  string $nom_article
 * @param  int $qte_article
 * @return void
 */
function insertStockSAV($nom_article, $qte_article) {
    try {
        $bdd = getBdd();
        $code_article = getCodeArticleByNom($nom_article);
        if ($code_article === null) {
            echo "L'article avec le nom '$nom_article' n'existe pas.";
            return; 
        }
        
        // Insérer une nouvelle ligne dans le stock SAV
        $sqlInsert = "INSERT INTO STOCK_SAV (CODE_ARTICLE, NOM_ARTICLE, QTE) VALUES (:code_article, :nom_article, :qte_article)";
        $statementInsert = $bdd->prepare($sqlInsert);
        $statementInsert->bindParam(':code_article', $code_article, PDO::PARAM_INT);
        $statementInsert->bindParam(':nom_article', $nom_article, PDO::PARAM_STR);
        $statementInsert->bindParam(':qte_article', $qte_article, PDO::PARAM_INT);
        $statementInsert->execute();

        echo "Une nouvelle ligne pour l'article '$nom_article' a été ajoutée au stock SAV avec succès.";
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}


// function transferStockToPrincipal($nom_article, $qte_article) {
//     try {
//         $bdd = getBdd();
        
//         // Récupérer le code de l'article depuis le nom de l'article
//         $code_article = getCodeArticleByNom($nom_article);
//         if ($code_article === null) {
//             echo "L'article avec le nom '$nom_article' n'existe pas.";
//             return; 
//         }
//         $sqlSelectStock = "SELECT QTE FROM STOCK_SAV WHERE CODE_ARTICLE = :code_article";
//         $statementSelectStock = $bdd->prepare($sqlSelectStock);
//         $statementSelectStock->bindParam(':code_article', $code_article, PDO::PARAM_INT);
//         $statementSelectStock->execute();
        
//         // Vérifier si la requête a retourné des résultats
//         if ($statementSelectStock->rowCount() > 0) {
//             // Récupérer la quantité depuis le stock SAV
//             $result = $statementSelectStock->fetch(PDO::FETCH_ASSOC);
//             $qte_sav = $result['QTE'];
//         } else {
//             echo "Aucune entrée trouvée dans le stock SAV pour l'article avec le code '$code_article'.";
//             return;
//         }
        
//         // Mettre à jour la quantité dans le stock principal
//         $sqlUpdatePrincipal = "UPDATE STOCK_PRINCIPAL SET QUANTITE = IFNULL(QUANTITE, 0) + :qte_sav WHERE CODE_ARTICLE = :code_article";
//         $statementUpdatePrincipal = $bdd->prepare($sqlUpdatePrincipal);
//         $statementUpdatePrincipal->bindParam(':qte_sav', $qte_sav, PDO::PARAM_INT);
//         $statementUpdatePrincipal->bindParam(':code_article', $code_article, PDO::PARAM_INT);
//         $statementUpdatePrincipal->execute();

//         // Supprimer l'enregistrement du stock SAV
//         $sqlDeleteSav = "DELETE FROM STOCK_SAV WHERE CODE_ARTICLE = :code_article";
//         $statementDeleteSav = $bdd->prepare($sqlDeleteSav);
//         $statementDeleteSav->bindParam(':code_article', $code_article, PDO::PARAM_INT);
//         $statementDeleteSav->execute();
      
//         echo "Le stock principal a été mis à jour avec succès.";
//     } catch (PDOException $e) {
//         die("Erreur de connexion à la base de données : " . $e->getMessage());
//     }
// }

?>