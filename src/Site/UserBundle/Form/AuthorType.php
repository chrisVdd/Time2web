<?php

namespace Site\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AuthorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('name','text',
                    array(
                        'label' => 'Nom sur le site : ',
                        'attr' => array(
                            'class' => 'form-control'
                        )
                    ))
            ->add('presentation','textarea',
                    array(
                        'label' => 'Présentation : ',
                        'attr' => array(
                            'class' => 'form-control ckeditor'
                        ),
                        'required' => false
                        
                    ))
            ->add('web', 'text',
                    array(
                        'label' => 'Website : ',
                        'required' => false,
                        'attr' => array(
                            'class' => 'form-control',
                            'placeholder' => 'http://'
                        )
                    ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\UserBundle\Entity\Author'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_userbundle_author';
    }
}
