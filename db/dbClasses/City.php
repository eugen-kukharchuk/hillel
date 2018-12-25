<?php
class City
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $country_id;
    private $status;


    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getCountryId(){
        return $this->country_id;
    }

    public function update($name, $countryId)
    {
        $this->name = $name;
        $this->country_id = $countryId;
    }

}