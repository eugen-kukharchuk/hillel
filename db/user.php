<?php
    require_once 'autoload_custom.php';
    require_once 'functions.php';

    $pdo = Connection::getConnect();

    $userDb = new UserDb($pdo);

    if (!empty($_POST) && key_exists("Add", $_POST)){
        $userDb->createUser($_POST['login'],$_POST['password']);
    } elseif (!empty($_POST)){
        $userDb->editUser($_POST['id'], $_POST['login'],$_POST['password']);
    } elseif (!empty($_POST) && key_exists("delete", $_POST)){
        $userDb->deleteUser();
    }

    $userArray = $userDb->getUserArray();

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


