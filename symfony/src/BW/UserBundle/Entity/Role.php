<?php

namespace BW\UserBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Role
 * @package BW\UserBundle\Entity
 */
class Role implements RoleInterface
{
    private $id;

    private $name;

    private $role;

    private $users;


    public function __construct()
    {
        $this->users = new ArrayCollection();
    }


    /**
     * @see RoleInterface
     */
    public function getRole()
    {
        return $this->role;
    }

    // ... getters and setters for each property
}