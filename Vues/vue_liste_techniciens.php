<?php // Ce code permet de creer un tableau dynamique de technicien 
// avec les boutons "modifier" et "supprimer" pour chaque ligne

// la var "$contenu"  est une concatenation car c'est la suite de "vue_sidebar_.."

//On creer les colonnes du tableau dans l'espace reservé au tableau sur la page.
$contenu .= '<div class="col-lg-7 col-sm-11 shadow-lg rounded" style="max-height: 80vh">

<h4 class="p-3 text-center">'.$titreliste.'</h4>
    <div class="container overflow-auto style="max-height: 80%""><table class="table table-bordered table-striped">
        <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Email</th>
        <th scope="col">Poste</th>
        <th scope="col">Mise à jour</th>
        <th scope="col">Suppression</th>
        </tr>
        </thead>
    <tbody>';

//  On fait une boucle d'affichage de la requête selectionner dynamiquement. 
// Envoyer ici dans $techniciens depuis l'index.

if (isset($techniciens) && !empty($techniciens)) {
    foreach ($techniciens as $technicien) {
        $contenu .= '<tr>';
        $contenu .= '<td>' . $technicien['id'] . '</td>';
        $contenu .= '<td>' . $technicien['nom'] . '</td>';
        $contenu .= '<td>' . $technicien['prenom'] . '</td>';
        $contenu .= '<td>' . $technicien['email'] . '</td>';
        $contenu .= '<td>' . $technicien['poste'] . '</td>';

        $contenu .= '<td>
        <form action="admin.php" method="GET">
        <input type="hidden" name="action" value="updTech">
        <input type="hidden" name="id_technicien" value="' . $technicien['id'] . '"> 
        <input type="hidden" name="nom_technicien" value="' . $technicien['nom'] . '">
        <input type="hidden" name="prenom_technicien" value="' . $technicien['prenom'] . '"> 
        <input type="hidden" name="poste_technicien" value="' . $technicien['poste'] . '"> 
        <input type="hidden" name="email_technicien" value="' . $technicien['email'] . '"> 

        <button type="submit" class="btn btn-warning">Modifier</button>
        </form>
        </td>';

        $contenu .= '<td>
    <form id="deleteForm_'.$technicien['id'].'" action="admin.php" method="GET">
        <input type="hidden" name="action" value="suppTech">
        <input type="hidden" name="id_technicien" value="' . $technicien['id'] . '"> 
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmationModal_'.$technicien['id'].'">Supprimer</button>
    </form>
</td>';

// Modal POUR CHAQUE TECHNICIENS: 

$contenu .= '<div class="modal fade" id="confirmationModal_'.$technicien['id'].'" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel_'.$technicien['id'].'" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel_'.$technicien['id'].'">Confirmer la suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer le technicien '.$technicien['nom'].' '.$technicien['prenom'].' au poste '.$technicien['poste'].' ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" form="deleteForm_'.$technicien['id'].'" class="btn btn-danger">Confirmer</button>
            </div>
        </div>
    </div>
</div>';

        $contenu .= '</tr>';
    }
} else {
    $contenu .= '<tr><td colspan="6">Aucun technicien trouvé.</td></tr>';
}
// On ferme les balises $contenu ici et dans  "vue_sidebar_.."

$contenu .= '</tbody></table></div></div></div>';

?>

<!--  le code pour inclure jQuery, Bootstrap JavaScript et le script de gestion des modals -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
    // Script JavaScript pour gérer l'affichage et la fermeture des modals
    $(document).ready(function(){
        // Activer le modal lorsqu'un bouton est cliqué
        $('[data-toggle="modal"]').click(function(){
            var target_modal = $(this).data('target');
            $(target_modal).modal('show');
        });

        // Fermer le modal lorsqu'un bouton de fermeture est cliqué
        $('.modal .close, .modal button[data-dismiss="modal"]').click(function(){
            $(this).closest('.modal').modal('hide');
        });

        // Fermer le modal lorsque l'utilisateur clique en dehors du modal
        $('.modal').on('click', function(e) {
            if ($(e.target).hasClass('modal')) {
                $(this).modal('hide');
            }
        });
    });
</script>

