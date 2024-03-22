<?php
// Extraction des valeurs de l'URL
$nom_article = isset($_GET['nom_article']) ? $_GET['nom_article'] : '';
$qte_article = isset($_GET['qte_article']) ? $_GET['qte_article'] : '';

// Début du contenu HTML
ob_start();
?>

<div class='col-lg-7 col-sm-11 shadow-lg rounded bg-light' style='max-height: 80vh'>
    <h3 class="rounded border border-warning text-center mx-3 py-3 my-3 text-black ">Renvoie en stock Principal</h3>
    <div class='flex-column text-center justify-content-between px-3 py-3 m-3 border rounded'>
        <p>Récapitulatif des informations</p>
        <div class="d-flex justify-content-around  row">
            <div class='col-3  text-center'>
                <strong><p>Numéro de commande :</p></strong>
                <?= $commande['NUM_COMMANDE']?>
            </div>
            <div class='col-3  text-center'>
                <strong><p>Client :</p></strong>
                <?= $commande['PRENOM_CLIENT']?> 
                <?= $commande['NOM_CLIENT']?> 
            </div>
            <div class='col-3  text-center'>
                <strong><p>Adresse</p></strong>
                <?= $commande['RUE_CLIENT']?> 
                <?= $commande['VILLE_CLIENT']?>
            </div>
        </div>
        <form action="tickets.php?" method='GET'>
            <div class='col-4 mx-auto text-center py-3'>
                <strong>Nom de l'article retourné:</strong>
                <input type="text" name="nom_article" id="nom_article" class="form-control mt-2 mb-2" value="<?= $nom_article ?>" required readonly>
                <strong>Quantité de l'article :</strong>
                <input type="text" name="qte_concerne" id="qte_concerne" class="form-control mt-2 mb-2" value="<?= $qte_concerne ?>" required readonly>

                <strong>Code ticket:</strong>
                <select id='select_code_ticket_modal' class="form-select mt-2" name='code_ticket' >
                    <option value="EC">EC</option>
                </select>
            </div>
            <div class='d-flex col-6 justify-content-around py-3 mx-auto row'>
                <input type='button' value='Annuler' onclick='window.history.back();' class='col-4 bg-danger text-light rounded border- py-2'>
                <input type='submit' value='Renvoyer' class='col-4  bg-success text-light rounded border-0 py-2'> 
                <input type="hidden" name='num_com'  value='<?= $commande['NUM_COMMANDE']?>'>             
                <input type="hidden" name='action' value='RetourStock_PRINCIPAL'>             
                <input type="hidden" name='statut_ticket' value='ouvert'>             
            </div>
        </form>    
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Stock mis à jour</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Le stock SAV a été mis à jour avec succès.
      </div>
      <div class="modal-footer">
        <!-- Ajoutez un bouton pour soumettre le formulaire -->
        <button type="button" class="btn btn-primary" id="submitFormButton">Ok</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action="tickets.php?"]');
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    const submitFormButton = document.getElementById('submitFormButton');

    form.addEventListener('submit', function(event) {
      event.preventDefault(); 
      successModal.show();
    });

    // Ajoutez un gestionnaire d'événements clic pour le bouton de soumission de formulaire dans la modal
    submitFormButton.addEventListener('click', function() {
      form.submit(); // Soumettre le formulaire
    });
  });
</script>


<?php 
$affichCreatT_EC = ob_get_clean();
?>
