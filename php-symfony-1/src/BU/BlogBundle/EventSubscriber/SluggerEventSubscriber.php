<?php

namespace BU\BlogBundle\EventSubscriber;

use BU\BlogBundle\Service\SluggerService;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use BU\BlogBundle\Entity\Post;

/**
 * Class SluggerEventSubscriber
 * @package BU\BlogBundle\EventListener
 */
class SluggerEventSubscriber implements EventSubscriber
{
    /**
     * @var \BU\BlogBundle\Service\SluggerService
     */
    private $slugger;


    public function __construct(SluggerService $slugger)
    {
        $this->slugger = $slugger;
    }


    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'preUpdate',
        );
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        /** @var Post $entity */
        $entity = $args->getEntity();
        $em = $args->getEntityManager();

        if ($entity instanceof Post) {
            $this->slugify($entity);
        }
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        /** @var Post $entity */
        $entity = $args->getEntity();
        $em = $args->getEntityManager();

        if ($entity instanceof Post) {
            $this->slugify($entity);
        }
    }

    private function slugify(Post $entity)
    {
        $slug = $entity->getSlug();
        $slug = $this->slugger->slugify($slug);
        $entity->setSlug($slug);
    }
}
