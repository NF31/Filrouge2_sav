<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>Document</title>

  <link rel="stylesheet" type="text/css" href="../style/gabarit.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="../style/global.css"> -->
  <link rel="stylesheet" href="../style/font.css">
  <link rel="stylesheet" href="../style/sidebar.css">


  <link rel="stylesheet" type="text/css" href="../style/connexion/connexion.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/3b161c540c.js" crossorigin="anonymous"></script>

</head>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Démarrez la session si elle n'est pas déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
// Vérifiez si le prénom du technicien est défini dans la session
$technicianName = isset($_SESSION['technician_name']) ? $_SESSION['technician_name'] : '';

// Maintenant, vous pouvez utiliser $technicianName dans votre header
?>

<body>
  <header>
    <div class="deconnexion">
      <?php if (isset($_SESSION['technician_name'])) : ?>
        <h4 style="display: block; margin-top:10px ; font-size: 20px;" class="logged-in"><i class='bx bx-user'></i> <?php echo $_SESSION['technician_name']; ?></h4>
        <a style="display: block;" href="../controler/login.php?action=deconnexion">Déconnexion</a>
      <?php else : ?>
        <h4 class="logged-out"><i class='bx bx-user'></i> prenom</h4>
      <?php endif; ?>

    </div>


    <div class="container_header">
      <input type="checkbox" name="check" id="check">
      <div class="logo-container">
        <h3 class="logo"><img src="../ressources/images/logo.png " alt="" srcset=""></h3>
      </div>

      <div class="nav-btn">
        <div class="nav-links">
          <ul>
            <li style="display: none" class="nav-link lien-nav" style="--i: .6s">
              <a href="../controler/commandes.php">Commandes</a>
            </li>
            <!--
            <li class="nav-link lien-nav" style="--i: .6s">
              <a href="../controler/admin.php">Admin</a> Liens provisoire 
            </li> -->
            <li class="nav-link lien-nav" style="--i: .6s">
              <a href="#">Accueil</a>
            </li>
            <li class="nav-link lien-nav" style="--i: .85s">
              <a href="#">Expedition</i></a>

            </li>
            <li class="nav-link lien-nav" style="--i: 1.1s">
              <a href="#">Sav</a>

            </li>
            <li class="nav-link lien-nav" style="--i: 1.35s">
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
  <main class='row justify-content-around py-3 px-3' style='height:100vh'>
    <?= $contenu ?>
  </main>
  <!--  FIN de section à mettre dans la variable contenu   -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="../script/connexion.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>