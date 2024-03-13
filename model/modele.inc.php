 <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    function getBdd()
    {
        if (file_exists('param.ini')) {
            $tParam = parse_ini_file('param.ini', true);
            extract($tParam['BDD']);
        } else {
            throw new ModelException("Fichier param.ini inexistant");
        }
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
        $connection = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $connection;
    }
