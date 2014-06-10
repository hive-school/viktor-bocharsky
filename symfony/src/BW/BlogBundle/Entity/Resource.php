<?php

namespace BW\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Resource
 * @package BW\BlogBundle\Entity
 */
class Resource
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $heading;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $link;

    /**
     * @var boolean
     */
    private $read;

    /**
     * @var boolean
     */
    private $liked;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;


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
     * Set heading
     *
     * @param string $heading
     * @return Resource
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * Get heading
     *
     * @return string 
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Resource
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Resource
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set read
     *
     * @param boolean $read
     * @return Resource
     */
    public function setRead($read)
    {
        $this->read = $read;

        return $this;
    }

    /**
     * Get read
     *
     * @return boolean 
     */
    public function isRead()
    {
        return $this->read;
    }

    /**
     * Set liked
     *
     * @param boolean $liked
     * @return Resource
     */
    public function setLiked($liked)
    {
        $this->liked = $liked;

        return $this;
    }

    /**
     * Get liked
     *
     * @return boolean 
     */
    public function isLiked()
    {
        return $this->liked;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Resource
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Resource
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}
