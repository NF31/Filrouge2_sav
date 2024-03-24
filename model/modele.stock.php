<?php 

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