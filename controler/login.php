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


                $techniciens = getEmails();
                $passwords = getPasswords();

                foreach ($techniciens as $key => $technicien) {
                    if ($email === $technicien['email']) {
                        $storedPassword = $passwords[$key]['motdepasse'];
                        $idTechnicien = $technicien['id'];
                       // var_dump($idTechnicien);
                        $poste = $passwords[$key]['poste'];
                        if ($password === $storedPassword) {
                            session_start();
                            $_SESSION['technician_name'] = $firstName;
                            $_SESSION['poste_technicien'] = $poste;
                            $_SESSION['id_technicien'] = $idTechnicien;
                            header("location:../controler/tickets.php?action=allTickets");

                            exit();
                        }
                    }
                }
            }
            // Si l'email ou le mot de passe est incorrect, redirigez vers l'accueil avec un message d'erreur
            $_SESSION['error_general'] = "Veuillez saisir l'identifiant et le mot de passe";
            header("Location:login.php?action=accueil");
            exit();
            break;

        case "admin":
            // Logique pour la connexion en tant qu'administrateur
            if (isset($_POST['identifiant_admin']) && isset($_POST['mdp_admin']) && !empty($_POST['identifiant_admin']) && !empty($_POST['mdp_admin'])) {
                $email = $_POST['identifiant_admin'];
                $password = $_POST['mdp_admin'];

                // Extraction du nom à partir de l'adresse e-mail
                $parts = explode('@', $email);
                $username = $parts[0];
                $nameParts = explode('.', $username);
                $adminFirstName = ucfirst($nameParts[0]); // Utilisez une variable distincte pour le prénom de l'administrateur

                $admins = getEmailsAdmin();
                $passwords = getPasswordsAdmin();

                foreach ($admins as $key => $admin) {
                    if ($email === $admin['email']) {
                        $storedPassword = $passwords[$key]['motdepasse'];
                        $idAdministrateur = $admin['id'];
                    
                        $poste = $passwords[$key]['poste'];
                        if ($password === $storedPassword) {
                            session_start();
                            // setcookie('admin_name', $adminFirstName, time() + 3600, '/');
                            $_SESSION['admin_name'] = $adminFirstName;
                            $_SESSION['poste_administrateur'] = $poste;
                            $_SESSION['id_administrateur'] = $idAdministrateur;
                            header("location:../controler/admin.php");
                            exit();
                        }
                    }
                }
            }

            // Si l'email ou le mot de passe est incorrect, redirigez vers l'accueil avec un message d'erreur
            $_SESSION['error_general'] = "Veuillez saisir l'identifiant et le mot de passe";
            header("Location:login.php?action=accueil");
            exit();
            break;

        case "deconnexion":
            // Suppression du cookie 'technician_name'
            // setcookie('technician_name', '', time() - 3600, '/');
            unset($_SESSION['technician_name']);
            session_destroy();
            //  setcookie('admin_name', '', time() - 3600, '/');
            unset($_SESSION['admin_name']);
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