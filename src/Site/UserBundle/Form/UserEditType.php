<?php

namespace Site\UserBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

class UserEditType extends UserType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->remove('type');
    }

    /**
     * @return string
     */
    public function getName() {
        return 'site_userbundle_user';
    }

}
