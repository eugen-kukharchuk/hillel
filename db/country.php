<?php
    require_once 'autoload_custom.php';

    $pdo = Connection::getConnect();
    $statement = $pdo->query('SELECT * FROM country ORDER BY id');
    $statement ->setFetchMode(
        PDO::FETCH_CLASS,
        'Country');

    $cntArray = $statement->fetchAll();

    echo '<pre>';
    echo "<table border=1 cellpadding=2 cellspacing=0>
                <tr>
                <td>ID </td>
                <td>NAME</td>
                <td>CODE</td>
                </tr>";

    foreach ($cntArray as $cnt) {
        echo "<tr>
                    <td>{$cnt->getId()} </td>
                    <td>{$cnt->getName()} </td>
                    <td>{$cnt->getCode()} </td>
                </tr>";
    }
    echo "</table>";
    echo "<br><a href = 'index.php'>BACK</a>";
