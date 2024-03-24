<?php

  ob_start();
?>

    <div class='col-lg-7 col-sm-11 shadow-lg rounded bg-light' style='max-height: 80vh'>
        <h3 class="rounded border border-warning text-center mx-3 py-3 my-3 text-black ">Création d'un ticket de réexpedition</h3>
        <div class='flex-column text-center justify-content-between px-3 py-3 m-3 border rounded'>
              <p class='text-black'>Récapitulatif des informations de livraison</p>
                <div class="d-flex justify-content-around  row">
                  <div class='col-3  text-center'>
                      <strong><p class='text-black'>Numéro de commande :</p></strong>
                      <?= $commande['NUM_COMMANDE']?>
                    </div>
                    <div class='col-3  text-center'>
                        <strong><p class='text-black'>Client :</p></strong>
                        <?= $commande['PRENOM_CLIENT']?> 
                        <?= $commande['NOM_CLIENT']?> 
                    </div>
                    <div class='col-3  text-center'>
                        <strong><p class='text-black'>Adresse</p></strong>
                        <?= $commande['RUE_CLIENT']?> 
                        <?= $commande['VILLE_CLIENT']?>
                    </div>
                </div>
                <form action="#" method='GET'>
                    <div class='col-4 mx-auto text-center py-3'>
                        <strong>Code ticket:</strong>
                        <select id='select_code_ticket_modal' class="form-select mt-2" name='code_ticket' >
                            <option value="NPAI">NPAI</option>
                            <option value="NP">NP</option>
                        </select>
                    </div>
                    <div class='d-flex col-6 justify-content-around py-3 mx-auto row'>
                            <input type='button' value='Annuler' onclick='window.history.back();' class='col-4 bg-danger text-light rounded border- py-2'>
                            <input type='submit' value='Créer' class='col-4  bg-success text-light rounded border-0 py-2'> 
                            <input type="hidden" name='num_com'  value='<?= $commande['NUM_COMMANDE']?>'>             
                            <input type="hidden" name='action' value='confirmeCreatT_Exp'>             
                            <input type="hidden" name='statut_ticket' value='ouvert'>             
                    </div>
                </form>    
            </div>

<?php $affichCreatTexp = ob_get_clean();
?> 