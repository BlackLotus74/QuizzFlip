<?php


require_once '../Debug.php';
require_once '../Loader.php';

/*$username = 'Mike';
$password = 'sidfjif';
$email = 'Mike@test.fr';*/

$username = 'moi';
$password = 'toi';
$email = 'moi@vous.net';

//$test4 = new Models\AccountManager();
//$result = $test4->getUser('Mike');
//$result = $test2->login('Mike', 'hjkhdjkfhjdfk');
//$result = $test2->addUser($username, $password, $email);
//$result = $test4->removeUser('moi');

//debug($result);

$accounts = new Models\AccountManager();
$accounts->addUser('pouet2', 'coucou', 'je@jdshfjsd.fr');
debug($accounts);



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
