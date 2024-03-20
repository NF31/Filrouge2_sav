    <?php 
        // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Ouverture du buffer
        ob_start();
    ?>

    <!-- Affichage des résultats -->
    <div class='col-lg-7 col-sm-11 shadow-lg rounded ' style='max-height: 80vh'>
        <?php if (count($detailCommande) > 0 ){?>
        <h4 class="p-3 text-center" >Détail de la commande de Mr  <strong><?= strtoupper($detailCommande[1]['NOM_CLIENT']) ?></strong></h4>
        <div class='text-center'>
            <p>Adresse de livraison </p>
            <p><?=$detailCommande[1]['RUE_CLIENT']?></p>
            <p><?=$detailCommande[1]['VILLE_CLIENT']?></p>
        </div>
        <div class="row overflow-auto d-flex justify-content-center " style="max-height: 80%">
                <?php foreach ($detailCommande as $commande){ ?>
                    <div class="card text-center mx-3 mb-3" style="width: 18rem;">
                        <div class="card-body">
                            
                        <h5 class="card-title text-secondary"><?=($commande['NOM_ARTICLE'])?></h5>
                        <span class='d-block pb-2'>Quantité : <?= $commande['QUANTITE_CONCERNE']?></span>
                            <div class="row">
                                    <div class='col-5 card card-body mx-1 border-success '>
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                    
                                </div>
                                <div class='col-5 card card-body mx-1 border-warning'>
                                    <i class="fa-solid fa-ticket"></i>
                                    </div>
                            </div>
                        </div>
                   </div>
            <?php } ?>
            <div class="text-center ">
                <i><p class="py-2">Expédier à nouveau la commande</p></i>
                <input type="button" class="btn btn-warning " value="Expédier">
            </div>
        </div>
    </div> 
    <?php 
    } else {  ?>
    <h5 class="p-3 text-center" >Oups !</h5>
        <div class="alert alert-warning text-center" role="alert">
            Cette commande ne contient aucun article
        </div>
    <?php }   $affichDetail = ob_get_clean()?>
    