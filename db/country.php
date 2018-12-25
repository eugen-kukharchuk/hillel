<?php
    require_once 'autoload_custom.php';

    $pdo = Connection::getConnect();
    $countryDb = new CountryDb($pdo);

    if (!empty($_POST) && key_exists("action", $_POST)){
        switch ($_POST['action']){
            case 'create':
                $country = new Country();
                $country->update($_POST['name'], $_POST['code'], $_POST['phone_code']);
                $countryDb->create($country);
                break;
            case 'update':
                $country = $countryDb->getCountry($_POST['id']);
                $country->update($_POST['name'], $_POST['code'], $_POST['phone_code']);
                $countryDb->edit($country);
                break;
            case 'delete':
                $countryDb->delete($_POST['id']);
                break;
        }
    }

    $countryArray = $countryDb->getCountryArray();

    echo '<pre>';
    echo "<table border=1 cellpadding=2 cellspacing=0>
    <a href ='country_form.php'}'>ДОБАВИТЬ СТРАНУ</a>
                <tr>
                <td>ID </td>
                <td>NAME</td>
                <td>CODE</td>
                <td>PHONE CODE</td>
                <td>ACTION</td>
                </tr>";

    foreach ($countryArray as $country) {
        echo "<tr>
                    <td>{$country->getId()} </td>
                    <td>{$country->getName()} </td>
                    <td>{$country->getCode()} </td>
                    <td>{$country->getPhoneCode()} </td>
                    <td> 
                    <a href ='country_form.php?id={$country->getId()}'>Редактировать</a>
                    <a href ='delete_c.php?id={$country->getId()}'>Удалить</a></td>
              </tr>";
    }
    echo "</table>";
    echo "<br><a href = 'index.php'>BACK</a>";
