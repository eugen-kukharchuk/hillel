<?php
require_once 'autoload_custom.php';

$pdo = Connection::getConnect();
$countryDb = new CountryDb($pdo);
$country = null;

if (key_exists('id', $_GET)) {
    /** @var Country $country */
    $country = $countryDb->getCountry($_GET['id']);
}

if ($country instanceof Country) {
    echo "
        <h1>РЕДАКТИРОВАТЬ СТРАНУ</h1>
        <form method='POST' action ='country.php'>            
            <input type = 'hidden' name = 'id' value = '{$country->getId()}'>
            <input type='hidden' name='action' value='update'>
            <strong>ENTER NAME</strong><br>
            <input type = 'text' value = '{$country->getName()}' name = 'name' size = '20'><br>	 
            <strong>ENTER CODE</strong><br>
            <input type = 'text' value = '{$country->getCode()}' value = '{$country->getCode()}'  name = 'code' size = '20'><br>	
            <strong>ENTER PHONE CODE</strong><br>
            <input type = 'text' value = '{$country->getPhoneCode()}' name = 'phone_code' size = '20'><br>	    
            <input type = 'submit' value = 'Сохранить' name = 'submit'><br> 	  	
            
        </form>
        ";
} else{
    echo "
        <form method='POST' action ='country.php'>
            <h1>ДОБАВИТЬ НОВУЮ СТРАНУ</h1>
            <input type='hidden' name='action' value='create'>
            <strong>ENTER NAME</strong><br>
            <input type = 'text'  name = 'name' size = '20'><br>    
            <strong>ENTER CODE</strong><br>
            <input type = 'text' name = 'code' size = '20'><br>
            <strong>ENTER PHONE CODE</strong><br>
            <input type = 'text' name = 'phone_code' size = '20'><br>	   
            <input type = 'submit' value = 'Add'><br>   	
            
        </form>
        ";

}