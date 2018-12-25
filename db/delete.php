<?php
    require_once 'autoload_custom.php';

    $pdo=Connection::getConnect();
    $userDb=new UserDb($pdo);
    $id=$_GET ['id'];
    $user = $userDb->getUser($id);

    echo "
        <b>Вы действительно хотите удалить пользователя {$user->getLogin()}? </b><br>
         <form id = 'delete' action='user.php' method='post'>
         <input type = 'hidden' name = 'action' value = 'delete'>
         <input type = 'hidden' name = 'id' value = '{$user->getId()}'>
         <button>Delete</button>
         </form>
         
         <form action='user.php' method='get'>
         <button>Cancel</button>
         </form>
         ";

