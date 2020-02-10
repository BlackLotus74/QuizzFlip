

<h2>User List</h2>

<?php

    $accounts = new Models\AccountManager();

    foreach($accounts->getAccounts() as $user) {
        echo $user['username'];
        echo '<br>';
    }
?>

<h2>Add user</h2>

<?php
    session_start();
    
    if(!empty($_SESSION['error'])) {
        echo $_SESSION['error'];
        $_SESSION['error'] = null;
    }
    if(!empty($_SESSION['sucess'])) {
        echo $_SESSION['sucess'];
        $_SESSION['sucess'] = null;
    }
?>


<form method="POST" action="form_user_add_save.php">
    <label for="username">User name</label>
    <input type="text" value="" id="username" name="username">
    <br>
    <label for="user_password">password</label>
    <input type="password" value="" id="user_password" name="password">
    <br>
    <label for="user_email">email</label>
    <input type="email" value="" id="user_email" name="email">
    <br>
    <button type="submit">Add</button>
</form>