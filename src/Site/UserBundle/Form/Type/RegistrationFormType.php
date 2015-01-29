<?php

namespace Site\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('type', 'choice', 
                array(
                    'label' => 'Type de compte : ',
                    'choices' => array(
                        'ROLE_READER' => 'Lecteur',
                        'ROLE_AUTHOR' => 'Auteur'
                    ),
                    'expanded' => false,
                    'multiple' => false,
                    'attr' => array(
                        'class' => 'form-group'
                    )
        ));
    }

    public function getName() {
        return 'site_user_registration';
    }

}
