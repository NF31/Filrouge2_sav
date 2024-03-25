<?php
    // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

    require_once '../model/modele.com.php';
    require_once '../model/ModelException.php';  
    
    //ouverture de la session
    session_start();

    // Récupération des données de la session 
    $technicianName = $_SESSION['technician_name'];
    $posteTechnicien = $_SESSION['poste_technicien'];
    $idTechnicien = $_SESSION['id_technicien'];        

    $action= 'allcom';
     
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    
    try{
        
    switch ($action) {
        // Affichage de toutes les commandes
            case 'allcom':
                $commandes = getAllCom();
                $titreResultats = "Résultats de toutes les commandes";
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
                $code_art = intval($_GET['code_art']);

                if($code_art == 0){
                    $commandes = searchAll($num_com, $nom_client, $code_postal, $ville);
                } else {
                    $commandes = searchAll_codeArt($num_com, $code_art, $nom_client, $code_postal, $ville);
                }
                $titreResultats = "Resultat de la recherche";
                require_once '../vues/sideBar/vue_sideBarAll.php';
                $contenu = $sideBarAll ;
                require_once '../vues/affichageRes/vue_resultats.php';
                $contenu .= $affichResultats ; 
                require_once '../vues/gabarit.php';
            break;
        
        // Affichage des commandes en cours
        // TODO Voir pour changer le terme 'En cours' 

            case 'encours':
                $commandes = getEnCourCom();
                $titreResultats = "Résultats des commandes en cours";
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
                $code_art = intval($_GET['code_art']);
                if($code_art == 0){
                    $commandes = searchEnCours($num_com, $nom_client, $code_postal, $ville);
                } else {
                    $commandes = searchEnCours_codeArt($num_com, $code_art, $nom_client, $code_postal, $ville);
                }
                $titreResultats = "Résultats de la recherche";
                require_once '../vues/sideBar/vue_sideEnCours.php';
                $contenu = $sideEncours ;
                require_once '../vues/affichageRes/vue_resultats.php';
                $contenu .= $affichResultats;
                require_once '../vues/gabarit.php';
            break;
          
        // Affichage des commandes Terminés
        // TODO Voir pour changer le terme 'Archivés' 

            case 'archives':
                $commandes = getTermCom();
                $titreResultats = "Résultats des commandes terminées";
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
                $code_art = intval($_GET['code_art']);
                if($code_art == 0){
                    $commandes = searchTerm($num_com, $nom_client, $code_postal, $ville);
                } else {
                    $commandes = searchTerm_codeArt($num_com, $code_art, $nom_client, $code_postal, $ville);
                }
                $titreResultats = "Résultats de la recherche";
                require_once '../vues/sideBar/vue_sideTerm.php';
                $contenu = $sideTerm ;
                require_once '../vues/affichageRes/vue_resultats.php';
                $contenu .= $affichResultats;
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
                if(count(getTicketExp($id))!=0){
                    $tickets = getTicketExp($id);
                    $infoTicket ='NPAI';
                   
                };
                if(count(getTicketEC($id))!=0){
                    $tickets = getTicketEC($id);
                    $infoTicket ='EC';
                };
                $detailCommande = getDetailCom($id);
                // var_dump($detailCommande);

                //affiche la modale de confirmation de l'envoie en stock SAV de l'article
                $stockmodal = isset($_GET['stock']) ? $_GET['stock'] : '';
                
                $codeArticleTicket = getCodeArticleAvecTicketOuvert($id);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_detail.php';
                $contenu = $sideBarAll ;
                $contenu .= $affichDetail ; 
                require_once '../vues/gabarit.php';
            break; 
            
            case 'modifAdress':
                $rue_client = $_GET['rue_client'];
                $ville_client = $_GET['ville_client'];
                $code_postal_client = $_GET['code_postal_client'];
                $num_com = intval($_GET['num_com']);
                changeAdress($rue_client, $ville_client, $code_postal_client, $num_com);
                header('location: commandes.php?num_com='.$num_com.'&action=detail');
                
            break;
        }

    } catch (Exception $e){
        echo ($e->getMessage());
        $msgErreur = $e->getMessage();
        require_once '../vues/vue_sideBarAll.php';
        require_once '../vues/erreur.php';
    }
?>