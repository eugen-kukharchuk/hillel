<?php
    require_once 'autoload_custom.php';

    $pdo=Connection::getConnect();
    $cityDb=new CityDb($pdo);
    $id=$_GET ['id'];
    $city = $cityDb->getCity($id);

    echo "
                <b>Вы действительно хотите удалить город {$city->getName()} из базы? </b><br>
                 <form id = 'delete' action='city.php' method='post'>
                 <input type = 'hidden' name = 'action' value = 'delete'>
                 <input type = 'hidden' name = 'id' value = '{$city->getId()}'>
                 <button>Delete</button>
                 </form>
                 
                 <form action='city.php' method='get'>
                 <button>Cancel</button>
                 </form>
                 ";

