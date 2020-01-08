<?php

namespace Models;


class Questions extends Model
{

    public function __construct()
    {
        parent::__construct('fp_questions', 'question_id');
    }

    public function getCatQuestions(int $_cat_id) //fonction de recuperation dc debute tjs par get
    {
        try {
             $sql = "SELECT * FROM ".$this->tableName." WHERE category_id=:category_id";
             $stmt = $this->pdo->prepare($sql); 
             $vars = [':category_id' => $_cat_id];
             $result = [];

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

    /*public static function getQuestions()
    {
        $sql = "SELECT * FROM fp_questions;";
        $pdo = Db::getDb();
        $stmt = $pdo->query($sql);            //query uniquement requete en lecture.
        $result = $stmt->fetchAll();
        return $result;
    }*/
}