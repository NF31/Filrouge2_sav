<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require('../model/modele_admin.inc.php');
    session_start();

    // Récupérer les informations depuis la session PHP
             $AdministrateurName = $_SESSION['admin_name'];
             $posteAdministrateur = $_SESSION['poste_administrateur'];
             $idAdministrateur = $_SESSION['id_administrateur'];

// ON CONSIDERE QUE LA PAGE D'ACCUEIL DE L'ADMIN EST LA PAGE TECH ALL.
    $action = 'listTechsALL';

    if(isset($_GET['action']))
        $action = $_GET['action'];

    // var_dump($action); DEBOGAGE
    try {
    switch ($action) {
            
        case "listTechsALL":
            $titreSidebar="Rechercher un techniciens";
            $titreliste= "Liste des techniciens";
            $techniciens = getTechAll();
         

            require('../vues/sidebar/vue_sidebar_techALL.php');
            require('../vues/vue_liste_techniciens.php');
            require('../vues/gabarit.php');
            break;
                    
        case "listTechsSAV":
            $titreSidebar="Creer un techniciens SAV";
            $titreliste= "Liste des techniciens SAV";
            $techniciens = getTechSAV();

            require('../vues/sidebar/vue_sidebar_techSAV.php');
            require('../vues/vue_liste_techniciens.php');
            require('../vues/gabarit.php');  
            break;

        case "listTechsHOTLINE":
            $titreSidebar="Creer un techniciens HOTLINE";
            $titreliste= "Liste des techniciens HOTLINE";
            $techniciens = getTechHotline();

            require('../vues/sidebar/vue_sidebar_techHOTLINE.php');
            require('../vues/vue_liste_techniciens.php');  
            require('../vues/gabarit.php'); 
            break; 
    
        case "createTechSAV": 
            if(isset($_GET['nom_techSAV'])) {
                $nom = $_GET['nom_techSAV'];
                $prenom = $_GET['prenom_techSAV'];
                $email = $_GET['email_techSAV'];
                $motdepasse = $_GET['mdp_techSAV'];
                $confirm_mdp_techSAV= $_GET['confirm_mdp_techSAV'];
            }
            
            if($motdepasse !== $confirm_mdp_techSAV) {
                $_SESSION['error-messagePassword'] = "Le mot de passe ne correspond pas";
                header('Location: admin.php?action=listTechsSAV&nom_techSAV=' . urlencode($nom) . 
                '&prenom_techSAV=' . urlencode($prenom) . 
                '&email_techSAV=' . urlencode($email));

                exit();
            }
        
            if (checkEmailCreate($email) === false) {
                $_SESSION['error-messageEmail'] = "L'email est déjà utilisé";
                header('location:admin.php?action=listTechsSAV&nom_techSAV=' . urlencode($nom) .
                '&prenom_techSAV=' . urlencode($prenom) .
                '&email_techSAV=' . urlencode($email));
                exit();
            }
            createTechSAV($nom,$prenom,$email,$motdepasse, "SAV");
            header('location:admin.php?action=listTechsSAV');
            break;

        case "createTechHOTLINE":
            if(isset($_GET['nom_techHOTLINE'])) {
                $nom = $_GET['nom_techHOTLINE'];
                $prenom = $_GET['prenom_techHOTLINE'];
                $email = $_GET['email_techHOTLINE'];
                $motdepasse = $_GET['mdp_techHOTLINE'];
                $confirm_mdp_techHOTLINE= $_GET['confirm_mdp_techHOTLINE'];

            }

            if($motdepasse !== $confirm_mdp_techHOTLINE) {
                $_SESSION['error-messagePassword'] = "Le mot de passe ne correspond pas";
                header('location:admin.php?action=listTechsHOTLINE' . 
                '&nom_techHOTLINE=' . urlencode($nom) . 
                '&prenom_techHOTLINE=' . urlencode($prenom) . 
                '&email_techHOTLINE=' . urlencode($email));
                exit();
            }
        
            if (checkEmailCreate($email) === false) {
                $_SESSION['error-messageEmail'] = "L'email est déjà utilisé";
                header('location:admin.php?action=listTechsHOTLINE' . 
                '&nom_techHOTLINE=' . urlencode($nom) . 
                '&prenom_techHOTLINE=' . urlencode($prenom) . 
                '&email_techHOTLINE=' . urlencode($email));
                exit();
            }
            
            createTechHOTLINE($nom,$prenom,$email,$motdepasse,"Hotline");
            header('location:admin.php?action=listTechsHOTLINE');
            break;

        case "suppTech":

            if(isset($_GET['id_technicien'])) {
                $id = $_GET['id_technicien'];   
            }
            delTech($id);
            header('location:admin.php?action=listTechsALL');
            break;

        case "updTech":
            if(isset($_GET['id_technicien'])) {
                $id = $_GET['id_technicien'];   
                $nom =$_GET['nom_technicien'];   
                $prenom =$_GET['prenom_technicien'];
                $mail = $_GET['email_technicien'];   
                $poste = $_GET['poste_technicien'];               $titreliste= "Saisissez les modifications"; 
            }

            require('../vues/sidebar/vue_sidebar_techALL.php');
            require('../vues/vue_formulaire_updateTech.php');       
            require('../vues/gabarit.php'); 
            break;

        case "updateTechMAJ":
            if(isset($_GET['id_technicien'])) {
                $id = $_GET['id_technicien'];   
                $nom = $_GET['nom_tech'];   
                $email = $_GET['email_tech'];
                $prenom = $_GET['prenom_tech'];   
                $poste = $_GET['poste_technicien'];  
            }


    // Vérifier si l'e-mail est déjà utilisé
    if (checkEmail($email, $id) === false) {
        $_SESSION['error-messageEmail'] = "L'email est déjà utilisé";
        header('location:admin.php?action=updTech&id_technicien=' . $id . '&nom_technicien=' . $nom . '&prenom_technicien=' . $prenom . '&email_technicien=' . $email);
        exit();
    }

    // Mettre à jour les données
    updTech($id, $nom, $prenom, $email, $poste);
    header('location:admin.php?action=listTechsALL');
    exit();

    break;

        case "rechercherTechnicien": 
            $nom = isset($_GET['nom_tech']) ? $_GET['nom_tech'] : '';
            $prenom = isset($_GET['prenom_tech']) ? $_GET['prenom_tech'] : '';
            $categorie = $_GET['categorie_tech'];
            $titreliste= "Resultat de votre recherche";
            $techniciens = rechercherTechnicien($nom, $prenom, $categorie);

            require('../vues/sidebar/vue_sidebar_techALL.php');
            require('../vues/vue_liste_techniciens.php');
            require('../vues/gabarit.php');  
            break;

    }  
    } catch (PDOException $e){
        die("<h1>Erreur de connexion: </h1>".$e->getMessage());
    }  
    // catch(ModelException $e) {
    //     die("<h1>Erreur de paramètrage :</h1>" . $e->getMessage());
    // } 
    

?>