<?php

require_once '../Debug.php';
require_once '../Loader.php';

//principe de variable variable//

$var = 'test';
$var2 = $$var; // en faite    $var2 = $test
echo $var2; //resultat 'test'
