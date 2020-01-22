<?php

require_once '../Debug.php';
require_once '../Loader.php';

//Api::run();

$table = $_GET['t'] ?? null;  

if($table === null){
    exit('mouhahahahahahahaha');
}

$mapping = [
    
    'quizzes' => 'Models\\Quizzes',
    'categories' => 'Models\\Categories',
    'questions' => 'Models\\Questions'
];

$table = basename($table);  //prend la derniere partie de l'url

/*if(!array_key_exists($table, $mapping)){
    exit('MOUHAHAHHAHAHAHHAAH');
}*/

if(empty($mapping[$table])){             //4x plus rapide que array_key_exists
    exit('MOUHAHAHHAHAHAHHAAH');
}

$table = $mapping[$table];

$table = new $table();  //raccourci dynamique

//debug($table);

$id = $_GET['id'] ?? 0;

$id = intval($id);   //convert valeur en entier

if($id > 0){
    $result = $table->get($id);
}
else{
    $result = $table->getAll();
}

$result = json_encode($result, JSON_PRETTY_PRINT);
exit($result);