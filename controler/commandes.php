<?php
    // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

    require_once '../model/modele.com.php';
    require_once '../model/ModelException.php';  

    $action= 'allcom'; 
     
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    
    try{
        
    switch ($action) {
        // Affichage de toutes les commandes
            case 'allcom':
                $commandes = getAllCom();
                $titreResultats = "Resultat de toutes les commandes";
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_resultats.php';
                $contenu = $sideBarAll ;
                $contenu .= $affichResultats ; 
                require_once '../vues/gabarit.php';
            break;

        // Recherche parmis toutes les commandes         
            case 'searchAll': 
                $num_com = $_GET['num_com'];
                $nom_client = $_GET['nom_client'];
                $code_postal = $_GET['code_postal'];
                $ville= $_GET['ville']; 
                $titreResultats = "Resultat de la recherche";
                $commandes = searchAll($num_com, $nom_client, $code_postal, $ville);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                $contenu = $sideBarAll ;
                
                if( $commandes > 0 ){
                    require_once '../vues/affichageRes/vue_resultats.php';
                    $contenu .= $affichResultats;
                };
                require_once '../vues/gabarit.php';
            break;
        
        // Affichage des commandes en cours
        // TODO Voir pour changer le terme 'En cours' 

            case 'encours':
                $commandes = getEnCourCom();
                $titreResultats = "Resultat des commandes en cours";
                require_once '../vues/sideBar/vue_sideEnCours.php';
                require_once '../vues/affichageRes/vue_resultats.php';
                $contenu = $sideEncours ;
                $contenu .= $affichResultats ; 
                require_once '../vues/gabarit.php';
            break;

        // Recherche parmis les commandes en cours

            case 'searchEnCours': 
                $num_com = $_GET['num_com'];
                $nom_client = $_GET['nom_client'];
                $code_postal = $_GET['code_postal'];
                $ville= $_GET['ville']; 
                $titreResultats = "Resultat des commandes en cours";
                $commandes = searchEnCours($num_com, $nom_client, $code_postal, $ville);
                require_once '../vues/sideBar/vue_sideEnCours.php';
                $contenu = $sideEncours ;
                
                if( $commandes > 0 ){
                    require_once '../vues/affichageRes/vue_resultats.php';
                    $contenu .= $affichResultats;
                };
                require_once '../vues/gabarit.php';
            break;
          
        // Affichage des commandes Terminés
        // TODO Voir pour changer le terme 'Archivés' 

            case 'archives':
                $commandes = getTermCom();
                $titreResultats = "Resultat des commandes archivés";
                require_once '../vues/sideBar/vue_sideTerm.php';
                require_once '../vues/affichageRes/vue_resultats.php';
                $contenu = $sideTerm ;
                $contenu .= $affichResultats ; 
                require_once '../vues/gabarit.php';
            break;

        // Recherche parmis toutes les commandes Terminés

            case 'searchTerm': 
                $num_com = $_GET['num_com'];
                $nom_client = $_GET['nom_client'];
                $code_postal = $_GET['code_postal'];
                $ville= $_GET['ville'];
                
                $titreResultats = "Resultat des commandes archivés";
                
                $commandes = searchTerm($num_com, $nom_client, $code_postal, $ville);
                require_once '../vues/sideBar/vue_sideTerm.php';
                $contenu = $sideTerm ;
                
                if( $commandes > 0 ){
                    require_once '../vues/affichageRes/vue_resultats.php';
                    $contenu .= $affichResultats;
                };
                require_once '../vues/gabarit.php';
            break;

        // Affichage d'une commande séléctionné
            case 'commande':
                if(isset($_GET['num_com'])){
                    $id = $_GET['num_com'];
                }
                $commandes = getComById($id);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_commande.php';
                $contenu = $sideBarAll ;
                $contenu .= $affichCom ; 
                require_once '../vues/gabarit.php';
            break;
        // Afficahge du detail d'une commande
            case 'detail':
                if(isset($_GET['num_com'])){
                    $id = $_GET['num_com'];
                }
                $detailCommande = getDetailCom($id);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_detail.php';
                $contenu = $sideBarAll ;
                $contenu .= $affichDetail ; 
                require_once '../vues/gabarit.php';
            break;    
        }

    } catch (Exception $e){
        echo ($e->getMessage());
        $msgErreur = $e->getMessage();
        require_once '../vues/vue_sideBarAll.php';
        require_once '../vues/erreur.php';
    }
?>