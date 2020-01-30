<?php


require_once '../Debug.php';
require_once '../Loader.php';

/*$username = 'Mike';
$password = 'sidfjif';
$email = 'Mike@test.fr';*/

$username = 'moi';
$password = 'toi';
$email = 'moi@vous.net';

$test3 = new Models\AccountManager();
//$result = $test->getUser($username);
//$result = $test2->login($username, $password);
$result = $test3->addUser($username, $password, $email);

debug($result);



/*$quizzes->get(1);
debug($quizzes);

$cats = new Models\Categories();
$result = $cats->getQuizCats(1);
debug($result);

$questions = new Models\Questions;
$result = $questions->getCatQuestions(1);
debug($result);

$quiz = new Models\Quizzes();
$result = $quiz->getQuiz(2);
debug($result);*/
