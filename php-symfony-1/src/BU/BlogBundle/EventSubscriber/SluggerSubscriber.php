<?php

namespace BU\BlogBundle\EventSubscriber;

use BU\BlogBundle\Service\SluggerService;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use BU\BlogBundle\Entity\Post;

/**
 * Class SluggerSubscriber
 * @package BU\BlogBundle\EventSubscriber
 */
class SluggerSubscriber implements EventSubscriber
{
    const PRE_PERSIST = 'prePersist';
    const PRE_UPDATE = 'preUpdate';

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
        $this->handle($args, self::PRE_PERSIST);
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->handle($args, self::PRE_UPDATE);
    }

    private function handle(LifecycleEventArgs $args, $event)
    {
        /** @var Post $entity */
        $entity = $args->getEntity();
        $em = $args->getEntityManager();

        if ($entity instanceof Post) {
            $slug = $entity->getSlug();
            $slug = $this->slugger->slugify($slug);
            $entity->setSlug($slug);
        }
    }
}
