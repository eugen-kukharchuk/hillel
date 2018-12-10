<?php


    function showSearchResults()
    {
        $pdo = Connection::getConnect();
        $data = $_POST;
        $cntName = $data['options'] ? $data['countries'] : 1;
       // $cityName = $data['options2'] ? $data['city'] : 1;

        $sql = "SELECT p.last_name, p.first_name, c.name as city_name, cnt.name
                        FROM profile as p
                        JOIN city c ON p.city_id=c.id
                        JOIN country cnt ON c.country_id=cnt.id
                        WHERE cnt.code = '$cntName'";

        $st = $pdo->query($sql, PDO::FETCH_ASSOC);

        echo '<pre>';
        echo '<a href = "index.php"><b>BACK</b></a><br><br>';

       // var_dump($st->execute());
        $cityArray = $st->fetchAll();

        echo '<pre>';
        echo "<table border=1 cellpadding=2 cellspacing=0>
                    <tr height=1>
                    <td >## </td>
                    <td >LAST NAME</td>
                    <td >FIRST NAME</td>
                    <td >COUNTRY</td>
                    <td >CITY</td>
                    </tr>";
        $i=1;
        foreach ($cityArray as $ct) {
            echo "<tr>
                        <td>$i</td>
                        <td>{$ct['last_name']} </td>
                        <td>{$ct['first_name']} </td>
                        <td>{$ct['name']} </td>
                        <td>{$ct['city_name']} </td>
                    </tr>";
            $i++;
        }
        echo "</table>";
        //echo "<br><a href = 'index.php'>BACK</a>";

    }

