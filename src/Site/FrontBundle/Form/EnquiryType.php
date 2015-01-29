<?php

namespace Site\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EnquiryType extends AbstractType
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
                    'label' => 'Votre nom : ',
                    'attr' => array(
                        'class' => 'form-control'
                    )
            ))
            ->add('email', 'email', 
                    array(
                        'label' => 'Votre email : ',
                        'attr' => array(
                        'class' => 'form-control'
                    )
            ))
            ->add('subject', 'text', 
                    array(
                        'label' => 'Votre sujet : ',
                        'attr' => array(
                        'class' => 'form-control'
                    )

            ))
            ->add('body', 'textarea', 
                    array(
                        'label' => 'Votre message : ',
                        'attr' => array(
                        'class' => 'form-control'
                    )
            ))
;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_frontbundle_contact';
    }
}
