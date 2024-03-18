<?php 
    // Affichage des erreurs php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Ouverture du buffer
    ob_start();
?>

<!-- Affichage des résultats -->
<div class='col-lg-7 col-sm-12 shadow-lg rounded '>
    <?php if (count($detailCommande) > 0 ){?>
    <h4 class="p-3 text-center" >Détail de la commande de Mr / Mme : <span class=""><?= $detailCommande[1]['NOM_CLIENT'] ?></span></h4>
    <div class="row overflow-auto d-flex justify-content-center " style="max-height: 80%">
            <?php foreach ($detailCommande as $commande){ ?>
                <div class="card text-center mx-3 mb-3" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title"><?= $commande['NOM_ARTICLE']?></h5>
                    <a href="#" class="btn btn-primary">Créer un ticket</a>
                    </div>
            </div>
        <?php } ?>
        <div class="text-center ">
            <i><p class="py-2">Expédier à nouveau la commande</p></i>
            <input type="button" class="btn btn-warning " value="Ticket Expédition">
        </div>
    </div>
</div> 
<?php 
} else {  
    echo "<div class='d-flex justify-content-center align-items-center'>
    <img src='../ressources/images/Error_empty.svg' alt='Image dossier vide' width='150px' height='150px'>
</div>";

}
    $affichDetail = ob_get_clean() ?>