<?php

session_start();

require_once dirname(__DIR__, 2) . '/Loader.php';
require_once dirname(__DIR__, 2) . '/Debug.php';

if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {

    $_SESSION['error'] = 'Le formulaire est incomplet';

    header('location: form_user_add.php?'.$_SESSION['error']);
    exit;
}

$username = basename($_POST['username']);
$password = $_POST['password'];
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

if ($email === false) {

    $_SESSION['error'] = 'Le format email est invalide!';

    header('location: form_user_add.php');  //redirection vers formulaire
    exit();
}

$formUserAdd = new Models\AccountManager();
$formUserAdd->addUser($username, $password, $email);

$_SESSION['sucess'] = 'utilisateur ajouté !';

header('location: form_user_add.php');






