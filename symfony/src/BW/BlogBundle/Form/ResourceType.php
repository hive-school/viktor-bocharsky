<?php

namespace BW\BlogBundle\Form;

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
            ->add('tagsString', 'text', array(
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Enter tags, separated by comma...',
                ),
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BW\BlogBundle\Entity\Resource'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bw_resource';
    }
}
