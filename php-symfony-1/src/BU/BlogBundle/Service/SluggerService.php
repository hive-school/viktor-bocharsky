<?php

namespace BU\BlogBundle\Service;

/**
 * Class SluggerService
 * @package BU\BlogBundle\Service
 */
class SluggerService implements SluggerInterface
{
    /**
     * @var string
     */
    private $pattern;


    public function __construct($pattern = '@[^0-9A-Za-z_-]@')
    {
        $this->pattern = $pattern;
    }


    /**
     * @param string $string
     *
     * @return string
     */
    public function toSlug($string)
    {
        return preg_replace($this->pattern, '', $string);
    }
} 