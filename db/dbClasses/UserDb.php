<?php
class UserDb
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserArray(){
        $statement = $this->pdo->query('SELECT * FROM user');
        $statement ->setFetchMode(
            PDO::FETCH_CLASS,
            'Usr');
        return $statement->fetchAll();
    }

    public function getUser($id)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM user WHERE id = %s", $id)
        );
        return $statement->fetchObject('Usr');
    }

    public function editUser($id, $login, $password)
    {
        if (empty($login) || empty($password)){
            echo "<p style='color:red'>Поля логин и пароль не должны быть пустыми";
            return;
        }
        $result = $this->pdo->exec(sprintf("UPDATE user SET `login`='%s', `password`='%s' WHERE id = %s", $login, $password, $id));
        if ($result === false)
            var_dump($this->pdo->errorInfo());
    }
    public function createUser($login, $password)
    {
        if (empty($login) || empty($password)){
            echo "<p style='color:red'>Поля логин и пароль не должны быть пустыми";
            return;
        }
        $result = $this->pdo->exec(sprintf("INSERT INTO user (`login`, `password`) VALUE ('%s', '%s')", $login, $password));
        if ($result === false)
            var_dump($this->pdo->errorInfo());
    }

    public function deleteUser($id){
        $result = $this->pdo->exec(sprintf("DELETE FROM user WHERE id =%s", $id));

        if ($result === false)
                var_dump($this->pdo->errorInfo());
    }

}