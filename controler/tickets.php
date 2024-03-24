<?php
    //Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    require_once '../model/modele.stock.php';
    require_once '../model/modele.articles.php';
    require_once '../model/modele.tickets.php';
    require_once '../model/ModelException.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $idTech = $_SESSION['id_technicien'];
    $posteTechnicien = $_SESSION['poste_technicien'];

    if(isset($_GET['action'])){
        $action = $_GET['action']; 
        if(isset($_GET['num_com'])) $num_com = $_GET['num_com'];
        switch ($action) {
            case 'allTickets':
                $allTickets = getAllTicketsExp(); 
                $ticketNPAI = getTicketNPAI();
                $ticketNP = getTicketNP();
                require_once '../vues/affichageRes/vue_allTickets.php';
                $contenu = $affichAllTickets;
                require_once '../vues/gabarit.php';
                break;

            case 'showticket':
                $num_ticket = $_GET['num_ticket'];
                $ticket = getTicketById($num_ticket);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_ticket.php';
                $contenu = $sideBarAll;
                $contenu .= $affichTicket;
                require_once '../vues/gabarit.php';
                break;
            case 'fermerTicketExp': 
                $num_ticket = $_GET['num_ticket'];
                closeTicketExp($num_ticket);    
                header('location: commandes.php?num_com='.$num_com.'&action=detail');
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
            
                // Vérification si un ticket avec le même code existe déjà
                $controlTicket = controlTicket( $num_com);  
                if(isset($controlTicket['CODE_TICKET'])){
                    // Si le ticket existe déjà, afficher un message d'alerte et redirection

                    echo "<script>alert('Un ticket  a déjà été créé')</script>";

                    sleep(0.8);
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
                $qte_concerne = isset($_GET['qte_concerne']) ? $_GET['qte_concerne'] : null;
               
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
                $nom_article = $_GET['nom_article'];
                $num_com = $_GET['num_com'];
                $qte_concerne = isset($_GET['qte_concerne']) ? $_GET['qte_concerne'] : null;
                try {
                    insertStockSAV($nom_article, $qte_concerne);
                    createTicketEC($code_ticket, $num_com, $statut_ticket, $code_article, $qte_concerne, $idTech);
                    header('location: commandes.php?num_com='.$num_com.'&action=detail&stock=OK');

                } catch (PDOException $e) {
                    // Vérifier l'erreur spécifique de duplication de clé primaire
                    $errorCode = $e->getCode();
                    if ($errorCode == '23000' && strpos($e->getMessage(), 'Duplicate entry') !== false) {
                        $errorStatus = 'NOK';
                    } else {
                        die("Erreur de connexion à la base de données : " . $e->getMessage());
                    }
                }

            break;  
            
            case 'AfficheTicket':
                $num_com = $_GET['num_com'];
                $code_article = $_GET['code_article'];
                // var_dump($num_com);
                // var_dump($code_article);
                $qte_concerne= getQuantiteConcernee($num_com, $code_article);
                $commande = getComById($num_com);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_AfficherT_EC_STOCKPRINCIPAL.php';
                $contenu = $sideBarAll;
                $contenu .= $affichCreatT_EC;
                require_once '../vues/gabarit.php';
            break;

            case 'afficheTicket2':
                $suggestions = getSuggestionsArticles();
                $num_com = $_GET['num_com'];
                $code_article = $_GET['code_article'];
                $nom_article = $_GET['nom_article'];

                $qte_concerne= getQuantiteConcernee($num_com, $code_article);
                ajouterAuStockPrincipal($nom_article, $qte_concerne);

                $commande = getComById($num_com);
                require_once '../vues/sideBar/vue_sideBarAll.php';
                require_once '../vues/affichageRes/vue_AfficherT_EC_EXPEDITION.php';
                $contenu = $sideBarAll;
                $contenu .= $affichCreatT_EC;
                // RemoveStockPrincipale($nom_article, $qte_concerne);
                require_once '../vues/gabarit.php';
            break;     
        }
    }
?>
