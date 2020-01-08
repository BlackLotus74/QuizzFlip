<?php

namespace Models;


class Quizzes extends Model
{
    public function __construct()
    {
        parent::__construct('fp_quizzes', 'quiz_id');
    }

    /*public static function getQuizzes()
    {
        $sql = "SELECT * FROM fp_quizzes";
        $pdo = Db::getDb();
        $stmt = $pdo->query($sql);            //query uniquement requete en lecture.
        $result = $stmt->fetchAll();
        return $result;
    }

    public static function getQuizz($id)
    {
        $sql = "SELECT * FROM fp_quizzes WHERE quiz_id=:id;";  //:id = marqueur 
        $stmt = Db::getDb()->prepare($sql);  //requete preparée recupere objet pdoStatement
        $vars = [':id' => $id];
        $stmt->execute($vars);     //execute requete.
        $result = $stmt->fetch();  
        $stmt->closeCursor();      //on ferme le curseur            
        return $result;
    }*/

}

