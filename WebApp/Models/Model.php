<?php

namespace Models;

/** Classe Model : Représente une table
 * 
 */
abstract class Model
{
    /** @var PDO $pdo représente une connexion PDO vers une base de données */
    protected $pdo;

    /** @var string $tableNAme Le nom de la table */
    protected $tableName;

    /** @var string $primaryKey Le nom de la clé primaire de la table */
    protected $primaryKey;


    /** Constructeur de la classe
     *  @param $_table Le nom de la table
     *  @param $_pk Le nom de la clé primaire 
     */
    protected function __construct(string $_table, string $_pk)
    {
        $this->tableName = $_table;
        $this->primaryKey = $_pk;
        $this->pdo = Db::getDb(); //recupère la connexion PDO
    }

    /** recupere toutes les lignes de la table courante
     * @return array $result le résultat de la requete
     */
    public function getAll()
    {
        $sql = ("SELECT * FROM ".$this->tableName);  
        /** @var $stmt PDOStatement */
        $stmt = $this->pdo->query($sql);
        $result = $stmt->fetchAll();
        return $result;

        /* return $this->pdo->query("SELECT * FROM ".$this->tableName)->fetchAll()*/
    }

    /** recupere un élément de la table à partir de son identifiant
     * @param int $_id l'identifiant à rechercher
     * @return array|false $result Le résultat de la requete sous forme de tableau ou false si la requete echoue
     */
    public function get(int $_id)
    {
        $sql = ("SELECT * FROM ". $this->tableName." WHERE ".$this->primaryKey."=:id");
        $stmt = $this->pdo->prepare($sql);
        $vars = [':id' => $_id];

        $result = false;

        if($stmt->execute($vars)){     //execute requete.
            $result = $stmt->fetch();
        }    

        $stmt->closeCursor();      //on ferme le curseur  /!\ Obligatoire

        return $result;
    }
}