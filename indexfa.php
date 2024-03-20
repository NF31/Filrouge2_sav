<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //fichier requis à l'execution des fonctions de connexion :
  
    require('model/ModelException.php');
    // require('model/modele.login.php');

    // fonction pour afficher et nettoyer les messages d'erreurs: 
    session_start();

    // Le site s'ouvre sur la page de connexion: 

    $action = 'connexion';

    if(isset($_GET['action']))
        $action = $_GET['action'];

        try {
            switch ($action) {
                case "connexion":
                    require('vues/connexion/connexion.php');
                    require('vues/gabarit.php');        
                    break;
            }
        } 
        catch (PDOException $e){
            die("<h1>Erreur de connexion: </h1>".$e->getMessage());
        }  
        catch(ModelException $e) {
            die("<h1>Erreur de paramètrage :</h1>" . $e->getMessage());
        } 

        