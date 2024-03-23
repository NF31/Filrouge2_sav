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
    $idTech = $_SESSION['id_technicien'];
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
                $ticket = getComById($num_com);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_confTexp.php';
                $contenu = $sideBarAll;
                $contenu .= $affichConfTicket;
                require_once '../vues/gabarit.php';
            
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
                $nouveauTicket = creatTicketExp($code_ticket,  $num_com,  $statut_ticket, $idTech);
                header('location: commandes.php?num_com='.$num_com.'&action=detail');
            break;  

            // CREATION D'UN TICKET ERREUR CLIENT : 

            case 'createT_EC':
                $suggestions = getSuggestionsArticles();
           
                $commande = getComById($num_com);
                // $code_article = getCodeArticle($num_com);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_creatT_EC.php';
                $contenu = $sideBarAll;
                $contenu .= $affichCreatT_EC;
                require_once '../vues/gabarit.php';
                break;

            case 'confirmeCreatT_EC':
                $statut_ticket = $_GET['statut_ticket'];
                $code_ticket = $_GET['code_ticket'];
                $nom_article = $_GET['nom_article'];
                $qte_concerne = isset($_GET['qte_ticket']) ? $_GET['qte_ticket'] : null;
               
                $ticket = getComById($num_com);
                $code_article = getCodeArticleByNom($nom_article);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_confT_EC.php';
                $contenu = $sideBarAll;
                $contenu .= $affichConfTicket;
                require_once '../vues/gabarit.php';
                break; 

            case 'creatECOk':
                $statut_ticket = $_GET['statut_ticket'];
                $code_ticket = $_GET['code_ticket'];
                $code_article = $_GET['code_article'];
                $num_com = $_GET['num_com'];
                $qte_concerne = isset($_GET['qte_ticket']) ? $_GET['qte_ticket'] : null;
                createTicketEC($code_ticket, $num_com, $statut_ticket, $code_article, $qte_concerne);
                header('location: commandes.php?num_com='.$num_com.'&action=detail');
            break;    
            
            case 'AfficheTicket':
                $suggestions = getSuggestionsArticles();
                $num_com = $_GET['num_com'];
                $code_article = $_GET['code_article'];
                var_dump($num_com);
                var_dump($code_article);
                $qte_concerne= getQuantiteConcernee($num_com, $code_article);
                var_dump($qte_concerne);

           
                $commande = getComById($num_com);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_AfficherT_EC.php';
                $contenu = $sideBarAll;
                $contenu .= $affichCreatT_EC;
                require_once '../vues/gabarit.php';
                break;
            
            case 'RetourStock_EC':
                $commande = getComById($num_com);
                $nom_article = isset($_GET['nom_article']) ? $_GET['nom_article'] : '';
                $qte_concerne = isset($_GET['qte_concerne']) ? $_GET['qte_concerne'] : '';
                insertStockSAV($nom_article, $qte_concerne);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_AfficherT_EC_EXP.php';
                $contenu = $sideBarAll;
                $contenu .= $affichCreatT_EC;
                require_once '../vues/gabarit.php';

            //   case 'RetourStock_PRINCIPAL':
            //     $commande = getComById($num_com);
            //     $nom_article = isset($_GET['nom_article']) ? $_GET['nom_article'] : '';
            //     $qte_concerne = isset($_GET['qte_concerne']) ? $_GET['qte_concerne'] : '';
            //     transferStockToPrincipal($nom_article, $qte_concerne);
            //     require_once '../vues/sideBar/vue_sideBarAll.php';
            //     require_once '../vues/affichageRes/vue_AfficherT_EC_STOCKPRINCIPAL.php';
            //     $contenu = $sideBarAll;
            //     $contenu .= $affichCreatT_EC;
            //     require_once '../vues/gabarit.php';
    }
        }


?>
