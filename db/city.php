<?php
    require_once 'autoload_custom.php';

    $pdo = Connection::getConnect();
    $cityDb = new CityDb($pdo);
    $countryDB = new CountryDb($pdo);

    if (!empty($_POST) && key_exists("action", $_POST)){
        switch ($_POST['action']){
            case 'create':
                $city = new City();
                $city->update($_POST['name'], $_POST['country_id']);
                $cityDb->create($city);
                break;
            case 'update':
                $city = $cityDb->getCity($_POST['id']);
                $city->update($_POST['name'], $_POST['country_id']);
                $cityDb->edit($city);
                break;
            case 'delete':
                $cityDb->delete($_POST['id']);
                break;
        }
    }

    $cityArray = $cityDb->getCityArray();

    echo '<pre>';
    echo "<table border=1 cellpadding=2 cellspacing=0>
    <a href ='city_form.php'}'>ДОБАВИТЬ ГОРОД</a>
                    <tr>
                    <td>ID </td>
                    <td>NAME</td>
                    <td>COUNTRY</td>
                    <td>ACTION</td>
                    </tr>";

    foreach ($cityArray as $city) {
        $country = $countryDB->getCountry($city->getCountryId());
        echo "<tr>
                        <td>{$city->getId()} </td>
                        <td>{$city->getName()} </td>
                        <td>{$country->getName()} </td>
                        <td> 
                        <a href ='city_form.php?id={$city->getId()}'>Редактировать</a>
                        <a href ='delete_city.php?id={$city->getId()}'>Удалить</a></td>
                    </tr>";
    }
    echo "</table>";
    echo "<br><a href = 'index.php'>BACK</a>";