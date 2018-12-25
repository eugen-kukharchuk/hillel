<?php
    require_once 'autoload_custom.php';

    $pdo = Connection::getConnect();
    $profileDb=new ProfileDb($pdo);
    $cityDb = new CityDb($pdo);
    $countryDB = new CountryDb($pdo);

    if (!empty($_POST) && key_exists("action", $_POST)){
        switch ($_POST['action']){
            case 'create':
                $profile = new Profile();
                $profile->update($_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['user_id'], $_POST['city_id']);
                $profileDb->create($profile);
                break;
            case 'update':
                $profile = $profileDb->getProfile($_POST['id']);
                $profile->update($_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['user_id'], $_POST['city_id']);
                $profileDb->edit($profile);
                break;
            case 'delete':
                $cityDb->delete($_POST['id']);
                break;
        }
    }

    $profileArray = $profileDb->getProfilesArray();

    echo '<pre>';
    echo "<table border=1 cellpadding=2 cellspacing=0>
    <a href ='profile_form.php'}'>ДОБАВИТЬ ПРОФИЛЬ</a>
                    <tr>
                    <td>ID </td>
                    <td>FIRST NAME</td>
                    <td>LAST NAME</td>
                    <td>ADDRESS</td>
                    <td>CITY</td>      
                    <td>ACTION</td>              
                    </tr>";

    foreach ($profileArray as $profile) {
        //$country = $countryDB->getCountry($profile->getCountryId());
        $city = $cityDb->getCity($profile->getCityId());
        echo "<tr>
                        <td>{$profile->getId()} </td>
                        <td>{$profile->getFirstName()} </td>
                        <td>{$profile->getLastName()} </td>
                        <td>{$profile->getAddress()} </td>
                        <td>{$city->getName()} </td> 
                        <td> 
                        <a href ='profile_form.php?id={$profile->getId()}'>Редактировать</a>
                        <a href ='delete_profile.php?id={$profile->getId()}'>Удалить</a></td>                      
                    </tr>";
    }
    echo "</table>";
    echo "<br><a href = 'index.php'>BACK</a>";