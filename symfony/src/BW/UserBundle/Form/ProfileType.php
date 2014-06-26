<?php

namespace BW\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surname', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('name', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('patronymic', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('phone', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('update', 'submit', array(
                'label' => 'Update',

            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BW\UserBundle\Entity\Profile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bw_profile';
    }
}
