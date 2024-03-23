<?php
// Extraction des valeurs de l'URL
$nom_article = isset($_GET['nom_article']) ? $_GET['nom_article'] : '';
$qte_article = isset($_GET['qte_article']) ? $_GET['qte_article'] : '';

// Début du contenu HTML
ob_start();
?>

<div class='col-lg-7 col-sm-11 shadow-lg rounded bg-light' style='max-height: 80vh'>
    <h3 class="rounded border border-warning text-center mx-3 py-3 my-3 text-black ">Création d'un ticket</h3>
    <div class='flex-column text-center justify-content-between px-3 py-3 m-3 border rounded'>
        <p>Récapitulatif des informations de livraison</p>
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
                <input type="text" name="nom_article" id="nom_article" class="form-control mt-2 mb-2" value="<?= $nom_article ?>" required>
                <strong>Quantité de l'article :</strong>
                <select  class="form-select mt-2 mb-2" name='qte_concerne' >
                    <?php
                    // Génération des options de la liste déroulante pour la quantité d'articles
                    for ($i = 1; $i <= $qte_article; $i++) {
                        echo "<option name='qte_concerne'value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <strong>Code ticket:</strong>
                <select id='select_code_ticket_modal' class="form-select mt-2" name='code_ticket' >
                    <option value="EC">EC</option>
                </select>
            </div>
            <div class='d-flex col-6 justify-content-around py-3 mx-auto row'>
            <input type='button' value='Annuler' onclick='window.history.back();' class='col-4 bg-danger text-light rounded border- py-2'>
                <input type='submit' value='Créer' class='col-4  bg-success text-light rounded border-0 py-2'> 
                <input type="hidden" name='num_com'  value='<?= $commande['NUM_COMMANDE']?>'>             
                <input type="hidden" name='action' value='confirmeCreatT_EC'>             
                <input type="hidden" name='statut_ticket' value='ouvert'>             
            </div>
        </form>    
    </div>
</div>
<!-- Script JavaScript pour gérer les suggestions -->
<script>
const nom_articleInput = document.getElementById('nom_article');
const suggestionsList = document.createElement('ul');
suggestionsList.setAttribute('id', 'suggestions');
suggestionsList.setAttribute('class', 'list-group'); // Ajout de la classe list-group pour la mise en forme Bootstrap
nom_articleInput.parentNode.insertBefore(suggestionsList, nom_articleInput.nextSibling);

nom_articleInput.addEventListener('input', function() {
    const query = nom_articleInput.value;

    // Efface la liste de suggestions précédente
    suggestionsList.innerHTML = '';

    // Affiche les nouvelles suggestions
    <?php
    $jsonSuggestions = json_encode($suggestions);
    echo "const suggestions = " . $jsonSuggestions . ";";
    ?>

    let count = 0; // Compteur pour limiter les suggestions à 5
    suggestions.forEach(suggestion => {
        if (suggestion.NOM_ARTICLE.toLowerCase().includes(query.toLowerCase())) {
            if (count < 5) { // Limiter à 5 suggestions
                const li = document.createElement('li');
                li.setAttribute('class', 'list-group-item'); // Ajout de la classe list-group-item pour la mise en forme Bootstrap
                li.textContent = suggestion.NOM_ARTICLE;
                li.addEventListener('click', function() {
                    nom_articleInput.value = suggestion.NOM_ARTICLE; // Remplir le champ avec la suggestion sélectionnée
                    suggestionsList.innerHTML = ''; // Effacer la liste des suggestions après la sélection
                });
                suggestionsList.appendChild(li);
                count++;
            }
        }
    });
});
</script>


<?php 
$affichCreatT_EC = ob_get_clean();
?>
