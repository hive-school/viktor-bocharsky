<?php

namespace BW\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Tag
 * @package BW\BlogBundle\Entity
 */
class Tag
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var ArrayCollection
     */
    private $resources;


    public function __construct()
    {
        $this->resources = new ArrayCollection();
    }

    function __toString()
    {
        return (string)$this->getName();
    }



    /* SETTERS / GETTERS */

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add resources
     *
     * @param \BW\BlogBundle\Entity\Resource $resources
     * @return Tag
     */
    public function addResource(\BW\BlogBundle\Entity\Resource $resources)
    {
        $this->resources[] = $resources;

        return $this;
    }

    /**
     * Remove resources
     *
     * @param \BW\BlogBundle\Entity\Resource $resources
     */
    public function removeResource(\BW\BlogBundle\Entity\Resource $resources)
    {
        $this->resources->removeElement($resources);
    }

    /**
     * Get resources
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResources()
    {
        return $this->resources;
    }
}
