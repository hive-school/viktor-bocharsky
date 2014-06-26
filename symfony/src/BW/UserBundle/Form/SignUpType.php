<?php

namespace BW\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SignUpType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('password', 'password', array(
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('email', 'email', array(
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('signUp', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-success',
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
            'data_class' => 'BW\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bw_sign_up';
    }
}
