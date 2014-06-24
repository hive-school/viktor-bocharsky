<?php

namespace BW\BlogBundle\Form;

use BW\BlogBundle\Form\DataTransformer\TagsToStringTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResourceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // this assumes that the entity manager was passed in as an option
        $entityManager = $options['em'];
        $transformer = new TagsToStringTransformer($entityManager);

        $builder
            ->add('link', 'url', array(
            ))
            ->add('heading', 'text', array(
            ))
            ->add('description', 'textarea', array(
                'required' => false,
            ))
            ->add('read', 'checkbox', array(
                'required' => false,
            ))
            ->add('liked', 'checkbox', array(
                'required' => false,
            ))
            ->add(
                $builder->create('tags', 'text', array(
                    'required' => false,
                    'attr' => array(
                        'placeholder' => 'Enter tags, separated by comma...',
                    )
                ))->addModelTransformer($transformer)
            )
            // add a normal text field, but add your transformer to it
//            ->addModelTransformer($transformer)
        ;
//        $builder->add(
//            $builder->create('issue', 'text')
//                ->addModelTransformer($transformer)
//        );
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class' => 'BW\BlogBundle\Entity\Resource',
            ))
            ->setRequired(array(
                'em',
            ))
            ->setAllowedTypes(array(
                'em' => 'Doctrine\Common\Persistence\ObjectManager',
            ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bw_resource';
    }
}
