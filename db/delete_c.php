<?php
    require_once 'autoload_custom.php';

    $pdo=Connection::getConnect();
    $countryDb=new CountryDb($pdo);
    $id=$_GET ['id'];
    $country = $countryDb->getCountry($id);

    echo "
            <b>Вы действительно хотите удалить страну {$country->getName()} из базы? </b><br>
             <form id = 'delete' action='country.php' method='post'>
             <input type = 'hidden' name = 'action' value = 'delete'>
             <input type = 'hidden' name = 'id' value = '{$country->getId()}'>
             <button>Delete</button>
             </form>
             
             <form action='country.php' method='get'>
             <button>Cancel</button>
             </form>
             ";