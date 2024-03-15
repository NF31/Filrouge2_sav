<?php
    // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

    require_once 'model/modele.com.php';
    require_once 'ModelException.php';  

    $test = searchAll(21,"",'', 75001,'');
    print_r($test);

    $action= 'allcom'; 
     
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    switch ($action) {
        case 'allcom':
            $commandes = getAllCom();
            require_once 'vues/sideBar/vue_sideBarAll.php';
            require_once 'vues/affichageRes/vue_resAll.php';
            $contenu = $sideBarAll ;
            $contenu .= $affichResAll ; 
            require_once 'vues/gabarit.php';
            break;
        
        case 'searchAll': 
            require_once 'vues/sideBar/vue_sideBarAll.php';
            break;

        
        case 'encours':
            $commandes = getEnCourCom();
            require_once 'vues/sideBar/vue_sideEnCours.php';
            require_once 'vues/affichageRes/vue_resEnCours.php';
            $contenu = $sideEncours ;
            $contenu .= $affichResEnCours ; 
            require_once 'vues/gabarit.php';
            break;

        case 'archives':
            $commandes = getTermCom();
            require_once 'vues/sideBar/vue_sideTerm.php';
            require_once 'vues/affichageRes/vue_resTerm.php';
            $contenu = $sideTerm ;
            $contenu .= $affichResTerm ; 
            require_once 'vues/gabarit.php';
            break;

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