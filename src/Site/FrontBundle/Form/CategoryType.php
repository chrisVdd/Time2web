<?php

namespace Site\FrontBundle\Form;

use Site\FrontBundle\Form\Admin\ImageCategoryType;
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
            ->add('description','textarea',
                    array(
                        'label' => 'Description'
                    ))
            ->add('status','choice',
                    array(
                        'choices' => array(
                            '0' => 'Offline',
                            '1' => 'Online',
                        ),
                        'label' => 'Statut',
                        'multiple' => false,
                        'expanded' => false
                    ))
            ->add('image', new ImageCategoryType())
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
