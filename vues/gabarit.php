<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
  <script src="https://kit.fontawesome.com/3b161c540c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="./style/gabarit.css">
  <link rel="stylesheet" href="style/global.css">
  <link rel="stylesheet" href="style/font.css">
  <link rel="stylesheet" href="./style/sidebar.css">
</head>

<body >
  <header>
    <div class="deconnexion">
      <h4> Bonjour prenom </h4> <a href="">Déconnexion</a>
    </div>

    <div class="container_header">
      <input type="checkbox" name="check" id="check">
      <div class="logo-container">
        <h3 class="logo"><img src="./ressources/images/logo.png " alt="" srcset=""></h3>
      </div>

      <div class="nav-btn">
        <div class="nav-links">
          <ul>
            <li class="nav-link" style="--i: .6s">
              <a href="#">Accueil</a>
            </li>
            <li class="nav-link" style="--i: .85s">
              <a href="#">Expedition</i></a>

            </li>
            <li class="nav-link" style="--i: 1.1s">
              <a href="#">Sav</a>

            </li>
            <li class="nav-link" style="--i: 1.35s">
              <a href="#">Archives</a>
            </li>
          </ul>
        </div>

      </div>

      <div class="hamburger-menu-container">
        <div class="hamburger-menu">
          <div></div>
        </div>
      </div>
    </div>
  </header>
  <!--  DEBUT de section à mettre dans la variable contenu   -->
    <main class='container  d-flex justify-content-around py-5 px-3' style="max-height: 88vh; max-width: 100vw">
        <?= $contenu ?> 
    </main> 
    <!--  FIN de section à mettre dans la variable contenu   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>