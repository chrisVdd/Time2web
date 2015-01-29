<?php

namespace Site\FrontBundle\Controller\user;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\FrontBundle\Entity\Image;

class ImageController extends Controller
{
    public function uploadAction()
    {
        
        if (null === $this->file)
        {
            return;
        }
        
        $image = new Image();
        $form = $this->createFormBuilder($image)
                     ->add('name')
                     ->add('file')
                     ->getForm()
            ;

        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                
                $image->upload();

                $em->persist($image);
                $em->flush();
            }
        }
        return array('form' => $form->createView());
    }
}

