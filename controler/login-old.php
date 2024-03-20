<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../model/modele.login.php'; // Inclure le fichier contenant les fonctions de récupération des données utilisateur

$action = isset($_GET['action']) ? $_GET['action'] : 'connexion';

try {
    switch ($action) {
        case "connexion":
            if (isset($_POST['identifiant']) && isset($_POST['mdp']) && !empty($_POST['identifiant']) && !empty($_POST['mdp'])) {
                // Récupérer les données saisies par l'utilisateur depuis le formulaire
                $email = $_POST['identifiant'];
                $password = $_POST['mdp'];

                // Récupérer les emails et les mots de passe depuis la base de données
                $emails = getEmails();
                $passwords = getPasswords();

                // Vérifier si l'email existe dans la liste des emails de la base de données
                $emailExists = in_array($email, $emails);

                // Si l'email existe, vérifier si le mot de passe correspond
                if ($emailExists) {
                    $index = array_search($email, $emails);
                    $storedPassword = $passwords[$index];
                    if ($password === $storedPassword) {
                        // Authentification réussie
                        // Rediriger l'utilisateur vers la page d'accueil ou toute autre page appropriée
                        header("Location: ../vues/accueil.php");
                        exit;
                    } else {
                        // Mot de passe incorrect
                        $_SESSION['error_message'] = "Mot de passe incorrect";
                        $_SESSION['error_password'] = "Mot de passe incorrect";
                    }
                } else {
                    // Email non trouvé dans la base de données
                    $_SESSION['error_message'] = "Adresse email non trouvée";
                }
            } else {
                // Si l'identifiant ou le mot de passe est vide, définissez un message d'erreur dans la session
                $_SESSION['error_message'] = "Veuillez saisir l'identifiant et le mot de passe";
                $_SESSION['error_email'] = "Adresse email non trouvée";
            }
            // Rediriger l'utilisateur vers la page de connexion avec le message d'erreur
            require('../vues/connexion/connexion.php');
            require('../vues/gabarit.php');

          
            // header("Location: ../vues/connexion/connexion.php");
            exit;
            break;

        case "admin":
            if (isset($_POST['identifiant']) && isset($_POST['mdp']) && !empty($_POST['identifiant']) && !empty($_POST['mdp'])) {
                // Récupérer les données saisies par l'utilisateur depuis le formulaire
                $email = $_POST['identifiant'];
                $password = $_POST['mdp'];

                // Récupérer les emails et les mots de passe depuis la base de données
                $emails = getEmailsAdmin();
                $passwords = getPasswordsAdmin();
            //    var_dump($email);
             //   var_dump($password);
                // Vérifier si l'email existe dans la liste des emails de la base de données
                $emailExists = in_array($email, $emails);

                // Si l'email existe, vérifier si le mot de passe correspond
                if ($emailExists) {
                    $index = array_search($email, $emails);
                    $storedPassword = $passwords[$index];
                    if ($password === $storedPassword) {
                        // Authentification réussie
                        // Rediriger l'utilisateur vers la page d'accueil ou toute autre page appropriée
                        header("Location: ../vues/admin.php?email=" . urlencode($email));
                        exit;
                    } else {
                        // Mot de passe incorrect
                        $_SESSION['error_message'] = "Mot de passe incorrect";
                        $_SESSION['error_password'] = "Mot de passe incorrect";
                    }
                } else {
                    // Email non trouvé dans la base de données
                    $_SESSION['error_message'] = "Adresse email non trouvée";
                }
            } else {
                // Si l'identifiant ou le mot de passe est vide, définissez un message d'erreur dans la session
                $_SESSION['error_message'] = "Veuillez saisir l'identifiant et le mot de passe";
                $_SESSION['error_email'] = "Adresse email non trouvée";
            }
            // Rediriger l'utilisateur vers la page de connexion avec le message d'erreur
            require('../vues/connexion/connexion.php');
            require('../vues/gabarit.php');
            exit;
            break;

        default:
            // Si l'action n'est pas reconnue, redirigez l'utilisateur vers la page de connexion
            header("Location: ../vues/connexion/connexion.php");
            exit;
    }
} catch (PDOException $e) {
    die("<h1>Erreur de connexion: </h1>" . $e->getMessage());
}
