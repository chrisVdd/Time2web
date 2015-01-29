<?php

namespace Site\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReaderType extends AbstractType
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
                        'label' => 'Nom affiché sur le site : ',
                        'attr' => array(
                            'class' => 'form-control'
                        )
                    ))
            ->add('presentation','text',
                    array(
                        'label' => 'Présentation : ',
                        'required' => false,
                        'attr' => array(
                            'class' => 'form-control'
                        )
                    ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\UserBundle\Entity\Reader'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_userbundle_reader';
    }
}
