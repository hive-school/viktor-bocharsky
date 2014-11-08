<?php

namespace BU\ProjectBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 *
 * @ORM\Table(name="project_statuses")
 * @ORM\Entity
 */
class Status
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="BU\ProjectBundle\Entity\Project", mappedBy="status")
     */
    private $projects;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projects = new ArrayCollection();
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
     * @return Status
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
     * Add projects
     *
     * @param \BU\ProjectBundle\Entity\Project $projects
     * @return Status
     */
    public function addProject(\BU\ProjectBundle\Entity\Project $projects)
    {
        $this->projects[] = $projects;

        return $this;
    }

    /**
     * Remove projects
     *
     * @param \BU\ProjectBundle\Entity\Project $projects
     */
    public function removeProject(\BU\ProjectBundle\Entity\Project $projects)
    {
        $this->projects->removeElement($projects);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }
}
