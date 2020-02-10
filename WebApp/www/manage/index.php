<?php
    session_start();
    require_once dirname(__DIR__, 2) . '/Loader.php';  //dirname — Renvoie le chemin du dossier parent
    require_once dirname(__DIR__, 2) . '/Debug.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Quiz Administration</h1>
    </header>

    <nav>
        <ul class="menu">
            <li><a href="?page=users">Profile</a></li>
            <li><a href="?page=quizzes">Quizzes</a></li>
            <li><a href="index.php?page=categories">Categories</a></li>
            <li><a href="index.php?page=questions">Questions</a></li>
        </ul>
    </nav>

    <main>
        <?php

        $page = !empty($_GET['page']) ? $_GET['page'] : 'home';
        //$page = $_GET['page'] ?? 'home';      // null coalescing operator

        $page = ($page . '.php');
        //$page .= '.php';
        echo $page;

        if (is_file($page)) {  //verification de l'existance du fichier, le colle à cet endroit du code.
            require $page;
        } else {
            echo 'message d\'erreur !';
        }

        ?>

    </main>
</body>

</html>