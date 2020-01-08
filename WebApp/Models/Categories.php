<?php

namespace Models;


class Categories extends Model
{

    public function __construct()
    {
        parent::__construct('fp_categories', 'category_id');
    }

    /** recupere categories d'un quiz
     * @param int $_quiz_id l'identifiant à rechercher 
     */
    public function getQuizCats(int $_quiz_id)
    {
        try {
            $sql = "SELECT * FROM ". $this->tableName." WHERE quiz_id=:quiz_id "; //construction requete
            $stmt = $this->pdo->prepare($sql);
            $vars = [':quiz_id' => $_quiz_id];
            //$stmt->execute($vars);  //renvoi un boolean /!\
            $result = []; //si rentre pas ds le if renverra un array vide

            if($stmt->execute($vars)){
                $result = $stmt->fetchAll();
            }
        
            $stmt->closeCursor();

            return $result;
        }
        catch(\Exception $e) {
            exit($e->getMessage());
        }
    }
        

    /*public static function getCategories()
    {
        $sql = "SELECT * FROM fp_categories;";
        $pdo = Db::getDb();
        $stmt = $pdo->query($sql);            //query uniquement requete en lecture.
        $result = $stmt->fetchAll();
        return $result;
    }

    public static function getCategories($id)
    {
        $sql = "SELECT * FROM fp_categories WHERE category_id=:id;"
        $stmt = Db::getDb()->prepare($sql);
        $vars = [':id' => $id];
        $stmt->execute($vars);
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result();
    }*/
}