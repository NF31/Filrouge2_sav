<?php
    // Affichage des erreurs PHP 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    ob_start();
?>
<div class="container col-11 shadow-lg text-center rounded bg-light" style='max-height: 80vh'>
    <h1>Tickets</h1>
    <?php $date = date('y-m-d'); echo $date?>
    <div class='row justify-content-around'>
        <div class="col-12 col-md-6 col-lg-3 card car-body rounded text-center mb-3">
            <h2>Tout les tickets</h2>
            <?php foreach($allTickets as $ticket) { 
                if($ticket['STATUT_TICKET'] == 'FERMÉ'){
                    $color = 'bg-success';
                } else $color = 'bg-warning';?>
                <div class='<?=$color?> py-1 m-1 rounded'>
                    <a class='text-white' href="tickets.php?action=showticket&infoTicket=NPAI&num_ticket=<?=$ticket['NUM_TICKET']?>">
                        N° : <?=$ticket['NUM_TICKET']?>
                        Type : <?=$ticket['CODE_TICKET']?>
                        Statut : <?=$ticket['STATUT_TICKET']?>
                    </a>
                </div>
            <?php }?>
        </div>
        <div class="col-12 col-md-6 col-lg-3 card car-body rounded text-center mb-3">
            <h2>Tickets NPAI</h2>
            <?php foreach($ticketNPAI as $ticket) { ?>
                <div class='bg-info m-1'>
                    <a href="">
                        <?=$ticket['NUM_TICKET']?>
                        <?=$ticket['CODE_TICKET']?>
                        <?=$ticket['STATUT_TICKET']?>
                    </a>
                </div>
            <?php }?>
        </div>
        <div class="col-12 col-md-6 col-lg-3 card car-body rounded text-center mb-3">
            <h2>Tickets NP</h2>
            <?php foreach($ticketNP as $ticket) { ?>
                <div class='bg-info m-1'>
                    <a href="">
                        <?=$ticket['NUM_TICKET']?>
                        <?=$ticket['CODE_TICKET']?>
                        <?=$ticket['STATUT_TICKET']?>
                    </a>
                </div>
            <?php }?>
        </div>
        <div class="col-12 col-md-6 col-lg-3 card car-body rounded text-center mb-3">
            <h2>Tickets EC</h2>
            <?php foreach($ticketEC as $ticket) { ?>
                <div class='bg-info m-1'>
                    <a href="">
                        <?=$ticket['NUM_TICKET']?>
                        <?=$ticket['CODE_TICKET']?>
                        <?=$ticket['STATUT_TICKET']?>
                    </a>
                </div>
            <?php }?>
        </div>
    </div>
</div>

<?php $affichAllTickets = ob_get_clean()?>
