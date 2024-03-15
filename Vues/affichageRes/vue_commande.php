<?php 
        // Affichage des erreurs php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Ouverture du buffer
        ob_start();
?>
       <!-- Affichage des résultats -->
       <div class='col-8 shadow-lg px-2 mx-2 py-2 rounded  style="max-height: 100vh"'>
       <h4 class="p-3 text-center" >Commande sélectionnée </h4>
       <table class=' table table-bordered table-striped' >
           <div class="container overflow-auto " style="max-height: 80%">
                            <th>N°Commande</th>
                            <th>Date</th>
                            <th>Ville</th>
                            <th>Code postal</th>
                            <th>Rue</th>
                            <th>Id client</th>
                            <th>Statut</th>
                                <tr>
                                    <td><?= $commandes['NUM_COMMANDE'] ?></a></td>
                                    <td><?= $commandes['DATE_COM'] ?></td>
                                    <td><?= $commandes['VILLE_CLIENT'] ?></td>
                                    <td><?= $commandes['CODE_POSTAL_CLIENT'] ?></td>
                                    <td><?= $commandes['RUE_CLIENT'] ?></td>
                                    <td><?= $commandes['ID_CLIENT'] ?> </td>
                                    <td><?= $commandes['STATU_COMMANDE'] ?> </td>
                                </tr>
                    </table>
                    <div class='text-center'>
                        <input type="button" class="btn btn-warning" value="Modifier">
                        <input type="button" class="btn btn-warning" value="Creer un ticket">
                    </div>
            </div>
       </div>

       <?php  $affichCom = ob_get_clean() ?>