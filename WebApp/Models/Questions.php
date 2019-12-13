<?php

namespace Models;


class Questions
{
    public static function getQuestions()
    {
        $sql = "SELECT * FROM questions;";
        $pdo = Db::getDb();
        $stmt = $pdo->query($sql);            //query uniquement requete en lecture.
        $result = $stmt->fetchAll();
        return $result;
    }
}