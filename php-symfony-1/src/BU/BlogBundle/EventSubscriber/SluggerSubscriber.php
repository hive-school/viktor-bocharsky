<?php

namespace BU\BlogBundle\EventSubscriber;

use BU\BlogBundle\Entity\SluggableInterface;
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
        $this->handle($args);
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->handle($args);
    }

    private function handle(LifecycleEventArgs $args)
    {
        /** @var Post $entity */
        $entity = $args->getEntity();

        if ($entity instanceof SluggableInterface) {
            if ($entity->getSlug()) {
                $slug = $entity->getSlug();
            } else {
                $slug = $entity->getStringForSlugging();
            }

            $slug = $this->slugger->slugify($slug);
            $entity->setSlug($slug);
        }
    }
}
