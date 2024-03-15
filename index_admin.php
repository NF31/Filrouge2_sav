<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('modele/modele_admin.inc.php');

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
         

            require('vues/sidebar/vue_sidebar_techALL.php');
            require('vues/view_liste_techniciens.php');
            require('vues/gabarit.php');
            break;
                    
        case "listTechsSAV":
            $titreSidebar="Creer un techniciens SAV";
            $titreliste= "Liste des techniciens SAV";
            $techniciens = getTechSAV();

            require('vues/sidebar/vue_sidebar_techSAV.php');
            require('vues/view_liste_techniciens.php');
            require('vues/gabarit.php');  
            break;

        case "listTechsHOLTLINE":
            $titreSidebar="Creer un techniciens HOTLINE";
            $titreliste= "Liste des techniciens HOTLINE";
            $techniciens = getTechHotline();

            require('vues/sidebar/vue_sidebar_techHOTLINE.php');
            require('vues/view_liste_techniciens.php');  
            require('vues/gabarit.php'); 
            break; 
    
        case "createTechSAV": 
            if(isset($_GET['nom_techSAV'])) {
                $nom = $_GET['nom_techSAV'];
                $prenom = $_GET['prenom_techSAV'];
            }

            createTechSAV($nom,$prenom,"SAV");
            header('location:index_admin.php?action=listTechsALL');
            break;

        case "createTechHOTLINE":
            if(isset($_GET['nom_techHOTLINE'])) {
                $nom = $_GET['nom_techHOTLINE'];
                $prenom = $_GET['prenom_techHOTLINE'];
            }

            createTechHOTLINE($nom,$prenom,"Hotline");
            header('location:index_admin.php?action=listTechsALL');
            break;

        case "suppTech":

            if(isset($_GET['id_technicien'])) {
                $id = $_GET['id_technicien'];   
            }
            delTech($id);
            header('location:index_admin.php?action=listTechsALL');
            break;

        case "updTech":
            if(isset($_GET['id_technicien'])) {
                $id = $_GET['id_technicien'];   
                $nom =$_GET['nom_technicien'];   
                $prenom =$_GET['prenom_technicien'];   
                $poste =$_GET['poste_technicien'];  
                $titreliste= "Saisissez les modifications"; 
            }

            require('vues/sidebar/vue_sidebar_techALL.php');
            require('vues/vue_formulaire_updateTech.php');       
            require('vues/gabarit.php'); 
            break;

        case "updateTechMAJ":
            if(isset($_GET['id_technicien'])) {
                $id = $_GET['id_technicien'];   
                $nom = $_GET['nom_tech'];   
                $prenom = $_GET['prenom_tech'];   
                $poste = $_GET['categorie_tech'];  
            }
                        
            updTech($id, $nom, $prenom, $poste);
            header('location:index_admin.php?action=listTechsALL');
            break;

        case "rechercherTechnicien": 
            $nom = isset($_GET['nom_tech']) ? $_GET['nom_tech'] : '';
            $prenom = isset($_GET['prenom_tech']) ? $_GET['prenom_tech'] : '';
            $categorie = $_GET['categorie_tech'];
            $titreliste= "Resultat de votre recherche";
            $techniciens = rechercherTechnicien($nom, $prenom, $categorie);

            require('vues/sidebar/vue_sidebar_techALL.php');
            require('vues/view_liste_techniciens.php');
            require('vues/gabarit.php');  
            break;

    }  
    } catch (PDOException $e){
        die("<h1>Erreur de connexion: </h1>".$e->getMessage());
    }  
    // catch(ModelException $e) {
    //     die("<h1>Erreur de paramètrage :</h1>" . $e->getMessage());
    // } 

?>