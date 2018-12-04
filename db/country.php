<?php
    $data = $_POST;
    $name = $data['countries'];

    $sql = "SELECT p.last_name, p.first_name, c.name as city_name, cnt.name
            FROM profile as p
            JOIN city c ON p.city_id=c.id
            JOIN country cnt ON c.country_id=cnt.id
            WHERE cnt.code = '$name'";

    //echo $sql.'<br>';

    $dsn = 'mysql:host=localhost;dbname=userdb';
    $username = 'mysql';
    $passwd = 'mysql';
    $options = [];
    echo '<pre>';
    echo '<a href = "index.php"><b>BACK</b></a><br><br>';
    $pdo = new PDO($dsn, $username, $passwd, $options);

    $st = $pdo->query($sql, PDO::FETCH_ASSOC);
    var_dump($st->execute());
    var_dump($st->fetchAll());

