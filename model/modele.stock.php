<?php 

/**
 * insertStockSAV
 *
 * @param  string $nom_article
 * @param  int $qte_article
 * @return void
 */
function insertStockSAV($nom_article, $qte_article) {
    
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
    
}


function ajouterAuStockPrincipal($nom_article, $qte_article) {
    try {
        // Connexion à la base de données
        $bdd = getBdd();
        
        // Vérifier si l'article existe dans le stock SAV
        $code_article = getCodeArticleByNom($nom_article);
        if ($code_article === null) {
            echo "L'article avec le nom '$nom_article' n'existe pas dans le stock SAV.";
            return; 
        }
        
        // Vérifier si l'article existe déjà dans le stock principal
        $sqlCheck = "SELECT COUNT(*) FROM STOCK_PRINCIPAL WHERE CODE_ARTICLE = :code_article";
        $statementCheck = $bdd->prepare($sqlCheck);
        $statementCheck->bindParam(':code_article', $code_article, PDO::PARAM_INT);
        $statementCheck->execute();
        $count = $statementCheck->fetchColumn();
        
        if ($count > 0) {
            // Mettre à jour la quantité dans le stock principal
            $sqlUpdate = "UPDATE STOCK_PRINCIPAL SET QUANTITE = QUANTITE + :qte_article WHERE CODE_ARTICLE = :code_article";
            $statementUpdate = $bdd->prepare($sqlUpdate);
            $statementUpdate->bindParam(':qte_article', $qte_article, PDO::PARAM_INT);
            $statementUpdate->bindParam(':code_article', $code_article, PDO::PARAM_INT);
            $statementUpdate->execute();
            
            echo "La quantité de l'article '$nom_article' a été mise à jour dans le stock principal avec succès.";
        } else {
            // Insérer une nouvelle ligne dans le stock principal
            $sqlInsert = "INSERT INTO STOCK_PRINCIPAL (CODE_ARTICLE, NOM_ARTICLE, QUANTITE) VALUES (:code_article, :nom_article, :qte_article)";
            $statementInsert = $bdd->prepare($sqlInsert);
            $statementInsert->bindParam(':code_article', $code_article, PDO::PARAM_INT);
            $statementInsert->bindParam(':nom_article', $nom_article, PDO::PARAM_STR);
            $statementInsert->bindParam(':qte_article', $qte_article, PDO::PARAM_INT);
            $statementInsert->execute();
            
            echo "Une nouvelle ligne pour l'article '$nom_article' a été ajoutée au stock principal avec succès.";
        }
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
