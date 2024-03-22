<?php 
// VUE QUI AFFICHE LA PARTIE "TECH ALL" DE LA SIDE BAR 

$contenu = '
    <div class="col-lg-4 col-md-8 col-11 shadow-lg m-1 p-4 rounded" style="max-height: 80vh">
        <ul class="col-12 nav nav-tabs">
            <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="admin.php?action=listTechsALL">TECH ALL</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="admin.php?action=listTechsSAV">TECH SAV</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="admin.php?action=listTechsHOTLINE">TECH HOTLINES</a>
            </li>
        </ul>
        <div class="moteurRecherche">
            <h5 class="text-center mt-4 mb-2">Rechercher un technicien</h5>
            <form class="px-3 d-flex flex-column text-center" action="admin.php" method="GET">
                <div class=" row my-2 justify-content-center">
                    <label for="nom_tech" class="col-form-label text-md-right">Nom tech :</label>
                    <div class="col-8">
                        <input type="text" id="nom_tech" name="nom_tech" class="form-control" placeholder="Veuillez respecter le format">
                    </div>
                </div>
                <div class="row my-2 justify-content-center">
                    <label for="prenom_tech" class="col-form-label text-md-right">Prenom tech :</label>
                    <div class="col-8">
                        <input type="text" id="prenom_tech" name="prenom_tech" class="form-control" placeholder="Veuillez saisir un prenom">
                    </div>
                </div>
                <div class="row my-2 justify-content-center">
                    <label for="poste_techniciens" class="col-form-label  text-md-right">POSTE :</label>
                    <div class="col-8">
                        <select id="categorie_tech" name="categorie_tech" class="form-control">
                            <option value="SAV">SAV</option>
                            <option value="HOTLINE">HOTLINE</option>
                        </select>
                    </div>
                </div>
               
                <div class="col-12 my-3 text-center">
                    <input class="btn boutton px-5" type="submit" value="Rechercher">
                    <input type= hidden type="text"  name="action" value="rechercherTechnicien">
                </div>
            </form>
        </div>
    </div>
';
?>
