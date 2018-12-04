<?php
    $dsn = 'mysql:host=localhost;dbname=userdb';
    $username = 'mysql';
    $passwd = 'mysql';
    $options = [];
    echo '<pre>';
    echo '<a href = "index.php">Back</a>';
    $pdo = new PDO($dsn, $username, $passwd, $options);

    echo '<hr>';
    $st = $pdo->query('SELECT * FROM profile', PDO::FETCH_ASSOC);
    var_dump($st->execute());
    var_dump($st->fetchAll());