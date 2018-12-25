<?php
    require_once 'autoload_custom.php';

    $pdo = Connection::getConnect();
    $cityDb = new CityDb($pdo);
    $countryDB = new CountryDb($pdo);
    $countries = $countryDB->getCountryArray();
    $city = null;


    if (key_exists('id', $_GET)) {
        /** @var City $city */
        $city = $cityDb->getCity($_GET['id']);
    }

    if ($city instanceof City) {
        echo "
            <h1>РЕДАКТИРОВАТЬ ГОРОД</h1>
            <form method='POST' action ='city.php'>                
                <input type = 'hidden' name = 'id' value = '{$city->getId()}'>
                <input type='hidden' name='action' value='update'>
                <strong>ENTER NAME</strong><br>
                <input type = 'text' value = '{$city->getName()}' name = 'name' size = '20'><br>	 
                <strong>CHOOSE COUNTRY</strong><br>
                <select name='country_id'>";

                foreach ($countries as $country) {
                    if ($city->getCountryId() == $country->getId()) {
                        echo "<option selected='selected' value='{$country->getId()}'>{$country->getName()}</option>";
                    } else {
                        echo "<option value='{$country->getId()}'>{$country->getName()}</option>";
                    }
                }
              echo "</select><br>
                <input type = 'submit' value = 'Сохранить' name = 'submit'><br> 
            </form>
            ";
    } else{

        echo "
            <form method='POST' action ='city.php'>
                <h1>ДОБАВИТЬ НОВЫЙ ГОРОД</h1>
                <input type='hidden' name='action' value='create'>
                <strong>ENTER NAME</strong><br>
                <input type = 'text'  name = 'name' size = '20'><br>    
                <strong>CHOOSE COUNTRY</strong><br>
                <select name='country_id'>
                     <option></option>";
                     foreach ($countries as $country) {
                        echo "<option value='{$country->getId()}'>{$country->getName()}</option>";
                    }
                echo "</select><br>
                <input type = 'submit' value = 'Add'><br> 	  	
                
            </form>
            ";
    }