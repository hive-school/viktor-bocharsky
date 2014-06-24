<?php

namespace BW\BlogBundle\Form\DataTransformer;

use Doctrine\Common\Collections\ArrayCollection;
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
        if ($tags instanceof ArrayCollection) {
            throw new \InvalidArgumentException('Expected instance of Doctrine\Common\Collections\ArrayCollection');
        }

        return implode(', ', $tags->toArray());
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

        $resource = $this->om
            ->getRepository('BWBlogBundle:Resource')
            ->find(1) // @TODO MUST BE DYNAMIC !!!
        ;

        // replace spaces before and after comma and comma in sequence to one comma
        $string = preg_replace('/\s*,+\s*/', ',', $string);
        // replace few spaces to one space
        $string = preg_replace('/\s+/', ' ', $string);
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
        $resource->setTags($tags);

        return $tags;
    }
}