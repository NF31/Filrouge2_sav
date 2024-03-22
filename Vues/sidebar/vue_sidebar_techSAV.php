<?php
// Vérifie si la création du technicien a échoué en raison de la limite atteinte
if (isset($_SESSION['error-messageLimit'])) {
    echo '<script>alert("' . $_SESSION['error-messageLimit'] . '");</script>';
    unset($_SESSION['error-messageLimit']);
}
?>

<?php
// VUE QUI AFFICHE LA PARTIE "TECH SAV" DE LA SIDE BAR 
$nom = isset($_GET['nom_techSAV']) ? $_GET['nom_techSAV'] : '';
$prenom = isset($_GET['prenom_techSAV']) ? $_GET['prenom_techSAV'] : '';
$email = isset($_GET['email_techSAV']) ? $_GET['email_techSAV'] : '';

$contenu = '
    <div class="col-lg-4 col-md-8 col-11 shadow-lg m-1 p-4 rounded" style="max-height: 80vh">
        <ul class="col-12 nav nav-tabs">
            <li class="nav-item ">
                <a class="nav-link" aria-current="page" href="admin.php?action=listTechsALL">TECH ALL</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="admin.php?action=listTechsSAV">TECH SAV</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="admin.php?action=listTechsHOTLINE">TECH HOTLINES</a>
            </li>
        </ul>
        <div class="moteurRecherche">
            <h5 class="text-center mt-4 mb-2">Créer un technicien SAV</h5>
            <form class="px-3 d-flex flex-column text-center" action="admin.php" method="GET">
            <div class=" row my-2 justify-content-center">
            <label for="nom_tech" class="col-form-label col-md-4 text-md-right">Nom tech :</label>
            <div class="col-8">
                <input type="text" id="nom_techSAV" name="nom_techSAV" class="form-control" placeholder="Veuillez respecter le format" pattern="[a-zA-Z\- ]{3,}" title="Veuillez saisir au moins 3 lettres" value="' . $nom . '" required>
            </div>
        </div>
        <div class="row my-2 justify-content-center">
            <label for="prenom_techSAV" class="col-form-label col-md-4 text-md-right">Prenom tech :</label>
            <div class="col-8">
                <input type="text" id="prenom_techSAV" name="prenom_techSAV" class="form-control" placeholder="Veuillez saisir un prenom" pattern="[a-zA-Z\- ]{3,}" title="Veuillez saisir au moins 3 lettres" value="' . $prenom . '" required>
            </div>
        </div>
        <div class="row my-2 justify-content-center">
            <label for="email_techSAV" class="col-form-label col-md-4 text-md-right">Email :</label>
            <div class="col-8">
                <input type="email" id="email_techSAV" name="email_techSAV" class="form-control" placeholder="Entrez votre email" value="' . $email . '" required>
            </div>
        </div>';
        if (isset($_SESSION['error-messageEmail'])) {
            $contenu .= '   <div class="class="col-4 offset-md-5"  >
                                <p style="color: red;">'.$_SESSION['error-messageEmail'].'</p>
                            </div>
                        '; 
                        unset($_SESSION['error-messageEmail']);              
        }

        $contenu .='
        <div class="row my-2 justify-content-center">
            <label for="mdp_techSAV" class="col-form-label col-md-4 text-md-right">Mot de passe :</label>
            <div class="col-8">
                <input type="password" id="mdp_techSAV" name="mdp_techSAV" class="form-control" placeholder="Entrez votre mot de passe" required>
            </div>
        </div>'
        ;

                if (isset($_SESSION['error-messagePassword'])) {
                    $contenu .= '   <div class="offset-md-4  row">
                                        <p style="color: red;">'.$_SESSION['error-messagePassword'].'</p>
                                    </div>
                                '; 
                    unset($_SESSION['error-messagePassword']);
                   
                }

                $contenu .='
        <div class="row my-2 justify-content-center">
            <label for="confirm_mdp_techSAV" class="col-form-label col-md-4 text-md-right">Confirmer mot de passe :</label>
            <div class="col-8">
                <input type="password" id="confirm_mdp_techSAV" name="confirm_mdp_techSAV" class="form-control" placeholder="Confirmez votre mot de passe" required>
            </div>
        </div>

                <div class="row my-2 justify-content-center">
                    <label for="poste_techniciens" class="col-form-label col-md-4 text-md-right">POSTE :</label>
                    <div class="col-8">
                        <select id="categorie_techSAV" name="categorie_techSAV" class="form-control">
                            <option value="SAV" selected>SAV</option>
                        </select>
                    </div>
                </div>
               
                <div class="col-12 my-3 text-center">
                    <input class="btn boutton px-5" type="submit" value="Créer">
                    <input type= hidden type="text"  name="action" value="createTechSAV">

                </div>
            </form>
        </div>
    </div>
';
?>
