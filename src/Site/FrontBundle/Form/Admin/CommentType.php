<?php

namespace Site\FrontBundle\Form\Admin;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('content', 'textarea')
                ->add('status', 'choice', 
                        array(
                            'choices' => array(
                                '0' => 'Offline',
                                '1' => 'Online',
                            ),
                            'label' => 'Statut',
                            'multiple' => false,
                            'expanded' => true
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Site\FrontBundle\Entity\Comment'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'site_frontbundle_comment';
    }

}
