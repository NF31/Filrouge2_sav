<?php $contenu = '
<section class="form">
    <div class="form-box" id="jh">
        <div class="form-value">
            <form class="login-form" action="../../controler/login.php?action=connexion" method="post">
                <h2>Portail technicien</h2>
                <div class="input-box">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" placeholder="Entrez votre identifiant" id="identifiant" name="identifiant" required>
                    <label for="">Identifiant</label>
                    <?php
                    if (isset($_SESSION["error_message"])) {
                        echo "<p class=\'error-message\'>" . $_SESSION["error_message"] . "</p>";
                        unset($_SESSION["error_message"]);
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["error_email"])) {
                        echo "<p class=\'error-message\'>" . $_SESSION["error_email"] . "</p>";
                        unset($_SESSION["error_email"]);
                    }
                    ?>
                </div>
                <div class="input-box">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" id="mdp" placeholder="Password" name="mdp" required>
                    <label for="mdp">Mot de passe </label>
                    <?php
                    if (isset($_SESSION["error_message"])) {
                        echo "<p class=\'error-message\'>" . $_SESSION["error_message"] . "</p>";
                        unset($_SESSION["error_message"]);
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["error_password"])) {
                        echo "<p class=\'error-message\'>" . $_SESSION["error_password"] . "</p>";
                        unset($_SESSION["error_password"]);
                    }
                    ?>
                </div>
                <div class="forget">
                    <label for="">
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
                    <?php
                    if (isset($_SESSION["error_message"])) {
                        echo "<p class=\'error-message\'>" . $_SESSION["error_message"] . "</p>";
                        unset($_SESSION["error_message"]);
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["error_email"])) {
                        echo "<p class=\'error-message\'>" . $_SESSION["error_email"] . "</p>";
                        unset($_SESSION["error_email"]);
                    }
                    ?>
                </div>
                <div class="input-box">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" id="mdp" placeholder="Password" name="mdp" required>
                    <label for="">Mot de passe</label>
                    <?php
                    if (isset($_SESSION["error_message"])) {
                        echo "<p class=\'error-message\'>" . $_SESSION["error_message"] . "</p>";
                        unset($_SESSION["error_message"]);
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["error_password"])) {
                        echo "<p class=\'error-message\'>" . $_SESSION["error_password"] . "</p>";
                        unset($_SESSION["error_password"]);
                    }
                    ?>
                </div>
                <div class="forget">
                    <label for="">
                        <a href="#">Mot de passe oublié</a>
                    </label>
                </div>
                <button>Se connecter</button>
                <div class="register">
                    <p> <a href="#">Portail technicien</a></p>
                </div>
            </form>
        </div>
    </div>
</section>';
?>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="../../script/connexion.js"></script>