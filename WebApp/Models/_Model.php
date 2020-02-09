<?php

namespace Models;

/**
 * classe Model: représente une table
 */
abstract class Model 
{
    /** @var PDO $db reprsente une connexion vers une base de donnée*/
    protected $db;

    /** @var string $tableName Le nom de la table */
    protected $tableName;

    /** @var string $primaryKey Le nom de la clé primaire de la table */
    protected $primaryKey;


    /** recupere toutes les lignes de la table courante
     * @return array $result le resultat d ela requete
     */
    public function __construct(string $_table, string $_pk)
    {
        $this->tableName = $_table;
        $this->primaryKey = $_pk;
        $this->pdo = Db::getDb(); //recupere la connexion pdo
    }

    public function query(string $sql, array $values = [])
    {
        try {
            if(empty($values)) {
                return $this->db->query($sql)->fetch();
            }
            else {
                $stmt = $this->db->prepare($sql);
                $stmt->execute($values);
                $result = $stmt->fetch();
                $stmt->closeCursor();
                return $result;
            }
        }
        catch(\PDOException $e) {
            exit('Query Error: '.$e->getMessage());
        }
    }

    public function queryAll(string $sql, array $values = [])
    {
        try {
            if(empty($values)) {
                return $this->db->query($sql)->fetchAll();
            }
            else {
                $stmt = $this->db->prepare($sql);
                $stmt->execute($values);
                $result = $stmt->fetchAll();
                $stmt->closeCursor();
                return $result;
            }
        }
        catch(\PDOException $e) {
            exit('Query Error: '.$e->getMessage());
        }
    }

    public function exec(string $sql, array $values = [])
    {
        try {
            if(empty($values)) {
                return $this->db->exec($sql);
            }
            else {
                $stmt = $this->db->prepare($sql);
                $stmt->execute($values);
                $result = $stmt->rowCount();
                $stmt->closeCursor();
                return $result;
            }
        }
        catch(\PDOException $e) {
            exit('Query Error: '.$e->getMessage());
        }
    }
}