    <?php 
        // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Ouverture du buffer
        ob_start();
    ?>

    <!-- Affichage des résultats -->
    <div class='col-lg-7 col-sm-11 shadow-lg rounded bg-light' style='max-height: 80vh'>
        <?php if (count($detailCommande) > 0 ){?>
            <h3 class="bg-secondary text-center mx-3 py-3 my-3 text-light rounded">Détail de la commande</h3>
        <div class="d-flex justify-content-between px-3 py-3 m-3 border rounded">
            <div>
                <strong>Statut de la commande : </strong><br> 
                <?=$detailCommande[1]['STATU_COMMANDE']?>
            </div>
                <div class=' text-center'>
                    <div class="card text-light bg-light-subtle" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span ><strong>Nom client :</strong></span>
                                <?=$detailCommande[1]['NOM_CLIENT']?>
                            </li>
                            <li class="list-group-item">
                                <span ><strong>Numéro de commande :</strong></span>
                                <?=$detailCommande[1]['NUM_COMMANDE']?>
                            </li>
                            <li class="list-group-item">
                                <span ><strong>Adresse de livraison :</strong></span><br>
                                <?=$detailCommande[1]['RUE_CLIENT']?>
                                <?=' '. $detailCommande[1]['VILLE_CLIENT']?>&nbsp; &nbsp;
                                <i class="fa-solid fa-pen"></i>
                            </li>
                        </ul>
                    </div>
                    <div class='d-flex mx-auto justify-content-between  row col-12 mt-3 '> 
                        <form action="tickets.php?" method="GET">
                            <button type='submit' class='col-5 py-2 bg-white border-success rounded'>
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <input type="hidden" name="num_com" value="<?= $detailCommande[1]['NUM_COMMANDE'] ?>">
                            <input type="hidden" name="action" value="createT_Exp">
                        </form>
                        <form action="tickets.php?" method="GET">
                            <button type='submit' class='col-5 py-2 bg-white border-warning rounded'>
                                <i class="fa-solid fa-ticket"></i>
                            </button>
                            <input type="hidden" name="num_com" value="<?= $detailCommande[1]['NUM_COMMANDE'] ?>">
                            <input type="hidden" name="action" value="showT_Exp">
                        </form>
                    </div>
                </div>
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
                                </div>
                                <div class='col-5 card card-body mx-1 border-warning'>
                                    <i class="fa-solid fa-ticket"></i>
                                </div>
                            </div>
                        </div>
                   </div>
            <?php } ?>
            
        </div>
    </div> 
    <?php 
    } else {  ?>
    <h5 class="p-3 text-center" >Oups !</h5>
        <div class="alert alert-warning text-center" role="alert">
            Cette commande ne contient aucun article
        </div>
    <?php }   $affichDetail = ob_get_clean()?>
    