<?php

namespace Site\FrontBundle\Form\Admin;

use Site\FrontBundle\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text',
                array(
                    'label' => 'Nom'
                ))
            ->add('description','textarea')
            ->add('status','choice',
                    array(
                        'choices' => array(
                            '0' => 'Offline',
                            '1' => 'Online',
                        ),
                        'label' => 'Statut',
                        'multiple' => false,
                        'expanded' => true
                    ))
            ->add('image', new ImageType(), 
                    array(
                        'required' => false
                    ))  
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\FrontBundle\Entity\Category'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_frontbundle_category';
    }
}
