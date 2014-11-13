<?php

namespace BU\ProjectBundle\EventListener;

use BU\ProjectBundle\Entity\Project;
use BU\ProjectBundle\Entity\Status;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class ProjectListener
 * @package BU\ProjectBundle\EventListener
 */
class ProjectListener
{
    /**
     * @var Session
     */
    private $session;


    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }


    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $em = $args->getEntityManager();


        if ($entity instanceof Project) {
            $entity->getStatus();

            if (! $entity->getStatus()) {
                $status = $em->getRepository('BUProjectBundle:Status')->findOneBy([
                    'name' => 'New',
                ]);

                if (! $status) {
                    // Create New status
                    $status = new Status();
                    $status->setName('New');
                    $em->persist($status);
                }

                $entity->setStatus($status);
            }

            if ($entity->getStatus()) {
                $this->session->getFlashBag()->add('notice', sprintf(
                    'Status <strong>%s</strong> successfully set to the <strong>%s</strong> project.'
                    , $entity->getStatus()->getName()
                    , $entity->getName()
                ));
            }
        }
    }
} 