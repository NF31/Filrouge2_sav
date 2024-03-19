<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/3b161c540c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../../Filrouge2_sav/style/connexion/connexion.css">
    <link rel="stylesheet" type="text/css" href="../../style/gabarit.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="deconnexion">
            <h4> <i class='bx bx-user'></i> prenom </h4> <a href="">Déconnexion</a>
        </div>

        <div class="container">
            <input type="checkbox" name="check" id="check">
            <div class="logo-container">
                <h3 class="logo"><img src="../images/logo.png" alt="" srcset=""></h3>
            </div>

            <div class="nav-btn login">
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


    <!--
    <section class="connexion">
        <div class="login-container">

            <div class="login-card">
                <h1>Portail de connexion</h1>
                <form class="login-form" action="../../controler/login.php?action=connexion" method="post">
                    <label for="identifiant">Identifiant</label>
                    <input type="text" placeholder="Entrez votre identifiant" id="identifiant" name="identifiant" required>
                    <?php
                    if (isset($_SESSION['error_message'])) {
                        echo "<p class='error-message'>" . $_SESSION['error_message'] . "</p>";
                        unset($_SESSION['error_message']);
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['error_email'])) {
                        echo "<p class='error-message'>" . $_SESSION['error_email'] . "</p>";
                        unset($_SESSION['error_email']);
                    }
                    ?>
                    <label for="mdp">Mot de passe </label>
                    <input type="password" id="mdp" placeholder="Password" name="mdp" required>
                    <?php
                    if (isset($_SESSION['error_message'])) {
                        echo "<p class='error-message'>" . $_SESSION['error_message'] . "</p>";
                        unset($_SESSION['error_message']);
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['error_password'])) {
                        echo "<p class='error-message'>" . $_SESSION['error_password'] . "</p>";
                        unset($_SESSION['error_password']);
                    }
                    ?>
                    <a href="">mot de passe oublié ?</a>
                    <div class="login-buttons">
                        <button type="submit" class="login-button">Login</button>
                    </div>
                    <input type='hidden' name='action' value='connexion'>
                </form>
            </div>
        </div>
    </section>
                -->

    <section class="form">
        <div class="form-box" id="jh">
            <div class="form-value">
                <form class="login-form" action="../../controler/login.php?action=connexion" method="post">
                    <h2>Portail technicien</h2>
                    <div class="input-box">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" placeholder="Entrez votre identifiant" id="identifiant" name="identifiant" required>
                        <label for="">Identifiant</label>
                    </div>
                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon>

                        <input type="password" id="mdp" placeholder="Password" name="mdp" required>
                        <label for="mdp">Mot de passe </label>
                    </div>
                    <div class="forget">
                        <label for="">
                            <!-- <input type="checkbox" name="" id="">Se souvenir de moi-->
                            <a href="#">Mot de passe oublié</a>
                        </label>

                    </div>
                    <button>Se connecter</button>
                    <div class="register">
                        <p> <a href="#">Portail admin</a></p>
                    </div>
                </form>
                <form class="register-form hidden" action="../../controler/login.php?action=admin" method="post">
                    <h2>Portail admin</h2>
                    <div class="input-box">
                        <ion-icon name="mail-outline"></ion-icon>

                        <input type="text" placeholder="Entrez votre identifiant" id="identifiant" name="identifiant" required>
                        <label for="">Identifiant</label>
                    </div>
                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="mdp" placeholder="Password" name="mdp" required>
                        <label for="">Mot de passe</label>
                    </div>
                    <div class="forget">
                        <label for="">
                            <!--   <input type="checkbox" name="" id="">Se souvenir de moi -->
                            <a href="#">Mot de passe oublié</a>
                        </label>

                    </div>
                    <button>Créer</button>
                    <div class="register">
                        <p> <a href="#">Portail technicien</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../../script/connexion.js"></script>

</body>

</html>