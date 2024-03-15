<?php 
// Affiche un formulaire de modification qui récupère les infos du tech sélectionné.
// J'ai fais le choix de ne pas pouvoir modifier le poste 1 SEUL select ligne 25.
$contenu .= '<div class="col-7 shadow-sm mx-3 rounded">
    <div class="p-4">
        <h4 class="text-center my-5">Modifier un technicien</h4>
        <form class="px-3 d-flex flex-column" action="index_admin.php?action=listTechsALL" method="GET">
            <input type="hidden" name="action" value="updateTechMAJ"> 
            <div class="row my-2 justify-content-center">
                <label for="nom_tech" class="col-form-label col-md-4 text-md-right">Nom tech :</label>
                <div class="col-md-7">
                    <input type="text" id="nom_tech" name="nom_tech" class="form-control" placeholder="Veuillez respecter le format" pattern="[a-zA-Z]{3,}" title="Veuillez saisir au moins 3 lettres" value="' . $nom . '" required>
                </div>
            </div>
            <div class="row my-2 justify-content-center">
                <label for="prenom_tech" class="col-form-label col-md-4 text-md-right">Prénom tech :</label>
                <div class="col-md-7">
                    <input type="text" id="prenom_tech" name="prenom_tech" class="form-control" placeholder="Veuillez saisir un prénom" pattern="[a-zA-Z]{3,}" title="Veuillez saisir au moins 3 lettres" value="' . $prenom . '" required>
                </div>
            </div>
            <div class="row my-2 justify-content-center">
                <label for="categorie_tech" class="col-form-label col-md-4 text-md-right">Poste :</label>
                <div class="col-md-7">
                    <select id="categorie_tech" name="categorie_tech" class="form-control">
                        <option value="' . $poste . '" selected>' . $poste . '</option>
                    </select>
                </div>
            </div>
            <div class="col-12 my-5 text-center">
                <input class="btn boutton px-5" type="submit" value="Modifier">
                <input type="hidden" name="id_technicien" value="' . $id . '">
                <input type="hidden" name="titreliste" value="' . $titreliste . '">
            </div>
        </form>
    </div>
</div>';
?>
