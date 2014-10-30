<?php

namespace BU\BlogBundle\Service;

/**
 * Interface SluggerInterface
 * @package BU\BlogBundle\Service
 */
interface SluggerInterface
{
    /**
     * @param string $string
     *
     * @return string
     */
    public function toSlug($string);
}
