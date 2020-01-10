<?php


require_once '../Debug.php';
require_once '../Loader.php';



/*$router = new Router();
debug($router);*/

//$db = Models\Db::getDb();   //separateur espace de nom pour autoload
//debug($Db);

$quizzes = new Models\Quizzes();
$quizzes->get(1);
debug($quizzes);

$quizzes->get(1);
debug($quizzes);

$cats = new Models\Categories();
$result = $cats->getQuizCats(1);
debug($result);

$questions = new Models\Questions;
$result = $questions->getCatQuestions(1);
debug($result);

$quiz = new Models\Quizzes();
$result = $quiz->getQuiz(2);
debug($result);