<?php
    //Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

    require_once '../model/modele.tickets.php';
    require_once '../model/ModelException.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
     $nomSession = $_SESSION['nomUtilisateur'];
     $roleSession = $_SESSION['roleUtilisateur'];
     $idSession = $_SESSION['idUtilisateur'];

    // print_r('<strong>Utilisateur connecté : </strong>'. $nomSession . '  ');
    // print_r('<strong>Role utilisateur : </strong>'. $roleSession . ' ');
    // print_r('<strong>Id utilisateur : </strong>'. $idSession . ' ');


    if(isset($_GET['action'])){
        $action = $_GET['action']; 
        $num_com = $_GET['num_com'];
        switch ($action) {
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
            
                // Vérification si un ticket avec le même code existe déjà
                $controlTicket = controlTicket($code_ticket, $num_com);  
                if(is_array($controlTicket) && $controlTicket['CODE_TICKET'] == $code_ticket){
                    // Si le ticket existe déjà, afficher un message d'alerte et redirection
                    echo "<script>alert('Un ticket $code_ticket a déjà été créé')</script>";
                    echo "<script>window.location.href='commandes.php?num_com=$num_com&action=detail'</script>";
                } else {
                    // Si le ticket n'existe pas encore donc je créer du ticket
                    $ticket = getComById($num_com);
                    require_once '../vues/sideBar/vue_sideBarAll.php';
                    require_once '../vues/affichageRes/vue_confTexp.php';
                    $contenu = $sideBarAll . $affichConfTicket;
                    require_once '../vues/gabarit.php';
                }
            break;
                
            case 'creatOk':
                $statut_ticket = $_GET['statut_ticket'];
                $code_ticket = $_GET['code_ticket'];
                $nouveauTicket = creatTicketExp( $code_ticket,  $num_com,  $statut_ticket, $idSession );
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
