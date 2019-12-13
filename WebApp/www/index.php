<?php

require_once '../Debug.php';
require_once '../Loader.php';



$router = new Router();
debug($router);

//$db = new Models\Db();   //separateur espace de nom pour autoload

/*$db = Models\Db::getDb();
debug($db);*/

$result = Models\Quizzes::getQuizz(2);
debug($result);

/*$result = Models\Quizz::getQuizzes(1);
debug($result);

$result = json_encode($result);  //convertion données en json
debug($result);

$result = Models\Categories::getCategories();
debug($result);

$result = Models\Questions::getQuestions();
debug($result);

$result = Models\Cat_Quiz::getCat_Quiz();
debug($result);*/