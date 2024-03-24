<?php
    // Affichage des erreurs php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    ob_start();
?>
   <div class="container col-11 shadow-lg text-center rounded bg-light"  style='max-height: 80vh'>
        <h1> Tickets </h1>
        <?php $date = date('y-m-d') ; echo $date?>
        <div class='flex-row card card-body rounded justify-content-around'>
            <div class="col-2 card car-body rounded text-center">
                <h2>Tout les tickets</h2>
                <?php foreach($allTickets as $ticket) { 
                    if($ticket['STATUT_TICKET'] == 'FERMÉ'){
                        $color = 'bg-success';
                    } else $color = 'bg-warning'?>
                    <div class=' <?=$color?> py-1 m-1 rounded '>
                        <a class='text-white' href="tickets.php?action=showticket&num_ticket=<?=$ticket['NUM_TICKET']?>">
                            N° :<?=$ticket['NUM_TICKET']?>
                            Type :<?=$ticket['CODE_TICKET']?>
                            Statut :<?=$ticket['STATUT_TICKET']?>
                        </a>
                    </div>
                <?php }?>
            </div>
            <div class="col-2 card car-body rounded text-center">
                <h2>Tickets NPAI</h2>
                <?php foreach($ticketNPAI as $ticketNPAI) { ?>
                    <div class='bg-info m-1'>
                        <a href="">
                            <?=$ticketNPAI['NUM_TICKET']?>
                            <?=$ticketNPAI['CODE_TICKET']?>
                            <?=$ticketNPAI['STATUT_TICKET']?>
                        </a>
                    </div>
                <?php }?>
            </div>
            <div class="col-2 card car-body rounded text-center">
                <h2>Tickets NP</h2>
                <?php foreach($ticketNP as $ticketNP) { ?>
                    <div class='bg-info m-1'>
                        <a href="">
                            <?=$ticketNP['NUM_TICKET']?>
                            <?=$ticketNP['CODE_TICKET']?>
                            <?=$ticketNP['STATUT_TICKET']?>
                        </a>
                    </div>
                <?php }?>
            </div>
            <div class="col-2 card car-body rounded text-center">
                <h2>Tickets EC</h2>
            </div>
            <div class="col-2 card car-body rounded text-center">
                <h2>Tickets EP</h2>
            </div>

        </div>
   </div>

<?php $affichAllTickets = ob_get_clean()?>