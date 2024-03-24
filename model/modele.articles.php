<?php
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
