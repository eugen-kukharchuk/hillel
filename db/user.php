<?php
    require_once 'autoload_custom.php';

    $pdo = Connection::getConnect();
    $userDb = new UserDb($pdo);

    if (!empty($_POST) && key_exists("action", $_POST)){
        switch ($_POST['action']){
            case 'create':
                $userDb->createUser($_POST['login'],$_POST['password']);
                break;
            case 'update':
                $userDb->editUser($_POST['id'], $_POST['login'],$_POST['password']);
                break;
            case 'delete':
                $userDb->deleteUser($_POST['id']);
                break;
        }
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
                <a href ='delete.php?id={$user->getId()}'>Удалить</a></td>
            </tr>";
    }
    echo "</table>";
    echo "<br><a href = 'index.php'>BACK</a>";


