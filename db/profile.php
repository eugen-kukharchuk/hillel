<?php
    require_once 'autoload_custom.php';

    $pdo = Connection::getConnect();
    $statement = $pdo->query('SELECT * FROM profile');
    $statement ->setFetchMode(
        PDO::FETCH_CLASS,
        'Profile');

    $pfArray = $statement->fetchAll();

    echo '<pre>';
    echo "<table border=1 cellpadding=2 cellspacing=0>
                    <tr>
                    <td>ID </td>
                    <td>FIRST NAME</td>
                    <td>LAST NAME</td>
                    <td>ADDRESS</td>
                    </tr>";

    foreach ($pfArray as $pf) {
        echo "<tr>
                        <td>{$pf->getId()} </td>
                        <td>{$pf->getFirstName()} </td>
                        <td>{$pf->getLastName()} </td>
                        <td>{$pf->getAddress()} </td>
                    </tr>";
    }
    echo "</table>";
    echo "<br><a href = 'index.php'>BACK</a>";