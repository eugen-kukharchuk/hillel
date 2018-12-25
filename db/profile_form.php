<?php
require_once 'autoload_custom.php';

$pdo = Connection::getConnect();
$profileDb=new ProfileDb($pdo);
$cityDb = new CityDb($pdo);
$userDb = new UserDb($pdo);
$cities = $cityDb->getCityArray();
$users = $userDb->getUserArray();
$profile = null;


if (key_exists('id', $_GET)) {
    /** @var City $city */
    $profile = $profileDb->getProfile($_GET['id']);
}

if ($profile instanceof Profile) {
    echo "
            <h1>РЕДАКТИРОВАТЬ ПРОФИЛЬ</h1>
            <form method='POST' action ='profile.php'>                
                <input type = 'hidden' name = 'id' value = '{$profile->getId()}'>
                <input type='hidden' name='action' value='update'>
                <strong>ENTER FIRST NAME</strong><br>
                <input type = 'text' value = '{$profile->getFirstName()}' name = 'first_name' size = '20'><br>
                <strong>ENTER LAST NAME</strong><br>
                <input type = 'text' value = '{$profile->getLastName()}' name = 'last_name' size = '20'><br>
                <strong>ENTER ADDRESS</strong><br>
                <input type = 'text' value = '{$profile->getAddress()}' name = 'address' size = '20'><br>	 
                <strong>CHOOSE USER</strong><br>
                <select name='user_id'>";
                foreach ($users as $user) {
                if ($profile->getUserId() == $user->getId()) {
                    echo "<option selected='selected' value='{$user->getId()}'>{$user->getLogin()}</option>";
                } else {
                    echo "<option value='{$user->getId()}'>{$user->getLogin()}</option>";
                       }
                }
                echo "</select><br>
                <strong>CHOOSE CITY</strong><br>
                    <select name='city_id'>
                        <option></option>";
                        foreach ($cities as $city) {
                        if ($profile->getCityId() == $city->getId()) {
                        echo "<option selected='selected' value='{$city->getId()}'>{$city->getName()}</option>";
                        } else
                        echo "<option value='{$city->getId()}'>{$city->getName()}</option>";
                        }
                    echo "</select><br>
                <input type = 'submit' value = 'Сохранить' name = 'submit'><br> 
            </form>
            ";
} else{

    echo "
            <form method='POST' action ='profile.php'>
                <h1>ДОБАВИТЬ НОВЫЙ ПРОФИЛЬ</h1>
                <input type='hidden' name='action' value='create'>
                <strong>ENTER FIRST NAME</strong><br>
                <input type = 'text'  name = 'first_name' size = '20'><br>
                <strong>ENTER LAST NAME</strong><br>
                <input type = 'text'  name = 'last_name' size = '20'><br> 
                <strong>ENTER ADDRESS</strong><br>
                <input type = 'text'  name = 'address' size = '20'><br>
                <strong>CHOOSE USER ID</strong><br>
                <select name='user_id'>
                     <option></option>";
                foreach ($users as $user) {
                        echo "<option value='{$user->getId()}'>{$user->getLogin()}</option>";
                    }
                echo "</select><br>
                <strong>CHOOSE CITY</strong><br>
                <select name='city_id'>
                     <option></option>";
                foreach ($cities as $city) {
                        echo "<option value='{$city->getId()}'>{$city->getName()}</option>";
                    }
                    echo "</select><br>
                <input type = 'submit' value = 'Add'><br> 	  	
                
            </form>
            ";
}