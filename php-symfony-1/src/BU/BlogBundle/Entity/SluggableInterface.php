<?php

namespace BU\BlogBundle\Entity;

/**
 * Interface SluggableInterface
 * @package BU\BlogBundle\Entity
 */
interface SluggableInterface
{
    /**
     * @return string
     */
    public function getStringForSlugging();

    /**
     * @param string $slug
     *
     * @return SluggableInterface
     */
    public function setSlug($slug);

    /**
     * @return string
     */
    public function getSlug();
}
