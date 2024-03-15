<?php 
        // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Ouverture du buffer
        ob_start();
?>
       <!-- Affichage des résultats -->
       <div class='col-8 shadow-lg ms-2 py-2 rounded  style="max-height: 100vh"'>
       <h4 class="p-3 text-center" >Résultat de toutes les commandes </h4>
                <div class="container overflow-auto " style="max-height: 80%">
                    <table class='table table-bordered table-striped' >
                            <th>N°Commande</th>
                            <th>Date</th>
                            <th>Ville</th>
                            <th>Code postal</th>
                            <th>Rue</th>
                            <th>Id client</th>
                            <th>Statut</th>
                            <?php foreach ($commandes as $commande) { 
                                $num_com = $commande['NUM_COMMANDE'];
                                ?>
                                
                                <tr>
                                    <td><a href="index.php?num_com=<?=$num_com?>&action=commande"><?= $commande['NUM_COMMANDE'] ?></a></td>
                                    <td><?= $commande['DATE_COM'] ?></td>
                                    <td><?= $commande['VILLE_CLIENT'] ?></td>
                                    <td><?= $commande['CODE_POSTAL_CLIENT'] ?></td>
                                    <td><?= $commande['RUE_CLIENT'] ?></td>
                                    <td><?= $commande['ID_CLIENT'] ?> </td>
                                    <td><?= $commande['STATU_COMMANDE'] ?> </td>
                                </tr>
                            <?php } ?>
                    </table>
                </div>
        </div>

        <!-- Fermeture du buffer -->
   <?php     $affichResAll = ob_get_clean() ?>