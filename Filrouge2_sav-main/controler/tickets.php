<?php
    // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

    require_once '../model/modele.tickets.php';
    require_once '../model/ModelException.php';


    if(isset($_GET['action'])){
        $action = $_GET['action']; 
        $num_com = $_GET['num_com'];
        switch ($action) {
            case 'showT_Exp':
                break;
            
            case 'createT_Exp':
                $commande = getComById($num_com);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_creatTexp.php';
                $contenu = $sideBarAll;
                $contenu .= $affichCreatTexp;
                require_once '../vues/gabarit.php';
                break;
            case 'confirmeCreatT_Exp':
                $statut_ticket = $_GET['statut_ticket'];
                $code_ticket = $_GET['code_ticket'];
                $ticket = getComById($num_com);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_confTexp.php';
                $contenu = $sideBarAll;
                $contenu .= $affichConfTicket;
                require_once '../vues/gabarit.php';
                break; 
            case 'creatOk':
                $statut_ticket = $_GET['statut_ticket'];
                $code_ticket = $_GET['code_ticket'];
                $nouveauTicket = creatTicketExp( $code_ticket,  $num_com,  $statut_ticket);
                header('location: commandes.php?num_com='.$num_com.'&action=detail');
            break;      
            
            case 'createT_EC':
                $commande = getComById($num_com);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_creatT_EC.php';
                $contenu = $sideBarAll;
                $contenu .= $affichCreatTexp;
                require_once '../vues/gabarit.php';
                break;
        }
    }
?>
