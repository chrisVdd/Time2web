<?php

namespace Site\FrontBundle\Form;


use Site\FrontBundle\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class TutorialType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text',
                    array(
                        'label' => 'Titre',
                        'attr' => array(
                            'class' => 'form-control'
                        )
                    ))
            ->add('description', 'textarea', 
                    array(
                        'label' => 'Description',
                        'attr' => array(
                            'class' => 'form-control'
                        )
                    ))
            ->add('content', 'textarea',
                    array(
                        'label' => 'Contenu',
                        'attr' => array(
                            'class' => 'ckeditor'
                        )
                    ))
            ->add('difficulty', 'choice', 
                    array(
                        'choices' => array(
                            '1' => 'Niveau débutant',
                            '2' => 'Niveau moyen',
                            '3' => 'Niveau pro',
                        ),
                        'label' => 'Niveau de difficulté',
                        'attr' => array(
                            'class' => 'form-control'
                        ),
                        'multiple' => false,
                        'expanded' => false
                    ))
            ->add('requirement', 'text', 
                    array(
                        'label' => 'Connaissances requises',
                        'attr' => array(
                            'class' => 'form-control'
                        )
                    ))
             ->add('category', 'entity',
                    array(
                        'label'     => 'Catégorie',
                        'class'     => 'SiteFrontBundle:Category',
                        'property'  => 'name',
                        'multiple'  => false,
                        'expanded'  => true,
                    ))
            ->add('programminglanguages', 'entity', 
                    array(
                        'label'     => 'Langage(s) utilisé(s)',
                        'class'     => 'SiteFrontBundle:Programminglanguage',
                        'property'  => 'name',
                        'multiple'  => true,
                        'expanded'  => true,
                        'attr'      => array(
                            'class' => 'checkbox'
                        )
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
            'data_class' => 'Site\FrontBundle\Entity\Tutorial'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_frontbundle_tutorial';
    }
}