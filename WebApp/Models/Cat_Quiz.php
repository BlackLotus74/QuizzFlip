<?php

namespace Models;


class Cat_Quiz
{
    public static function getCat_Quiz()
    {
        $sql = "SELECT * FROM fp_categories WHERE quiz_id=1;";
        $pdo = Db::getDb();
        $stmt = $pdo->query($sql);            //query uniquement requete en lecture.
        $result = $stmt->fetchAll();
        return $result;
    }
}