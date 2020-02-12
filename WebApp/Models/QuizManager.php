<?php

namespace Models;


class QuizManager extends Quizzes
{

    /** @var PDO */
    protected $db;

    public function addQuiz(array $_newQuiz) : bool
    {
        $sql = "INSERT INTO fp_quizzes (quiz_theme, quiz_textcolor, quiz_backcolor) 
                VALUES (:quiz_theme, :quiz_textcolor, :quiz_backcolor);";  //creation de marqueur correspondant aux clés du tableau
        $stmt = $this->pdo->prepare($sql);   //preparation de la requete
               

        if($stmt->execute($_newQuiz)) {
            return $stmt->rowCount() > 0;          
        }

        return false;
    }

    public function removeQuiz()
    {

    }

    public function updateQuiz()
    {

    }
}
