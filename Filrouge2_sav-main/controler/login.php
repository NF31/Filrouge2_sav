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

                $emails = getEmails();
                $passwords = getPasswords();

                $emailExists = in_array($email, $emails);

                if ($emailExists) {
                    $index = array_search($email, $emails);
                    $storedPassword = $passwords[$index];
                    if ($password === $storedPassword) {
                        header("location:../controler/commandes.php");
                        exit();
                    } else {
                        $_SESSION['error_password'] = "Mot de passe incorrect";
                        header("Location:login.php?action=accueil");
                        exit();
                    }
                } else {
                    $_SESSION['error_email'] = "Adresse email non trouvée";
                     header("Location:login.php?action=accueil");
                     exit();
                }
            } else {
                $_SESSION['error_general'] = "Veuillez saisir l'identifiant et le mot de passe";
                 header("Location:login.php?action=accueil");
            }
            
            exit;
            break;

        case "admin":
            // Logique pour la connexion en tant qu'administrateur
            if (isset($_POST['identifiant']) && isset($_POST['mdp']) && !empty($_POST['identifiant']) && !empty($_POST['mdp'])) {
                $email = $_POST['identifiant'];
                $password = $_POST['mdp'];

                $emails = getEmailsAdmin();
                $passwords = getPasswordsAdmin();

                $emailExists = in_array($email, $emails);

                if ($emailExists) {
                    $index = array_search($email, $emails);
                    $storedPassword = $passwords[$index];
                    if ($password === $storedPassword) {
                        header("location:../controler/admin.php");
                        exit();
                    } else {
                        $_SESSION['error_password'] = "Mot de passe incorrect";
                        header("Location:login.php?action=accueil");
                        exit();
                    }
                } else {
                    $_SESSION['error_email'] = "Adresse email non trouvée";
                     header("Location:login.php?action=accueil");
                     exit();
                }
            } else {
                $_SESSION['error_general'] = "Veuillez saisir l'identifiant et le mot de passe";
                 header("Location:login.php?action=accueil");
            }

            exit;
            break;

        default:
            echo  "Action non reconnue";
            exit;
    }
} catch (PDOException $e) {
    die("<h1>Erreur de connexion: </h1>" . $e->getMessage());
}
