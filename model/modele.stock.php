<?php 

function checkStockSAV($num_commande, $code_article) {
    $bdd = getBdd();
    
    // Requête pour vérifier si le stock SAV existe déjà pour cet article dans cette commande
    $sqlCheck = "SELECT COUNT(*) AS count FROM STOCK_SAV WHERE NUM_COMMANDE = :num_commande AND CODE_ARTICLE = :code_article";
    $statementCheck = $bdd->prepare($sqlCheck);
    $statementCheck->bindParam(':num_commande', $num_commande, PDO::PARAM_INT);
    $statementCheck->bindParam(':code_article', $code_article, PDO::PARAM_INT);
    $statementCheck->execute();
    $result = $statementCheck->fetch(PDO::FETCH_ASSOC);
    
    return ($result['count'] > 0); // Retourne vrai si le stock existe déjà, faux sinon
}

function insertStockSAV($num_commande, $nom_article, $qte_article) {
    $bdd = getBdd();
    $code_article = getCodeArticleByNom($nom_article);
    
    if ($code_article === null) {
        echo "L'article avec le nom '$nom_article' n'existe pas.";
        return; 
    }
    
    
    // Insérer une nouvelle ligne dans le stock SAV
    $sqlInsert = "INSERT INTO STOCK_SAV (NUM_COMMANDE, CODE_ARTICLE, QUANTITE_RETROUVEE) VALUES (:num_commande, :code_article, :qte_article)";
    $statementInsert = $bdd->prepare($sqlInsert);
    $statementInsert->bindParam(':num_commande', $num_commande, PDO::PARAM_INT);
    $statementInsert->bindParam(':code_article', $code_article, PDO::PARAM_INT);
    $statementInsert->bindParam(':qte_article', $qte_article, PDO::PARAM_INT);
    $statementInsert->execute();

    echo "Une nouvelle ligne pour l'article '$nom_article' dans la commande '$num_commande' a été ajoutée au stock SAV avec succès.";
}


function transferStockSAVToStockPrincipal($num_commande, $code_article) {
    $bdd = getBdd();
    
    // Requête pour récupérer la quantité retrouvée dans le stock SAV
    $sql = "SELECT QUANTITE_RETROUVEE FROM STOCK_SAV WHERE NUM_COMMANDE = :num_commande AND CODE_ARTICLE = :code_article";
    $statement = $bdd->prepare($sql);
    $statement->bindParam(':num_commande', $num_commande, PDO::PARAM_INT);
    $statement->bindParam(':code_article', $code_article, PDO::PARAM_INT);
    $statement->execute();
    
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $quantite_retrouvee = $result['QUANTITE_RETROUVEE']; // Récupérer la quantité retrouvée dans le stock SAV
    var_dump($quantite_retrouvee);
    // Ajouter la quantité retrouvée à la table STOCK_PRINCIPAL
    $sqlUpdate = "UPDATE STOCK_PRINCIPAL SET QUANTITE = QUANTITE + :quantite WHERE CODE_ARTICLE = :code_article";
    $statementUpdate = $bdd->prepare($sqlUpdate);
    $statementUpdate->bindParam(':quantite', $quantite_retrouvee, PDO::PARAM_INT);
    $statementUpdate->bindParam(':code_article', $code_article, PDO::PARAM_INT);
    $statementUpdate->execute();
    
    // Supprimer la ligne correspondante de la table STOCK_SAV
    $sqlDelete = "DELETE FROM STOCK_SAV WHERE NUM_COMMANDE = :num_commande AND CODE_ARTICLE = :code_article";
    $statementDelete = $bdd->prepare($sqlDelete);
    $statementDelete->bindParam(':num_commande', $num_commande, PDO::PARAM_INT);
    $statementDelete->bindParam(':code_article', $code_article, PDO::PARAM_INT);
    $statementDelete->execute();
}


function reduitStockPrincipal($nom_article, $qte_concerne) {
    $bdd = getBdd();
    
    // Requête pour réduire la quantité dans la table STOCK_PRINCIPAL
    $sql = "UPDATE STOCK_PRINCIPAL SET QUANTITE = QUANTITE - :qte_concerne WHERE NOM_ARTICLE = :nom_article";
    $statement = $bdd->prepare($sql);
    $statement->bindParam(':nom_article', $nom_article, PDO::PARAM_STR);
    $statement->bindParam(':qte_concerne', $qte_concerne, PDO::PARAM_INT);
    $statement->execute();
    
    echo "La quantité pour l'article '$nom_article' dans la table STOCK_PRINCIPAL a été réduite de $qte_concerne.";
}
