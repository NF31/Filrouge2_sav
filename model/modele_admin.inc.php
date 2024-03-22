 <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

// ON APPEL LE FICHIER QUI CONTIENT LA REQUETE PDO DE CONNEXION getBdd();
  require('../config/connexion.php');

// PERMET DE RECUPERER TOUT LES TECHNICIENS DANS LA BDD
    function getTechAll(){
      $connexion = getBdd();
      $sql = "SELECT * FROM techniciens";
      $requete = $connexion->query($sql);
      if(!$connexion->query($sql)){
        echo "problème de connexion à la table contact";
    }
    else{
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    return $resultat;
    }
// PERMET DE RECUPERER LES TECHNICIENS SAV
    function getTechSAV(){
      $connexion = getBdd();
      $sql = "SELECT * FROM techniciens WHERE poste = 'SAV'";
      $requete = $connexion->query($sql);
      if(!$connexion->query($sql)){
        echo "problème de connexion à la table contact";
    }
    else{
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    return $resultat;
    }

// PERMET DE RECUPERER LES TECHNICIENS HOTLINE


    function getTechHotline(){
      $connexion = getBdd();
      $sql = "SELECT * FROM techniciens WHERE poste = 'Hotline'";
      $requete = $connexion->query($sql);
      if(!$connexion->query($sql)){
        echo "problème de connexion à la table contact";
    }
    else{
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    return $resultat;
    }
// PERMET DE SUPPRIMER LES TECHNICIENS

    function delTech(int $id){
      $connexion = getBdd();
      $sql = "DELETE FROM techniciens WHERE id = :id";
      $requete = $connexion->prepare($sql);
      
      $requete->execute(array(
        ":id" => $id
      ));
    }

  // PERMET DE CREER UN NOUVEAU TECH SAV (LIMITER A 3 MAXIMUM SINON BLOQUE )

    function createTechSAV(string $nom, string $prenom,string $email,string $motdepasse, string $poste) {
  
        $connexion = getBdd();
        $sql_count = "SELECT COUNT(*) AS total_techniciens FROM techniciens WHERE poste = 'SAV'";
        $requete_count = $connexion->query($sql_count);
        $result_count = $requete_count->fetch(PDO::FETCH_ASSOC);
        $total_techniciens = $result_count['total_techniciens'];

        if ($total_techniciens >= 3) {
            $_SESSION['error-messageLimit'] = "La limite de techniciens SAV est atteinte (maximum 3).";
            return false;
        }
        $sql_insert = "INSERT INTO techniciens (nom, prenom, email, motdepasse, poste) VALUES (:nom, :prenom,:email,:motdepasse, :poste)";
        $requete_insert = $connexion->prepare($sql_insert);
        $requete_insert->execute(array(
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":email" => $email,
            ":motdepasse" => $motdepasse,
            ":poste" => $poste
       
        ));
}

  // PERMET DE CREER UN NOUVEAU TECH HOTLINE (LIMITER A 10 MAXIMUM SINON BLOQUE )

  function createTechHOTLINE(string $nom, string $prenom,string $email,string $motdepasse, string $poste) {
      $connexion = getBdd();
      $sql_count = "SELECT COUNT(*) AS total_techniciens FROM techniciens WHERE poste = 'Hotline'";
      $requete_count = $connexion->query($sql_count);
      $result_count = $requete_count->fetch(PDO::FETCH_ASSOC);
      $total_techniciens = $result_count['total_techniciens'];

      if ($total_techniciens >= 10) {
        $_SESSION['error-messageLimit'] = "La limite de techniciens est atteinte (maximum 10).";         
        return false;
      }
      $sql_insert = "INSERT INTO techniciens (nom, prenom,email, motdepasse, poste) VALUES (:nom, :prenom, :email, :motdepasse, :poste)";
      $requete_insert = $connexion->prepare($sql_insert);
      $requete_insert->execute(array(
          ":nom" => $nom,
          ":prenom" => $prenom,
          ":email" => $email,
          ":motdepasse" => $motdepasse,
          ":poste" => $poste
      ));

      $id_technicien = $connexion->lastInsertId();
      return $id_technicien;

    }

    function checkEmailCreate(string $email){
       
            $connexion = getBdd();
            $sql ="SELECT COUNT(*) FROM techniciens WHERE email = :email";
            $requete = $connexion->prepare($sql);
            $requete->execute(['email' => $email]);
            
            $nbrColonne= $requete->fetchColumn();
            if ($nbrColonne > 0) {
                return false; // Email déjà utilisé
            } else {
                return true; // Email disponible
            }
    
        }


// L'email est comparé avec toute les autres de la BDD sauf la sienne
    function checkEmail(string $email, int $id) {
        $connexion = getBdd();
        $sql ="SELECT COUNT(*) FROM techniciens WHERE email = :email AND id != :id";
        $requete = $connexion->prepare($sql);
        $requete->execute(['email' => $email,
                            'id' => $id]);
        
        $nbrColonne= $requete->fetchColumn();
        if ($nbrColonne > 0) {
            return false; // Email déjà utilisé
        } else {
            return true; // Email disponible
        }

    }

  // PERMET DE METTRE A JOUR LES INFORMATIONS D'UN TECHNICIEN

    function updTech(int $id, string $nom, string $prenom, string $email, string $poste) {
      $connexion = getBdd();
       // Requête SQL pour METTRE A JOUR LES INFORMATIONS D'UN TECHNICIEN
      $sql = "UPDATE techniciens SET nom = :nom, prenom = :prenom, email = :email, poste = :poste WHERE id = :id";  
      $requete = $connexion->prepare($sql);

      if($requete->execute(array(
          ":id" => $id,
          ":nom" => $nom,
          ":prenom" => $prenom,
          ":email" => $email,
          ":poste" => $poste
      ))) {echo "<script>alert('Mise à jour effectuée avec succès !');</script>";
      }
      
  }
  // PERMET DE RECHERCHER UN TECHNICIEN
  
  function rechercherTechnicien(string $nom, string $prenom, string $categorie) {
    try {
        $connexion = getBdd();

        // Requête SQL pour rechercher un technicien par nom, prénom et catégorie
        $sql = "SELECT * FROM techniciens WHERE 1";

        if (!empty($nom)) {
            $sql .= " AND nom LIKE :nom";
            $nom_recherche = '%' . $nom . '%';
        }

        if (!empty($prenom)) {
            $sql .= " AND prenom LIKE :prenom";
            $prenom_recherche = '%' . $prenom . '%';
        }

        $sql .= " AND poste = :categorie";

        $requete = $connexion->prepare($sql);

        if (!empty($nom)) {
            $requete->bindParam(":nom", $nom_recherche, PDO::PARAM_STR);
        }

        if (!empty($prenom)) {
            $requete->bindParam(":prenom", $prenom_recherche, PDO::PARAM_STR);
        }

        $requete->bindParam(":categorie", $categorie, PDO::PARAM_STR);
        $requete->execute();

        // Récupération des résultats
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $resultats;
    } catch (PDOException $e) {
        // Gérer les erreurs PDO si nécessaire
        echo "Erreur lors de la recherche du technicien : " . $e->getMessage();
        return false;
    }
}



