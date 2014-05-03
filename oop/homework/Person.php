<?php

/**
 * Class Person
 */
class Person
{

    /**
     * @var string The name of person
     */
    private $name;

    /**
     * @var string The surname of person
     */
    private $surname;

    public function __construct($name = '', $surname = '')
    {
        $this->setName($name);
        $this->setSurname($surname);
    }

    function __toString()
    {
        return ''
            . $this->getName()
            . ($this->getName() && $this->getSurname() ? ' ' : '')
            . $this->getSurname()
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = (string)$name;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = (string)$surname;
    }

}
