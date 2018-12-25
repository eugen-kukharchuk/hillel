<?php
require_once 'autoload_custom.php';

$pdo=Connection::getConnect();
$profileDb=new ProfileDb($pdo);
$id=$_GET ['id'];
$profile = $profileDb->getProfile($id);

echo "
                <b>Вы действительно хотите удалить профиль {$profile->getFirstName()} {$profile->getLastName()} из базы? </b><br>
                 <form id = 'delete' action='profile.php' method='post'>
                 <input type = 'hidden' name = 'action' value = 'delete'>
                 <input type = 'hidden' name = 'id' value = '{$profile->getId()}'>
                 <button>Delete</button>
                 </form>
                 
                 <form action='profile.php' method='get'>
                 <button>Cancel</button>
                 </form>
                 ";

