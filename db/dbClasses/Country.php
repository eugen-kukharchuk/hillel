<?php
class Country
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
     * @var string
     */
    private $code;
    /**
     * @var int
     */
    private $phone_code;

    /**
     * @param string $name
     * @param int $phone_code
     * @param string $code
     *
     * @return Country
     */
    public static function instance($name, $code, $phone_code)
    {
        $self = new self();
        $self->setName($name);
        $self->setCode($code);
        $self->setPhoneCode($phone_code);
        return $self;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getCode(){
        return $this->code;
    }

    public function getPhoneCode(){
        return $this->phone_code;
    }

    public function update($name, $code, $phone_code)
    {
        $this->setName($name);
        $this->setPhoneCode($phone_code);
        $this->setCode($code);
    }

    public function setName($name)
    {
        $this->name=$name;
    }

    public function setCode($code)
    {
        $this->code=$code;
    }

    public function setPhoneCode($phone_code)
    {
        $this->phone_code=$phone_code;
    }

}