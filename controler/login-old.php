<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../model/modele.login.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'accueil';

try {
    switch ($action) {
        case "accueil":
            require('../vues/connexion/vue_connexion.php');
            require('../vues/gabarit.php');
            break;

        case "connexion":
            // Logique pour la connexion
            if (isset($_POST['identifiant']) && isset($_POST['mdp']) && !empty($_POST['identifiant']) && !empty($_POST['mdp'])) {
                $email = $_POST['identifiant'];
                $password = $_POST['mdp'];


                // Extraction du nom à partir de l'adresse e-mail
                $parts = explode('@', $email);
                $username = $parts[0];
                $nameParts = explode('.', $username);
                $firstName = ucfirst($nameParts[0]);


                $emails = getEmails();
                $passwords = getPasswords();

                $emailExists = in_array($email, $emails);

                if ($emailExists) {
                    $index = array_search($email, $emails);
                    $storedPassword = $passwords[$index];
                    if ($password === $storedPassword) {
                        // Stockage du prénom du technicien dans la session
                        $_SESSION['technician_name'] = $firstName;
                      //  var_dump($firstName);
                        header("location:../controler/commandes.php");
                        exit();
                    }
                }
            }
            var_dump($firstName);
            // Si l'email ou le mot de passe est incorrect, redirigez vers l'accueil avec un message d'erreur
            $_SESSION['error_general'] = "Veuillez saisir l'identifiant et le mot de passe";
            header("Location:login.php?action=accueil");
            exit();

        case "admin":
            // Logique pour la connexion en tant qu'administrateur
            if (isset($_POST['identifiant']) && isset($_POST['mdp']) && !empty($_POST['identifiant']) && !empty($_POST['mdp'])) {
                $email = $_POST['identifiant'];
                $password = $_POST['mdp'];

                // Extraction du nom à partir de l'adresse e-mail
                $parts = explode('@', $email);
                $username = $parts[0];
                $nameParts = explode('.', $username);
                $adminFirstName = ucfirst($nameParts[0]); // Utilisez une variable distincte pour le prénom de l'administrateur

                // Vérification des identifiants de l'administrateur
                $adminCredentials = loginAdmin();
                foreach ($adminCredentials as $admin) {
                    if ($admin['email'] === $email && $admin['motdepasse'] === $password) {
                        // Stockage du prénom du technicien dans la session
                        $_SESSION['admin_name'] = $adminFirstName;
                      
          //              header("location:../controler/admin.php");
                      
                        header("Location: ../controler/admin.php?email=" . urlencode($email));
                        exit();
                    }
                }
            }

            // Si l'email ou le mot de passe est incorrect, redirigez vers l'accueil avec un message d'erreur
            $_SESSION['error_general'] = "Veuillez saisir l'identifiant et le mot de passe";
            header("Location:login.php?action=accueil");
            exit();


        case "deconnexion":
            // Destruction de toutes les données de session
            $_SESSION = array();

            // Destruction de la session
            session_destroy();

            // Redirection vers la page d'accueil avec un message de déconnexion
            $_SESSION['message'] = "Vous avez été déconnecté avec succès.";
            header("Location: login.php?action=accueil");
            exit();
            break;
        default:
            echo  "Action non reconnue";
            exit;
    }
} catch (Exception $e) {
    echo 'Exception capturée : ',  $e->getMessage(), "\n";
} catch (PDOException $e) {
    die("<h1>Erreur de connexion: </h1>" . $e->getMessage());
}
