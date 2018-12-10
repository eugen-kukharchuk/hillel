<?php
    require_once 'autoload_custom.php';

    $pdo = Connection::getConnect();
    $statement = $pdo->query('SELECT * FROM user');
    $statement ->setFetchMode(
        PDO::FETCH_CLASS,
        'Usr');

    $userArray = $statement->fetchAll();

    echo '<pre>';
    foreach ($userArray as $user) {
        echo $user->getLastLogin().'<br>';
    }

    echo "
    <table border=1 cellpadding=2 cellspacing=0>
            <tr>
            <td>ID </td>
            <td>LOGIN</td>
            <td>LAST_LOGIN </td>
            </tr>";

    foreach ($userArray as $user) {
        echo "<tr>
                <td>{$user->getId()} </td>
                <td>{$user->getLogin()} </td>
                <td>{$user->getLastLogin()} </td>
            </tr>";
    }
    echo "</table>";
    echo "<br><a href = 'index.php'>BACK</a>";


