<?php

namespace BW\BlogBundle\Form\DataTransformer;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\DataTransformerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BW\BlogBundle\Entity\Tag;

class TagsToStringTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an objects (tags) to a string.
     *
     * @param  ArrayCollection|null $tags
     * @return string
     */
    public function transform($tags)
    {
        if ($tags instanceof Collection) {
            return implode(', ', $tags->toArray());
        }

        return "";
    }

    /**
     * Transforms a string to an objects (tags).
     *
     * @param  string $string
     *
     * @return Tag|null
     */
    public function reverseTransform($string)
    {
        $tags = new ArrayCollection();

        // replace few spaces with one space
        $string = preg_replace('/\s+/', ' ', $string);
        // replace empty tags with one comma
        $string = preg_replace('/,\s+,/', ',', $string);
        // replace few commas with one comma
        $string = preg_replace('/\s*,+\s*/', ',', $string);
        // remove commas at start/end
        $string = preg_replace('/^\s*,*|,*\s*$/', '', $string);
        // tags to lower case
        $string = strtolower($string);
        // get tag array
        $tagNames = explode(',', $string);
        foreach ($tagNames as $tagName) {
            $tag = $this->om
                ->getRepository('BWBlogBundle:Tag')
                ->findOneByName($tagName)
            ;
            if ( ! $tag) {
                $tag = new Tag();
                $tag->setName($tagName);
                $this->om->persist($tag);
            }
            $tags->add($tag);
        }

        return $tags;
    }
}