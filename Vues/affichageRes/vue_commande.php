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
        <h5 class="p-3 text-center" >Commande sélectionnée </h5>
        <div class="container overflow-auto " style="max-height: 80%">
            <table class='table table-bordered table-striped'>
                <th>N°Commande</th>
                <th>Nom client</th>
                <th>Date</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Rue</th>
                <th>Statut</th>
                <tr>
                    <td><?= $commandes['NUM_COMMANDE'] ?></a></td>
                    <td><?= $commandes['NOM_CLIENT'] ?> </td>
                    <td><?= $commandes['DATE_COM'] ?></td>
                    <td><?= $commandes['VILLE_CLIENT'] ?></td>
                    <td><?= $commandes['CODE_POSTAL_CLIENT'] ?></td>
                    <td><?= $commandes['RUE_CLIENT'] ?></td>
                    <td><?= $commandes['STATU_COMMANDE'] ?> </td>
                </tr>
            </table>
        </div>
            <div class='text-center'>
                <form action="commandes.php?" method="GET">
                    <input type="hidden" name="num_com" value="<?= $commandes['NUM_COMMANDE'] ?>">
                    <input type="hidden" name="action" value="detail">
                    <input type="submit" class="btn btn-warning" value="Détails">
                </form>
            </div>
       </div>

       <?php  $affichCom = ob_get_clean() ?>