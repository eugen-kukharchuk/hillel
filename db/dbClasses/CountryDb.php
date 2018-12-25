<?php
class CountryDb
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getCountryArray(){
        $statement = $this->pdo->query('SELECT * FROM country');
        $statement ->setFetchMode(
            PDO::FETCH_CLASS,
            'Country');
        return $statement->fetchAll();
    }

    public function getCountry($id)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM country WHERE id = %s", $id)
        );
        return $statement->fetchObject('Country');
    }

    public function getCountryByName($name)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM country WHERE `name` = '%s'", $name)
        );
        return $statement->fetchObject('Country');
    }

    public function edit(Country $country)
    {
        if (empty($country->getId())) {
            echo "<p style='color: red'>Обьект страны нужно создать!";
            return;
        }

        $countryCheck = $this->getCountryByName($country->getName());
        if ($countryCheck instanceof Country && $countryCheck->getId() != $country->getId()) {
            echo sprintf("<p style='color: red'>Страна с названием %s уже существует!", $country->getName()) ;
            return;
        }

        if (empty($country->getName()) || empty($country->getCode()) || empty ($country->getPhoneCode())){
            echo "<p style='color:red'>Все поля должны быть заполнены";
            return;
        }
        $result = $this->pdo->exec(sprintf("UPDATE country SET `name`='%s', `code`='%s', `phone_code`='%s' WHERE id = %s",
            $country->getName(),
            $country->getCode(),
            $country->getPhoneCode(),
            $country->getId()));
        if ($result === false)
            var_dump($this->pdo->errorInfo());
    }
    public function create(Country $country)
    {
        if (empty($country->getName()) || empty($country->getCode()) || empty ($country->getPhoneCode())){
            echo "<p style='color:red'>Все поля должны быть заполнены";
            return;
        }

        $countryCheck = $this->getCountryByName($country->getName());
        if ($countryCheck instanceof Country) {
            echo sprintf("<p style='color: red'>Страна с названием %s уже существует!", $country->getName()) ;
            return;
        }

        $result = $this->pdo->exec(sprintf("INSERT INTO country (`name`, `code`, `phone_code`) VALUE ('%s', '%s', '%s')",
            $country->getName(),
            $country->getCode(),
            $country->getPhoneCode()));
        if ($result === false)
            var_dump($this->pdo->errorInfo());
    }

    public function delete($id){
        $result = $this->pdo->exec(sprintf("DELETE FROM country WHERE id =%s", $id));

        if ($result === false)
            var_dump($this->pdo->errorInfo());
    }
}