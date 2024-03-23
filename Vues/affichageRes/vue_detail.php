    <?php 
        // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Ouverture du buffer
        ob_start();
    ?>

    <!-- Affichage des résultats -->
    <div class='col-lg-7 col-sm-11 shadow-lg rounded bg-light overflow-auto ' style='max-height: 80vh'>
        <?php if (count($detailCommande) > 0 ){?>
        <h3 class="bg-secondary text-center mx-3 py-3 my-3 text-light rounded">Détail de la commande</h3>
        <div class="d-flex justify-content-between px-3 py-3 m-3 border rounded">
            <div class='d-flex flex-column align-items-between col-7'>
                <strong>Statut commande : </strong><br> 
                <?=$detailCommande[1]['STATU_COMMANDE']?><br>
                <div class='card border rounded bg-light-subtle mt-auto p-2' style='height:50%'>
                    <strong>Tickets commande : </strong>
                    <!-- afficher le ticket uniquement si il en existe -->
                    <?php
                    
                    if(isset($tickets) && !empty($tickets)){
                     foreach($tickets as $ticket){
                        echo "N° Ticket : " . $ticket['NUM_TICKET'] . ' - Code Ticket : ' . $ticket['CODE_TICKET'] . ' - Statut Ticket : ' . $ticket['STATUT_TICKET'] . ' - ID tech : ' . $ticket['ID'] . '<br>';
                        }
                        } else {
                            echo "Aucun ticket n'est associé à cette commande";
                        
                        } ?>
                   
                </div>
            </div>
                <div class='col-4 text-center'>
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
                                <?=' '. $detailCommande[1]['VILLE_CLIENT']?>
                                <?php if($posteTechnicien == 'SAV') { ?>
                                    <p>
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                            <i class="fas fa-caret-up"></i>
                                        </button>
                                    </p>
                                    <div class="collapse collapse-vertical" id="collapseWidthExample">
                                        <div >
                                            <form action="">
                                                <div>
                                                    <input class="col-10 text-center mb-2" name="rue_client" type="text" placeholder="Nouvelle rue">
                                                </div>
                                                <div>
                                                    <input class="col-10 text-center mb-2" name="ville_client" type="text" placeholder="Nouvelle ville">
                                                </div>
                                                <div>
                                                    <input class="col-10 text-center mb-2" name="code_postal_client" type="text" placeholder="Nouveau CP">
                                                </div>
                                                <button class='btn btn-success' type="submit" value='modifier'>modifier
                                                    <input type="hidden" name="action" value="modifAdress">
                                                    <input type="hidden" name="num_com" value="<?=$detailCommande[1]['NUM_COMMANDE']?>">
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                    <!-- DEBUT Zone -   Affichage du bouton créer ticket si role = SAV -->
                 
                    <div class='d-flex pt-3 mx-auto justify-content-center'>
                        <form action="tickets.php?" method="GET" class="col-5 d-inline">
                            
                            <button type='submit' class='col-10 py-2 bg-white border-success rounded'>
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <input type="hidden" name="num_com" value="<?= $detailCommande[1]['NUM_COMMANDE'] ?>">
                            <input type="hidden" name="action" value="createT_Exp">
                        </form>
                    </div>
                   
                    <!-- FIN Zone -   Affichage du bouton créer ticket si role = SAV -->
                </div>
        </div>    
        <div class="row overflow-auto d-flex justify-content-center" style="max-height: 80%">
            <?php foreach ($detailCommande as $commande) { ?>
                <div class="card text-center mx-3 mb-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-secondary"><?= $commande['NOM_ARTICLE'] ?></h5>
                        <span class='d-block pb-2'>Quantité : <?= $commande['QUANTITE_CONCERNE'] ?></span>
                        <div class="row">
                            <div class='col-5 card card-body mx-1 border-success'>
                                <form action="tickets.php?" method="GET" class="col-12 d-inline">
                                    <button type='submit' class='col-12 py-2 bg-white border-success rounded'>
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <input type="hidden" name="action" value="createT_EC">
                                    <input type="hidden" name="num_com" value="<?= $commande['NUM_COMMANDE'] ?>">
                                    <input type="hidden" name="nom_article" value="<?= $commande['NOM_ARTICLE'] ?>">
                                    <input type="hidden" name="code_article" value="<?= $commande['CODE_ARTICLE'] ?>">
                                    <input type="hidden" name="qte_article" value="<?= $commande['QUANTITE_CONCERNE'] ?>">
                                </form>
                            </div>
                            <?php foreach ($codeArticleTicket as $codearticleT){ ?>
                                <?php if ($codearticleT === $commande['CODE_ARTICLE']): ?>
                                    <?php //var_dump($roleSession) ;
                                        if($posteTechnicien === "SAV") {
                                            $affichageTicket ='AfficheTicket';
                                        } else    
                                            $affichageTicket ='AfficheTicketHotline';
                                         ?>
                                    <div class='col-5 card card-body mx-1 border-warning'>
                                        <form action='tickets.php?' method='GET' class='col-12 d-inline'>
                                            <button type='submit' class='col-12 py-2 bg-white border-warning rounded'>
                                                <i class='fa-solid fa-ticket'></i>
                                            </button>
                                            <input type='hidden' name='action' value='<?= $affichageTicket ?>'>
                                            <input type="hidden" name="num_com" value="<?= $commande['NUM_COMMANDE'] ?>">
                                            <input type="hidden" name="nom_article" value="<?= $commande['NOM_ARTICLE'] ?>">
                                            <input type="hidden" name="code_article" value="<?= $commande['CODE_ARTICLE'] ?>">
                                            <input type="hidden" name="qte_article" value="<?= $commande['QUANTITE_CONCERNE'] ?>">
                                        </form>
                                    </div>        
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else {  ?>
        <h5 class="p-3 text-center">Oups !</h5>
        <div class="alert alert-warning text-center" role="alert">
            Cette commande ne contient aucun article
        </div>
    <?php }   $affichDetail = ob_get_clean(); ?>
