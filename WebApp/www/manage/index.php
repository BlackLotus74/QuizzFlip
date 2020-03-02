<?php
session_start();
require_once dirname(__DIR__, 2) . '/Loader.php';  //dirname — Renvoie le chemin du dossier parent
require_once dirname(__DIR__, 2) . '/Debug.php';

$accounts = new Models\AccountManager;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FlipQuiz Admin</title>
    <link rel="stylesheet" href="../css/manage.css">
    <script src="../js/manage.js"></script>
</head>

<body>
    <header>
        <h1>Quiz Administration</h1>
        <aside>Welcome <?= $_SESSION['user'] ?? 'Anonymous'; ?> (<a href="login.php?logout=1">logout</a>)</aside>
    </header>
    <nav>
        <ul class="menu">
            <li><a href="?">Dashboard</a></li>
            <li><a href="?page=users">Users</a></li>
            <li><a href="?page=quizzes">Quizzes</a></li>
            <li><a href="index.php?page=categories">Categories</a></li>
            <li><a href="index.php?page=questions">Questions</a></li>
        </ul>
    </nav>

    <main>
        <?php

        if (!empty($_SESSION['error'])) {
            echo '<div class="flash">'.$_SESSION['error'].'</div>';
            $_SESSION['error'] = null;
        }
        if (!empty($_SESSION['success'])) {
            echo '<div class="flash">'.$_SESSION['success'].'</div>';
            $_SESSION['success'] = null;
        }
        ?>

        <?php

        $page = !empty($_GET['page']) ? $_GET['page'] : 'home';
        //$page = $_GET['page'] ?? 'home';      // null coalescing operator

        $page = ($page . '.php');
        //$page .= '.php';
      //  echo $page;

        if (is_file($page)) {  //verification de l'existance du fichier, le colle à cet endroit du code.
            require $page;
        } else {
            echo 'message d\'erreur !';
        }

        ?>

    </main>
</body>
</html>