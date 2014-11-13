<?php

namespace BU\ProjectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('budget', 'integer', [
                'label' => 'Budget, $',
            ])
            ->add('status', 'entity', [
                'required' => false,
                'class' => 'BU\ProjectBundle\Entity\Status',
                'property' => 'name',
            ])
            ->add('user', 'entity', [
//                'required' => false,
                'class' => 'BU\BlogBundle\Entity\User',
                'property' => 'firstName',
            ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BU\ProjectBundle\Entity\Project'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bu_projectbundle_project';
    }
}
