<?php 
        // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Ouverture du buffer
        ob_start();
?>
        <div class=' col-4 shadow-lg m-1 p-4 rounded '>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php?action=encours">En cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="index.php?action=allcom">Commandes</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?action=archives">Archivés</a>
                    </li>
                </ul>
             
            <!-- Affichage du moteur de recherche -->     
            <div class="moteurRecherche">
                <h5 class="text-center my-5 ">Rechercher une commande terminée</h5>
                <form class="px-3 d-flex flex-column " action="index.php?" method='GET'>
                    <div class=" row my-2 justify-content-center">
                        <label for="num_com" class="col-form-label col-md-4 text-md-right">N° Commande :</label>
                        <div class="col-md-7">
                            <input type='text' id="num_com" name='num_com' class="form-control" placeholder='Veuillez respecter le format'>
                        </div>
                    </div>

                    <div class="row my-2 justify-content-center">
                        <label for="code_art" class="col-form-label col-md-4 text-md-right">Code Article :</label>
                        <div class="col-md-7">
                            <input type='text' id="code_art" name='code_art' class="form-control" placeholder='Veuillez respecter le format'>
                        </div>
                    </div>

                    <div class="row my-2 justify-content-center">
                        <label for="nom_client" class="col-form-label col-md-4 text-md-right">Nom client :</label>
                        <div class="col-md-7">
                            <input type='text' id="nom_client" name='nom_client' class="form-control" placeholder='Rechercher par nom de client'>
                        </div>
                    </div>

                    <div class="row my-2 justify-content-center">
                        <label for="code_postal" class="col-form-label col-md-4 text-md-right">Code postal :</label>
                        <div class="col-md-7">
                            <input type='text' id="code_postal" name='code_postal' class="form-control" placeholder='Rechercher par code postal'>
                        </div>
                    </div>

                    <div class="row my-2 justify-content-center">
                        <label for="ville" class="col-form-label col-md-4 text-md-right">Ville :</label>
                        <div class="col-md-7">
                            <input type='text' id="ville" name='ville' class="form-control" placeholder='Rechercher par ville'>
                        </div>
                    </div>
                        <div class="col-12 my-5 text-center">
                            <input class='btn boutton px-5 py-3' type="submit" value='Rechercher'>
                        </div>
                        <input type='hidden' name='action' value='searchTerm'>
                </form>
            </div>
        </div>
 <?php
    // Fermeture du Buffer et insertion dans la variable contenu
    $sideTerm = ob_get_clean();
     ?>
