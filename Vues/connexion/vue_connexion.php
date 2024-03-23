<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Démarrez la session si elle n'est pas déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// ob_start();
$contenu = '
    <section class="form">
        <div class="form-box" id="jh">
            <div class="form-value">';

if (isset($_SESSION['message'])) {
    $contenu .= "<p style='color: green;'>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']); // Supprimez le message pour éviter de l'afficher à nouveau
}

$contenu .= '   
                <form class="login-form" action="../controler/login.php?action=connexion" method="post">
                    <h2>Portail technicien</h2>';

if (isset($_SESSION['error_general'])) {
    $contenu .= "<p style='color: red;'>" . $_SESSION['error_general'] . "</p>";
    unset($_SESSION['error_general']); // Supprimez le message d'erreur pour éviter de l'afficher à nouveau
}

$contenu .= '
                    <div class="input-box">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" placeholder="" id="identifiant" name="identifiant" required>
                        <label for="">Identifiant</label>
                    </div>
                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="mdp" placeholder="" name="mdp" required>
                        <label for="mdp">Mot de passe </label>
                    </div>
                    <button>Se connecter</button>
                    <div class="register">
                        <p> <a href="#">Portail admin</a></p>
                    </div>
                </form>
                <form class="register-form hidden" action="../controler/login.php?action=admin" method="post">
                    <h2>Portail admin</h2>';

if (isset($_SESSION['error_general'])) {
    $contenu .= "<p style='color: red;'>" . $_SESSION['error_general'] . "</p>";
    unset($_SESSION['error_general']);
}

$contenu .= ' 
                    <div class="input-box">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" placeholder="" id="identifiant_admin" name="identifiant_admin" required>
                        <label for="identifiant_admin">Identifiant</label>
                    </div>
                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="mdp_admin" placeholder="" name="mdp_admin" required>
                        <label for="mdp_admin">Mot de passe</label>
                    </div>
                    <button>Se connecter</button>
                    <div class="register">
                        <p> <a href="#">Portail technicien</a></p>
                    </div>
                </form>
            </div>
        </div> 
    </section>';


// $contenu = ob_get_clean();