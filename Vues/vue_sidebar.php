<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/sidebar.css">
    <title>SideBar</title>
</head>
<body>
    <div class='d-flex justify-content-around p-2 m-3'>
        <div class=' col-4 shadow-lg m-1 p-4 rounded '>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">En cours</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link  " href="#">Commandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Archivés</a>
                    </li>
                </ul>
            <div class="moteurRecherche" >
                <h4 class="text-center my-5 " >Rechercher une commande</h4>
                <form class="px-3 d-flex flex-column " action="#" method='GET'>
                    <div class=" row my-2 justify-content-center">
                        <label for="num_com" class="col-form-label col-md-4 text-md-right">N° Commande :</label>
                        <div class="col-md-7">
                            <input type='text' id="num_com" name='num_com' class="form-control" placeholder='Veuillez respecter le format'>
                        </div>
                    </div>

                    <div class="row my-2 justify-content-center">
                        <label for="code_art" class="col-form-label col-md-4 text-md-right">Code Article :</label>
                        <div class="col-md-7">
                            <input type='text' id="code_art" name='code_art' class="form-control" placeholder='Veuillez respecter le format'>
                        </div>
                    </div>

                    <div class="row my-2 justify-content-center">
                        <label for="nom_client" class="col-form-label col-md-4 text-md-right">Nom client :</label>
                        <div class="col-md-7">
                            <input type='text' id="nom_client" name='nom_client' class="form-control" placeholder='Rechercher par nom de client'>
                        </div>
                    </div>

                    <div class="row my-2 justify-content-center">
                        <label for="code_postal" class="col-form-label col-md-4 text-md-right">Code postal :</label>
                        <div class="col-md-7">
                            <input type='text' id="code_postal" name='code_postal' class="form-control" placeholder='Rechercher par code postal'>
                        </div>
                    </div>

                    <div class="row my-2 justify-content-center">
                        <label for="ville" class="col-form-label col-md-4 text-md-right">Ville :</label>
                        <div class="col-md-7">
                            <input type='text' id="ville" name='ville' class="form-control" placeholder='Rechercher par ville'>
                        </div>
                    </div>
                        <div class="col-12 my-5 text-center">
                            <input class='btn boutton px-5 ' type="submit" value='Rechercher'>
                        </div>

                </form>
            </div>

        </div>
        <div class='col-8 shadow-lg mx-3 rounded'>
                <h1>div droite</h1>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>