<?php

namespace BU\ProjectBundle\EventListener;

use BU\BlogBundle\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Class UserListener
 * @package BU\ProjectBundle\EventListener
 */
class UserListener
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;


    /**
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof User) {
            $mailer = $this->mailer;
            // generate mail and send it

            print 'User mail sent...';
//            die;
        }
    }
} 