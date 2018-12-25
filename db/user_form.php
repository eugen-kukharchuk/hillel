<?php
    require_once 'autoload_custom.php';

    $pdo = Connection::getConnect();

    if ($user_id = $_GET ['id'])
    {
        $statement = $pdo->query("SELECT * FROM user WHERE id = $user_id");
        /** @var Usr $user */
        $user = $statement ->fetchObject('Usr');
    }
   // var_dump($user->getLogin());

    if (!$user) {
        echo "
        <form method='POST' action ='user.php'>
            <h1>ДОБАВИТЬ НОВОГО ПОЛЬЗОВАТЕЛЯ</h1>
            <input type='hidden' name='action' value='create'>
            <strong>ENTER LOGIN</strong><br>
            <input type = 'text'  name = 'login' size = '20'><br>	   
    
            <strong>ENTER PASSWORD</strong><br>
            <input type = 'password' name = 'password' size = '20'><br>	   
            <input type = 'submit' value = 'Add'><br> 	  	
            
        </form>
        ";
    } else{
        echo "
        <form method='POST' action ='user.php'>
            <h1>РЕДАКТИРОВАТЬ ПОЛЬЗОВАТЕЛЯ</h1>
            <input type = 'hidden' name = 'id' value = '{$user->getId()}'>
            <input type='hidden' name='action' value='update'>
            <strong>ENTER LOGIN</strong><br>
            <input type = 'text' value = '{$user->getLogin()}' name = 'login' size = '20'><br>	   
    
            <strong>ENTER PASSWORD</strong><br>
            <input type = 'password' value = '{$user->getPassword()}'  name = 'password' size = '20'><br>	   
            <input type = 'submit' value = 'Сохранить' name = 'submit'><br> 	  	
            
        </form>
        ";
    }