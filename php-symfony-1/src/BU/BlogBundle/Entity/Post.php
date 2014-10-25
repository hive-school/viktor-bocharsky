<?php

namespace BU\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="posts")
 * @ORM\Entity
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="BU\BlogBundle\Entity\Comment", mappedBy="post")
     */
    private $comments;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="BU\BlogBundle\Entity\Category", inversedBy="posts")
     */
    private $category;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="BU\BlogBundle\Entity\User", inversedBy="posts")
     */
    private $user;


    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }


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
     * @return Post
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
     * Set text
     *
     * @param string $text
     * @return Post
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param \BU\BlogBundle\Entity\Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return \BU\BlogBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param \BU\BlogBundle\Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \BU\BlogBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
