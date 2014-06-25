<?php

namespace BW\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
    private $heading = '';

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var string
     */
    private $link = '';

    /**
     * @var boolean
     */
    private $read = false;

    /**
     * @var boolean
     */
    private $liked = false;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var ArrayCollection
     */
    private $tags;

    /**
     * @var \BW\UserBundle\Entity\User
     */
    private $user;


    public function __construct()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
        $this->tags = new ArrayCollection();
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
        if (isset($description)) {
            $this->description = $description;
        } else {
            $this->description = '';
        }


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

    /**
     * Get read
     *
     * @return boolean 
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * Get liked
     *
     * @return boolean 
     */
    public function getLiked()
    {
        return $this->liked;
    }

    /**
     * Add tags
     *
     * @param \BW\BlogBundle\Entity\Tag $tags
     * @return Resource
     */
    public function addTag(\BW\BlogBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \BW\BlogBundle\Entity\Tag $tags
     */
    public function removeTag(\BW\BlogBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Set tags
     *
     * @var \Doctrine\Common\Collections\Collection $tags
     * @return Resource
     */
    public function setTags(ArrayCollection $tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }


    /**
     * Set user
     *
     * @param \BW\UserBundle\Entity\User $user
     * @return Resource
     */
    public function setUser(\BW\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BW\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
