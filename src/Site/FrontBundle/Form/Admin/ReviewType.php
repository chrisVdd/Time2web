<?php

namespace Site\FrontBundle\Form\Admin;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReviewType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value', 'integer',
                    array(
                        'label' => 'Votre note',
                        'attr' => array(
                            'class' => 'rating',
                            'min'   => '0',
                            'max'   => '5',
                            'step'  => '1',
                            )
                    ))
            ->add('comment', 'textarea', 
                    array(
                        'label' => 'Votre commentaire',
                        'attr' => array(
                            'class' => 'form-control'
                        )))
            ->add('status','choice',
                    array(
                        'choices' => array(
                            '0' => 'Offline',
                            '1' => 'Online',
                        ),
                        'label' => 'Statut',
                        'attr' => array(
                            'class' => 'form-control'
                        ),
                        'multiple' => false,
                        'expanded' => false
                    ))
        ;
        
        $builder->remove('value');
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\FrontBundle\Entity\Review'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_frontbundle_review';
    }
}
