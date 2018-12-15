<?php
    require_once 'autoload_custom.php';
    require_once 'functions.php';

    $pdo = Connection::getConnect();
    $statement = $pdo->query('SELECT * FROM user');
    $statement ->setFetchMode(
        PDO::FETCH_CLASS,
        'Usr');

    $userArray = $statement->fetchAll();

    //echo '<pre>';
    //foreach ($userArray as $user) {
    //    echo $user->getLastLogin().'<br>';
    //}

    if (!empty($_POST) && key_exists("Add", $_POST)){
        createUser($pdo, $_POST['login'],$_POST['password']);
    } elseif (!empty($_POST)){
        var_dump($_POST);
        createUser($pdo, $_POST['login'],$_POST['password']);
        //editUser($pdo, $_POST['id'], $_POST['login'],$_POST['password']);
    }

    echo "
    <table border=1 cellpadding=2 cellspacing=0>
    <a href ='user_form.php'}'>ДОБАВИТЬ ЗАПИСЬ</a>
            <tr>
            <td>ID </td>
            <td>LOGIN</td>
            <td>LAST_LOGIN </td>
            <td>ACTION </td>
            </tr>";

    foreach ($userArray as $user) {
        echo "<tr>
                <td>{$user->getId()} </td>
                <td>{$user->getLogin()} </td>
                <td>{$user->getLastLogin()} </td>
                <td> 
                <a href ='user_form.php?id={$user->getId()}'>Редактировать</a>
                <a href ='delete.php?model=user&id={$user->getId()}'>Удалить</a></td>
            </tr>";
    }
    echo "</table>";
    echo "<br><a href = 'index.php'>BACK</a>";


