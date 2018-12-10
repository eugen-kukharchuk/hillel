<?php
    require_once 'autoload_custom.php';


    $pdo = Connection::getConnect();
    $statement = $pdo->query('SELECT * FROM city ORDER BY NAME');
    $statement ->setFetchMode(
        PDO::FETCH_CLASS,
        'City');

    $cityArray = $statement->fetchAll();

    echo '<pre>';
    echo "<table border=1 cellpadding=2 cellspacing=0>
                    <tr>
                    <td>ID </td>
                    <td>NAME</td>
                    <td>COUNTRY ID</td>
                    </tr>";

    foreach ($cityArray as $ct) {
        echo "<tr>
                        <td>{$ct->getId()} </td>
                        <td>{$ct->getName()} </td>
                        <td>{$ct->getCountryId()} </td>
                    </tr>";
    }
    echo "</table>";
    echo "<br><a href = 'index.php'>BACK</a>";