<?php
class CityDb
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getCityArray(){
        $statement = $this->pdo->query('SELECT * FROM city');
        $statement ->setFetchMode(
            PDO::FETCH_CLASS,
            'City');
        return $statement->fetchAll();
    }

    public function getCity($id)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM city WHERE id = %s", $id)
        );
        return $statement->fetchObject('City');
    }

    public function getCityByName($name)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM city WHERE `name` = '%s'", $name)
        );
        return $statement->fetchObject('City');
    }

    public function edit(City $city)
    {
        if (empty($city->getId())) {
            echo "<p style='color: red'>Обьект city нужно создать!";
            return;
        }

        $cityCheck = $this->getCityByName($city->getName());
        if ($cityCheck instanceof City && $cityCheck->getId() != $cityCheck->getId()) {
            echo sprintf("<p style='color: red'>Город с названием %s уже существует!", $city->getName()) ;
            return;
        }

        if (empty($city->getName()) || empty($city->getCountryId())){
            echo "<p style='color:red'>Все поля должны быть заполнены";
            return;
        }

        $result = $this->pdo->exec(sprintf("UPDATE city SET `name`='%s', `country_id`='%s' WHERE id = %s",
            $city->getName(),
            $city->getCountryId(),
            $city->getId()));
        if ($result === false)
            var_dump($this->pdo->errorInfo());
    }

    public function create(City $city)
    {
        if (empty($city->getName()) || empty($city->getCountryId())){
            echo "<p style='color:red'>Все поля должны быть заполнены";
            return;
        }

        $cityCheck = $this->getCityByName($city->getName());
        if ($cityCheck instanceof City) {
            echo sprintf("<p style='color: red'>Город с названием %s уже существует!", $city->getName()) ;
            return;
        }

        $result = $this->pdo->exec(sprintf("INSERT INTO city (`name`, `country_id`) VALUE ('%s', '%s')",
            $city->getName(),
            $city->getCountryId()));

        if ($result === false)
            var_dump($this->pdo->errorInfo());
    }

    public function delete($id){
        $result = $this->pdo->exec(sprintf("DELETE FROM city WHERE id =%s", $id));
        if ($result === false)
            var_dump($this->pdo->errorInfo());
    }
}