<?php
// Extraction des valeurs de l'URL
$nom_article = isset($_GET['nom_article']) ? $_GET['nom_article'] : '';
$qte_article = isset($_GET['qte_article']) ? $_GET['qte_article'] : '';

ob_start();
?>

<div class='col-lg-7 col-sm-11 shadow-lg rounded bg-light' style='max-height: 80vh'>
    <h3 class="rounded border border-warning text-center mx-3 py-3 my-3 text-black ">Création d'un ticket</h3>
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
        <form action="tickets.php?" method='GET'>

                <strong>Code ticket:</strong>
                <select id='select_code_ticket_modal' class="form-select mt-2" name='code_ticket' >
                    <option value="EC">EC</option>
                    <option value="EP">EP</option>
                </select>
            </div>
            <div class='d-flex col-6 justify-content-around py-3 mx-auto row'>
            <input type='button' value='Annuler' onclick='window.history.back();' class='col-4 bg-danger text-light rounded border- py-2'>
                <input type='submit' value='Créer' class='col-4  bg-success text-light rounded border-0 py-2'> 
                <input type="hidden" name='num_com'  value='<?= $commande['NUM_COMMANDE']?>'> 
                <input type="hidden" name="nom_article" value='<?=  $nom_article ?>'>
                <input type="hidden" name="qte_article" value='<?=  $qte_article ?>'>
        
                <input type="hidden" name="action" id="actionInput" value="<?= $action ?>">
                <input type="hidden" name='statut_ticket' value='ouvert'>             
            </div>
        </form>    
</form>

<!-- Script JavaScript pour mettre à jour la valeur de l'input hidden action -->
<script>
    // Sélection de l'élément select
    const selectCodeTicket = document.getElementById('select_code_ticket_modal');
    // Sélection de l'input hidden pour action
    const actionInput = document.getElementById('actionInput');

    // Fonction pour mettre à jour la valeur de l'input action en fonction de la sélection
    function updateActionValue() {
        const selectedCodeTicket = selectCodeTicket.value;
        // Mise à jour de la valeur de l'input hidden action
        if (selectedCodeTicket === 'EC') {
            actionInput.value = 'createT_EC';
        } else {
            actionInput.value = 'createT_EP'; // Définir la valeur par défaut si nécessaire
        }
    }

    // Appel de la fonction pour initialiser la valeur de l'input action lors du chargement de la page
    updateActionValue();

    // Ajout d'un écouteur d'événements pour détecter les changements dans la sélection
    selectCodeTicket.addEventListener('change', updateActionValue);
</script>
    </div>
</div>


<?php 
$affichCreatT_EC = ob_get_clean();
?>
