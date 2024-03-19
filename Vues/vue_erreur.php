<?php 

    // Affichage des erreurs php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    "<div> class='col-8 shadow-lg px-2 mx-2 py-2 rounded  style='max-height: 100vh'>
        <h4 class='p-3 text-center' >Quelque chose s'est mal passé</h4>
            <h3>".$msgErreur."</h3>
        </div>"

?>