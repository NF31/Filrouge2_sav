    <?php 
        // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Ouverture du buffer
        ob_start();
    ?>

    <!-- Affichage des résultats -->
    <div class='col-lg-7 col-sm-11 shadow-lg rounded bg-light overflow-auto ' style='max-height: 80vh'>
        <?php if (count($detailCommande) > 0 ){?>
        <h3 class="bg-secondary text-center mx-3 py-3 my-3 text-light rounded">Détail de la commande</h3>
        <div class="d-flex justify-content-between px-3 py-3 m-3 border rounded overflow-auto ">
            <div class='d-flex flex-column align-items-between col-7'>
                
                <strong>Statut commande : </strong><br> 
                <?=$detailCommande[1]['STATU_COMMANDE']?><br>
                <div class='card border rounded bg-light-subtle mt-auto p-2 overflow-auto ' style='height:60%'>
                    <strong>Tickets : </strong>
                    
                    <!-- afficher le ticket uniquement si il en existe -->
                    <?php if(isset($tickets) && !empty($tickets)){
                     foreach($tickets as $ticket){ 
                        if($ticket['STATUT_TICKET'] == "FERMÉ" ){
                            $colorLink = 'text-success';
                        } else {
                            $colorLink = 'text-warning';
                        }?>
                       
                        <a class=' <?= $colorLink?> border-bottom mb-2'  href="tickets.php?action=showticket&num_com=<?=$detailCommande[1]['NUM_COMMANDE']?>&num_ticket=<?=$ticket['NUM_TICKET']?>&infoTicket=<?=$infoTicket?>">
                            <span>
                                <strong>N° Ticket :  </strong><?=$ticket['NUM_TICKET'] ?>
                                <strong>Code Ticket : </strong><?=$ticket['CODE_TICKET'] ?>
                                <strong>Statut Ticket : </strong><?=$ticket['STATUT_TICKET'] ?>
                                <strong>ID tech : </strong>
                                    <?php if (isset($ticket['id_technicien'])) : ?>
                                        <?= $ticket['id_technicien'] ?>
                                    <?php elseif (isset($ticket['ID'])) : ?>
                                        <?= $ticket['ID'] ?>
                                    <?php endif; ?>
                            </span>
                        </a>
                        <?php }
                        } else { ?>
                            <span> "Aucun ticket n'est associé à cette commande"</span>
                        
                        <?php } ?>
                    
                </div>
            </div>
                <div class='col-4 text-center'>
                    <div class="card text-light bg-light-subtle" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span ><strong>Nom client :</strong></span>
                                <?=$detailCommande[1]['NOM_CLIENT']?>
                            </li>
                            <li class="list-group-item">
                                <span ><strong>Numéro de commande :</strong></span>
                                <?=$detailCommande[1]['NUM_COMMANDE']?>
                            </li>
                            <li class="list-group-item">
                                <span ><strong>Adresse de livraison :</strong></span><br>
                                <?=$detailCommande[1]['RUE_CLIENT']?>
                                <?=' '. $detailCommande[1]['VILLE_CLIENT']?>
                                <?php if($posteTechnicien == 'SAV') { ?>
                                    <p>
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                            <i class="fas fa-caret-up"></i>
                                        </button>
                                    </p>
                                    <div class="collapse collapse-vertical" id="collapseWidthExample">
                                        <div >
                                            <form action="">
                                                <div>
                                                    <input class="col-10 text-center mb-2" name="rue_client" type="text" placeholder="Nouvelle rue">
                                                </div>
                                                <div>
                                                    <input class="col-10 text-center mb-2" name="ville_client" type="text" placeholder="Nouvelle ville">
                                                </div>
                                                <div>
                                                    <input class="col-10 text-center mb-2" name="code_postal_client" type="text" placeholder="Nouveau CP">
                                                </div>
                                                <button class='btn btn-success' type="submit" value='modifier'>modifier
                                                    <input type="hidden" name="action" value="modifAdress">
                                                    <input type="hidden" name="num_com" value="<?=$detailCommande[1]['NUM_COMMANDE']?>">
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                 
                    <div class='d-flex pt-3 mx-auto justify-content-center'>
                        <form action="tickets.php?" method="GET" class="col-5 d-inline">
                            
                            <button type='submit' class='col-10 py-2 bg-white border-success rounded'>
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <input type="hidden" name="num_com" value="<?= $detailCommande[1]['NUM_COMMANDE'] ?>">
                            <input type="hidden" name="action" value="createT_Exp">
                        </form>
                    </div>
                </div>
        </div>    
        <div class="p-3 row overflow-auto d-flex justify-content-center " style="max-height: 80%">
            <?php foreach ($detailCommande as $commande) { ?>
                <?php if (isset($tickets) && $tickets[0]['STATUT_TICKET'] === "ouvert") {
                        $colorBorder = 'border-danger';
                        $vignette = "<span class='position-absolute top-0 start-50 translate-middle badge rounded-pill bg-warning'>
                        en attente
                        <span class='visually-hidden'>unread messages</span>
                        </span>";
                        ?>
                    <?php

                    } else if (isset($tickets) && $tickets[0]['STATUT_TICKET'] === "FERMÉ") {

                        $colorBorder = 'border-success';
                        $vignette = "<span class='position-absolute top-0 start-50 translate-middle badge rounded-pill bg-success'>
                        Terminée
                        <span class='visually-hidden'>unread messages</span>
                        </span>";
                    } else $vignette = ''?>
                <div class="card  position-relative text-center mx-3 mb-3" style="width: 18rem;">
                    <?=$vignette?>
                   
                    <div class="card-body text-center">
                        <h5 class="pt-3 card-title text-secondary"><?= $commande['NOM_ARTICLE'] ?></h5>       
                        <span class='d-block '>Quantité : <?= $commande['QUANTITE_CONCERNE'] ?></span>
                        <div class="text-center row">
                            <?php if(!isset($tickets)) { ?>
                            <div class='col-5 card-body mx-1 '>
                                <form action="tickets.php?" method="GET" class="col-5 d-inline">
                                    <button type='submit' class='col-10 py-2 bg-white border-success rounded'>
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <input type="hidden" name="action" value="createT_EC">
                                    <input type="hidden" name="num_com" value="<?= $commande['NUM_COMMANDE'] ?>">
                                    <input type="hidden" name="nom_article" value="<?= $commande['NOM_ARTICLE'] ?>">
                                    <input type="hidden" name="code_article" value="<?= $commande['CODE_ARTICLE'] ?>">
                                    <input type="hidden" name="qte_article" value="<?= $commande['QUANTITE_CONCERNE'] ?>">
                                </form>
                            </div>
                            <?php } ?>
                            <?php foreach ($codeArticleTicket as $codearticleT){ ?>
                                <?php if ($codearticleT === $commande['CODE_ARTICLE']): ?>
                                    <?php //var_dump($roleSession) ;
                                        if($posteTechnicien === "SAV") {
                                            $affichageTicket ='AfficheTicket';
                                        } else    
                                            $affichageTicket ='AfficheTicketHotline';
                                         ?>
                                    <div class='col-5 card-body mx-1'>
                                        <form action='tickets.php?' method='GET' class='col-5 d-inline'>
                                            <button type='submit' class='col-10 py-2 bg-white border-warning rounded'>
                                                <i class='fa-solid fa-ticket'></i>
                                            </button>
                                            <input type='hidden' name='action' value='<?= $affichageTicket ?>'>
                                            <input type="hidden" name="num_com" value="<?= $commande['NUM_COMMANDE'] ?>">
                                            <input type="hidden" name="nom_article" value="<?= $commande['NOM_ARTICLE'] ?>">
                                            <input type="hidden" name="code_article" value="<?= $commande['CODE_ARTICLE'] ?>">
                                            <input type="hidden" name="qte_article" value="<?= $commande['QUANTITE_CONCERNE'] ?>">
                                        </form>
                                    </div>        
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div> 
        
        <?php } else {  ?>
            <h5 class="p-3 text-center">Oups !</h5>
            <div class="alert alert-warning text-center" role="alert">
                Cette commande ne contient aucun article
            </div>

            <?php } if ($stockmodal === 'OK') { ?>
        <!-- Modal -->
        <div class="modal fade show" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" style="color: green;">Stock mis à jour</h5>
                    </div>
                    <div class="modal-body">
                        Le stock SAV a été mis à jour avec succès.
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($stockmodal === 'NOK') { ?>
        <!-- Modal -->
        <div class="modal fade show" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" style="color: red;">ERREUR</h5>
                    </div>
                    <div class="modal-body">
                       Cet article à déjà été envoyé en stock SAV
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php  if ($stockmodal === 'CLOSEOK') { ?>
        <!-- Modal -->
        <div class="modal fade show" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" style="color: green;">Ticket cloturé</h5>
                    </div>
                    <div class="modal-body">
                    Le ticket a été cloturé avec succès
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>  

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#simpleModal').modal('show');
    });
</script>

<?php $affichDetail = ob_get_clean(); ?>
