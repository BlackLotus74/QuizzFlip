<?php

//instancier objet pdo avec users root sans mdp  co sur localhost

namespace Models;

class Db
{
    private static $instance = null;
    private function __construct() {}           //constructeur privée pour eviter plusieurs connections.
    public static function getDb()        //tjs ce nom en singleton(getInstance).
    {
        if(Db::$instance === null)            //self ou static. //self plus rapide
        {
            try
            {
                $dsn = 'mysql:host=localhost; port=3306; dbname=flipquiz; charset=utf8';           //dsn = data source name.
                //$options = array();   ancienne syntaxe
                $options = [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,        //message d'erreur et plantage du script si prob (requete) car co indispensable.(en production passe en silence)
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,   //recupere dans un tableau indexé par NOMS de colonnes avec valeurs respectives.
                    \PDO::ATTR_EMULATE_PREPARES => false,                //desactive l'emulation des requetes preparées.(perf & secu)
                ];
                
                Db::$instance = new \PDO($dsn, 'crm', 'morgane', $options);
            }
            catch(\PDOException $ex)
            {
                exit('Erreur SQl: '. $ex->getMessage());     //recupere le message //en production "$ex->getMessage"ne se met pas.
            }
        }
        return Db::$instance;
    }
}