<?php

namespace BU\ProjectBundle\EventListener;

use BU\BlogBundle\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\Session\Session;

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
     * @var Session
     */
    private $session;


    /**
     * @param \Swift_Mailer $mailer
     * @param Session $session
     */
    public function __construct(\Swift_Mailer $mailer, Session $session)
    {
        $this->mailer = $mailer;
        $this->session = $session;
    }


    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof User) {
            $mailer = $this->mailer;
            // generate mail and send it...

            $this->session->getFlashBag()->add('notice', sprintf(
                'Message successfully sent to <strong>"%s"</strong> with account info.', $entity->getEmail()
            ));
        }
    }
} 