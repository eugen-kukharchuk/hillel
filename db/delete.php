<?php
    require_once 'autoload_custom.php';

    $pdo = Connection::getConnect();

    if ($_POST){
        $user_id = $_POST ['id'];
    }

    echo "<b>Вы действительно хотите удалить пользователя? </b><br>
         <form action='delete.php' method='get'>
         <input type = 'text' name = 'id' value = '{$user_id}'>
         <p><button type='submit' name = 'delete' value = 'del'>Delete</button>
            <button type='submit' name = 'cancel' value ='cancel'>Cancel</button>
         </p>
         </form>";
  var_dump($_POST);
    if ($_POST['delete'])
    {
       echo "$user_id";
       $pdo->query("DELETE FROM user WHERE id = $user_id");
    }

    echo "<br><a href = 'user.php'>BACK</a>";