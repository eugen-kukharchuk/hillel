<?php
require_once 'autoload_custom.php';

class ProfileDb
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getProfilesArray(){
        $statement = $this->pdo->query('SELECT * FROM profile');
        $statement ->setFetchMode(
            PDO::FETCH_CLASS,
            'Profile');
        return $statement->fetchAll();
    }

    public function getProfile($id)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM profile WHERE id = %s", $id)
        );
        return $statement->fetchObject('Profile');
    }

    public function edit(Profile $profile)
    {
        if (empty($profile->getId())) {
            echo "<p style='color: red'>Обьект profile нужно создать!";
            return;
        }

        $cityDb = new CityDb($this->pdo);
        $userDb = new UserDb($this->pdo);


        $result = $this->pdo->exec(sprintf("UPDATE profile SET 
        `first_name`='%s', 
        `last_name`='%s',
        `address`='%s',
        `user_id`='%s',
        `city_id`='%s'
        WHERE id = %s",
            $profile->getFirstName(),
            $profile->getLastName(),
            $profile->getAddress(),
            $profile->getUserId(),
            $profile->getCityId(),
            $profile->getId()));

        if ($result === false)
            var_dump($this->pdo->errorInfo());
    }

    public function create(Profile $profile)
    {
        if (empty($profile->getFirstName())
            || empty($profile->getLastName())
            || empty($profile->getAddress())
            || empty($profile->getUserId() )
            || empty($profile->getCityId())){
            echo "<p style='color:red'>Все поля должны быть заполнены";
            return;
        }

        $result = $this->pdo->exec(sprintf("INSERT INTO profile 
                  (`first_name`, `last_name`, `address`, `user_id`, `city_id`) 
                    VALUE ('%s', '%s','%s','%s','%s')",
                    $profile->getFirstName(),
                    $profile->getLastName(),
                    $profile->getAddress(),
                    $profile->getUserId(),
                    $profile->getCityId()));

        if ($result === false)
            var_dump($this->pdo->errorInfo());
    }

    public function delete($id){
        $result = $this->pdo->exec(sprintf("DELETE FROM profile WHERE id =%s", $id));
        if ($result === false)
            var_dump($this->pdo->errorInfo());
    }
}