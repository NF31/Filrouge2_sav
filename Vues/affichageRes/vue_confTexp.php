<?php

  ob_start();
?>

    <div class='col-lg-7 col-sm-11 shadow-lg rounded bg-light' style='max-height: 80vh'>
        <h3 class="rounded border border-warning text-center mx-3 py-3 my-3 text-black ">
            Informations du nouveau ticket</h3>
        <div class='flex-column text-center justify-content-between px-3 py-3 m-3 border rounded'>
              <p>Nouveau ticket</p>
                <div class="d-flex justify-content-around  row">
                  <div class='col-3  text-center'>
                      <strong><p>Numéro de commande :</p></strong>
                      <?= $num_com?>
                    </div>
                    <div class='col-3  text-center'>
                        <strong><p>Statut du ticket :</p></strong>
                        <?= $statut_ticket?> 
                    </div>
                    <div class='col-3  text-center'>
                        <strong><p>Code ticket :</p></strong>
                        <?= $code_ticket?> 
                    </div>
                </div>
                <!-- A ajouter dans la fenêtre modal pour confirmation -->
                <form action="#" method='GET'>
                    <div class='col-4 mx-auto text-center py-3'>
                     
                    </div>
                    <div class='d-flex col-6 justify-content-around py-3 mx-auto row'>
                        <form action="tickets.php?" method='GET'>
                            <input type='submit' value='Annuler' class='col-4 bg-danger text-light rounded border-0 py-2'>
                            <input type="hidden" name='num_com'  value='<?= $num_com?>'>             
                            <input type="hidden" name='action'  value='createT_Exp'>             
                        </form>
                            <input type='button' value='Confirmer' class='col-4  bg-success text-light rounded border-0 py-2'> 
                            <input type="hidden" name='num_com'  value='<?= $num_com?>'>             
                            <input type="hidden" name='code_ticket' value='<?= $code_ticket?>'>             
                            <input type="hidden" name='statut_ticket' value='<?= $statut_ticket?>'>             
                    </div>
                </form>    
            </div>

<?php $affichConfTicket = ob_get_clean();
?> 