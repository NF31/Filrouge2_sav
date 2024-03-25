<?php 
        // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Ouverture du buffer
        ob_start();

?>        

<div class='col-lg-7 col-sm-11 shadow-lg rounded bg-light overflow-auto ' style='max-height: 80vh'>
        <h3 class="bg-warning text-center mx-3 py-3 my-3 text-light rounded"><?= $titreTicket; ?></h3>
        <div class='d-flex justify-content-between px-3 py-3 m-3 border rounded'>
            <div class="col-2">
                <strong><span>Numero de ticket</span></strong><br>
                <span><?=$ticket['NUM_TICKET'] ?></span>
            </div>
            <div class="col-2">
                <strong><span>Numéro de commande</span></strong><br>
                <span><?=$ticket['NUM_COMMANDE'] ?></span>
            </div>
            <div class="col-2">
                <strong><span>Code ticket</span></strong><br>
                <span><?=$ticket['CODE_TICKET'] ?></span>
            </div>
            <div class="col-2">
                <strong><span>Statut du ticket</span></strong><br>
                <span><?=$ticket['STATUT_TICKET'] ?></span>
            </div>
            <div class="col-2">
                <strong><span>Id technicien</span></strong><br>
                <span>   
                    <?php if (isset($ticket['id_technicien'])) : ?>
                        <?= $ticket['id_technicien'] ?>
                    <?php elseif (isset($ticket['ID'])) : ?>
                        <?= $ticket['ID'] ?>
                    <?php endif; ?></span>
            </div>
        </div>
            <div class='text-center'>
                    <input type='button' value='Retour' onclick='window.history.back();' class='col-2 btn bg-danger text-light rounded  py-2'>
                    <!-- Si le tech est un technicien SAV il peut fermer le ticket -->
                    <?php if($posteTechnicien == 'SAV' && ($ticket['STATUT_TICKET'] == 'ouvert')) {?>
                    <input type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="col-2 btn bg-success text-light rounded  py-2"value="Fermer ticket">
                    <?php } ?>
                </form>
            </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalConfirmation" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalConfirmation">Confirmer la modification du ticket</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Le ticket <strong><?=$ticket['NUM_TICKET']?></strong> est sur le point d'être fermé
                    </div>
                    <div class="modal-footer text-center">
                        <form action="tickets.php?" method="GET">
                        <input type='button' value='Annuler' onclick='window.history.back();' class='col-4 bg-danger text-light rounded border- py-2'>
                            <button type="submit" class="btn btn-success">confirmer</button>

                            <!-- Donnée envoyé dans l'Url -->                               
                            <input type="hidden" name='action' value='fermerTicketExp'>             
                            <input type="hidden" name='num_ticket' value='<?=$ticket['NUM_TICKET']?>'>             
                            <input type="hidden" name='num_com' value='<?=$ticket['NUM_COMMANDE']?>'>             
                            <!-- Fin des données envoyé dans l'Url -->
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Fin de fenêtre modal -->   
       
</div>
<?php    $affichTicket = ob_get_clean(); ?>