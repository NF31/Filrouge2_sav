<?php

  ob_start();
?>
    <div class='col-lg-7 col-sm-11 shadow-lg rounded bg-light' style='max-height: 80vh'>
        <h3 class="rounded border border-warning text-center mx-3 py-3 my-3 text-black ">
            Informations nouveau ticket</h3>
        <div class='flex-column text-center justify-content-between px-3 py-3 m-3 border rounded'>
              <p class='text-black'>Nouveau ticket</p> 
                <div class="d-flex justify-content-around  row">
                  <div class='col-3  text-center'>
                      <strong><p class='text-black'>Numéro de commande :</p></strong>
                      <?= $num_com?>
                    </div>
                    <div class='col-3  text-center'>
                        <strong><p class='text-black'>Statut du ticket :</p></strong>
                        <?= $statut_ticket?> 
                    </div>
                    <div class='col-3  text-center'>
                        <strong><p class='text-black'>Code ticket :</p></strong>
                        <?= $code_ticket?> 
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalConfirmation" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-3 text-center" id="modalConfirmation">Confirmer la création d'un ticket</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Enregistrer ce ticket dans la base de donnée
                    </div>
                    <div class="modal-footer d-flex justify-content-center mx-auto text-center">
                        <form action="">
                            <div class='d-flex justify-content-center mx-auto'>
                                <button type='button' value='Annuler' onclick='window.history.back();' class='btn btn-danger'>Annuler</button>
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                            </div>

                            <!-- Donnée envoyé dans l'Url -->
                            <input type="hidden" name='num_com'  value='<?= $num_com?>'>             
                            <input type="hidden" name='code_ticket' value='<?= $code_ticket?>'>             
                            <input type="hidden" name='statut_ticket' value='<?= $statut_ticket?>'>             
                            <input type="hidden" name='action' value='creatOk'>             
                            <!-- Fin des données envoyé dans l'Url -->
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Fin de fenêtre modal -->


                <!-- A ajouter dans la fenêtre modal pour confirmation -->
                        <div class='d-flex col-6 justify-content-around py-3 mx-auto row'>
                            <form action="tickets.php?" method='GET'>
                            <input type='button' value='Annuler' onclick='window.history.back();' class='col-4 bg-danger text-light rounded border- py-2'>
                                <input type="hidden" name='num_com'  value='<?= $num_com?>'>             
                                <input type="hidden" name='action'  value='createT_Exp'>             
                                <input type='button' value='Confirmer' data-bs-toggle="modal" data-bs-target="#exampleModal" class='col-4  bg-success text-light rounded border-0 py-2'> 
                            </form>
                    </div>  
            </div>

<?php $affichConfTicket = ob_get_clean();
?> 