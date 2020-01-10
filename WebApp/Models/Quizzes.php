<?php

namespace Models;


class Quizzes extends Model
{
    public function __construct()
    {
        parent::__construct('fp_quizzes', 'quiz_id');
    }

    /** recupere les quizz à partir de son id
     * @param $_quiz_id l'identifiant à rechercher
     * @return array|false $result résultat de la requete sous forme de tableau
     */
    public function getQuiz(int $_quiz_id)
    {
        try {
             $sql = "SELECT * FROM ".$this->tableName." WHERE quiz_id=:quiz_id";
             $stmt = $this->pdo->prepare($sql);
             $vars = [':quiz_id' => $_quiz_id];
             $result = [];

             if($stmt->execute($vars)){
                $result = $stmt->fetchAll();
             }

             $stmt->closeCursor();

             return $result;
            }

        catch(\Exception $e){
            exit($e->getMessage());
        }
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

