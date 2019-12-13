<?php

namespace Models;


class quizzes
{
    public static function getQuizzes()
    {
        $sql = "SELECT * FROM quizz";
        $pdo = Db::getDb();
        $stmt = $pdo->query($sql);            //query uniquement requete en lecture.
        $result = $stmt->fetchAll();
        return $result;
    }

    public static function getQuizz($id)
    {
        $sql = "SELECT * FROM quizz WHERE quizz_id=:id;";  //:id = marqueur 
        $stmt = Db::getDb()->prepare($sql);  //requete preparée recupere objet pdoStatement
        $vars = [':id' => $id];
        $stmt->execute($vars);     //execute requete.
        $result = $stmt->fetch();  
        $stmt->closeCursor();      //on ferme le curseur            
        return $result();
    }


}

