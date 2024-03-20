<?php 
        // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Ouverture du buffer
        ob_start();
?>
       <!-- Affichage des résultats -->
       <div class="col-lg-7 col-sm-11 shadow-lg  rounded bg-light"  style='max-height: 80vh'>
       <h4 class="p-3 text-center" ><?= $titreResultats ?></h4>
      <?php if(isset($commandes) && !empty($commandes)){ ?>
                <div class="container overflow-auto " style="max-height: 80%">
                    <table class='table table-bordered table-striped' style="max-height: 80%" >
                            <th>N°Commande</th>
                            <th>Nom client</th>
                            <th>Date</th>
                            <th>Ville</th>
                            <th>Code postal</th>
                            <th>Rue</th>
                            <th>Statut</th>
                            <?php foreach ($commandes as $commande) {
                                $num_com = $commande['NUM_COMMANDE'];
                                ?>
                                
                               <a href=""><tr>
                                    <td><a href="commandes.php?num_com=<?=$num_com?>&action=commande"><?= $commande['NUM_COMMANDE'] ?></a></td>
                                    <td><?= $commande['NOM_CLIENT'] ?> </td>
                                    <td><?= $commande['DATE_COM'] ?></td>
                                    <td><?= $commande['VILLE_CLIENT'] ?></td>
                                    <td><?= $commande['CODE_POSTAL_CLIENT'] ?></td>
                                    <td><?= $commande['RUE_CLIENT'] ?></td>
                                    <td><?= $commande['STATU_COMMANDE'] ?> </td>
                                </tr></a>
                            <?php } ?>
                    </table>
                </div>
                <?php } else { ?> 
                    <div class="alert alert-warning text-center" role="alert">
                        Aucun résultat le correspond à votre recherche
                    </div> 
                    <?php } ?>
        </div>

        <!-- Fermeture du buffer -->
   <?php     $affichResultats = ob_get_clean() ?>