<?php   
    require("modele/ModelException.php");
    
    function getBdd() {
        if(file_exists('config/param.ini')){
            $tParam = parse_ini_file('param.ini', true);
            extract($tParam['BDD']);
        }
        else throw new ModeleException("Fichier param.ini absent");

        $dsn = "mysql:dbname=".$dbname.";host=".$host;
        $option = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    
            return new PDO($dsn,$user,$password,$option);
    }

