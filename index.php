<?php
    // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

    require_once 'model/modele.com.php';
    require_once 'ModelException.php';  

    $action= 'allcom'; 
     
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    switch ($action) {

        // Affichage de toutes les commandes
            case 'allcom':
                $commandes = getAllCom();
                require_once 'vues/sideBar/vue_sideBarAll.php';
                require_once 'vues/affichageRes/vue_resAll.php';
                $contenu = $sideBarAll ;
                $contenu .= $affichResAll ; 
                require_once 'vues/gabarit.php';
            break;

        // Recherche parmis toutes les commandes         
            case 'searchAll': 
                $num_com = $_GET['num_com'];
                $nom_client = $_GET['nom_client'];
                $code_postal = $_GET['code_postal'];
                $ville= $_GET['ville']; 
                
                $commandes = searchAll($num_com, $nom_client, $code_postal, $ville);
                require_once 'vues/sideBar/vue_sideBarAll.php';
                $contenu = $sideBarAll ;
                
                if( $commandes > 0 ){
                    require_once 'vues/affichageRes/vue_resAll.php';
                    $contenu .= $affichResAll;
                };
                require_once 'vues/gabarit.php';
            break;
        
        // Affichage des commandes en cours
        // TODO Voir pour changer le terme 'En cours' 

            case 'encours':
                $commandes = getEnCourCom();
                require_once 'vues/sideBar/vue_sideEnCours.php';
                require_once 'vues/affichageRes/vue_resEnCours.php';
                $contenu = $sideEncours ;
                $contenu .= $affichResEnCours ; 
                require_once 'vues/gabarit.php';
            break;

        // Recherche parmis les commandes en cours

            case 'searchEnCours': 
                $num_com = $_GET['num_com'];
                $nom_client = $_GET['nom_client'];
                $code_postal = $_GET['code_postal'];
                $ville= $_GET['ville']; 

                $commandes = searchEnCours($num_com, $nom_client, $code_postal, $ville);
                require_once 'vues/sideBar/vue_sideEnCours.php';
                $contenu = $sideEncours ;
                
                if( $commandes > 0 ){
                    require_once 'vues/affichageRes/vue_resEnCours.php';
                    $contenu .= $affichResEnCours;
                };
                require_once 'vues/gabarit.php';
            break;
          

        // Affichage des commandes Terminés
        // TODO Voir pour changer le terme 'Archivés' 

            case 'archives':
                $commandes = getTermCom();
                require_once 'vues/sideBar/vue_sideTerm.php';
                require_once 'vues/affichageRes/vue_resTerm.php';
                $contenu = $sideTerm ;
                $contenu .= $affichResTerm ; 
                require_once 'vues/gabarit.php';
            break;

        // Recherche parmis toutes les commandes Terminés

            case 'searchTerm': 
                $num_com = $_GET['num_com'];
                $nom_client = $_GET['nom_client'];
                $code_postal = $_GET['code_postal'];
                $ville= $_GET['ville']; 
                
                $commandes = searchTerm($num_com, $nom_client, $code_postal, $ville);
                require_once 'vues/sideBar/vue_sideTerm.php';
                $contenu = $sideTerm ;
                
                if( $commandes > 0 ){
                    require_once 'vues/affichageRes/vue_resTerm.php';
                    $contenu .= $affichResTerm;
                };
                require_once 'vues/gabarit.php';
            break;

        // Affichage d'une commande séléctionné
            case 'commande':
                if(isset($_GET['num_com'])){
                    $id = $_GET['num_com'];
                }
                $commandes = getComById($id);
                require_once 'vues/sideBar/vue_sideBarAll.php';
                require_once 'vues/affichageRes/vue_commande.php';
                $contenu = $sideBarAll ;
                $contenu .= $affichCom ; 
                require_once 'vues/gabarit.php';
            break;
        }
?>