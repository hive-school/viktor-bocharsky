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
    private $pattern = '#[^0-9A-Za-z_-]+#';

    /**
     * @var bool
     */
    private $lowerCase = true;


    public function __construct()
    {
    }


    /**
     * @param string $string
     *
     * @return string
     */
    public function slugify($string)
    {
        $slug = preg_replace($this->pattern, '-', $string); // replace all forbidden chars with hyphen
        $slug = trim($slug, '-'); // trimmed hyphens at begin/end of slug
        if (true === $this->isLowerCase()) {
            $slug = strtolower($slug); // transform slug to lower case
        }

        return $slug;
    }

    /**
     * @param string $pattern
     *
     * @return $this
     */
    public function setPattern($pattern)
    {
        $this->pattern = (string)$pattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param bool $lowerCase
     *
     * @return $this
     */
    public function setLowerCase($lowerCase)
    {
        $this->lowerCase = (bool)$lowerCase;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isLowerCase()
    {
        return $this->lowerCase;
    }
}
