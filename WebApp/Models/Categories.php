<?php

namespace Models;


class Categories
{
    public static function getCategories()
    {
        $sql = "SELECT * FROM categories;";
        $pdo = Db::getDb();
        $stmt = $pdo->query($sql);            //query uniquement requete en lecture.
        $result = $stmt->fetchAll();
        return $result;
    }
}