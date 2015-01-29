<?php

namespace Site\UserBundle\Form;

use Site\FrontBundle\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Site\UserBundle\Form\AuthorType;
use Site\UserBundle\Form\ReaderType;


class UserType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        parent::buildForm($builder, $options);

        $builder
                ->add('username', 'text',
                        array(
                            'label' => 'Nom d\'utilisateur : ',
                            'attr' => array(
                                'class' => 'form-control'
                            )
                        ))
                ->add('email', 'email',
                        array(
                            'label' => 'Email : ',
                            'attr' => array(
                                'class' => 'form-control'
                            )
                        ))
                ->add('type', 'choice',
                        array(
                            'label' => 'Type de compte : ',
                            'choices' => array(
                                'ROLE_USER' => 'Lecteur',
                                'ROLE_AUTHOR' => 'Auteur'
                            )
                        )
                    )
                ->add('image', new ImageType());

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event)
        {
            $user = $event->getData();
            
            if($user->getId())
            {
                $form = $event->getForm();
                switch($user->getType())
                {
                    case 'ROLE_READER' :
                    case 'ROLE_MEMBER' :
                        $formProperty = 'reader';
                        $formType = new ReaderType();
                        break;
                    case 'ROLE_AUTHOR':
                        $formProperty = 'author';
                        $formType = new AuthorType();
                        break;
                }
                $form->add($formProperty,$formType);
            }
        });
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_userbundle_user';
    }
}
