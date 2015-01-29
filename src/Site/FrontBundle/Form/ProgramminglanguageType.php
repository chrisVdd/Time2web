<?php

namespace Site\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProgrammingLanguageType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text', array(
                    'label' => 'Nom',
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('description', 'textarea', array(
                    'label' => 'Description',
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Site\FrontBundle\Entity\ProgrammingLanguage'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'site_frontbundle_programminglanguage';
    }

}
