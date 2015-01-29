<?php

namespace Site\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\FrontBundle\Entity\Enquiry;
use Site\FrontBundle\Form\EnquiryType;


class FrontController extends Controller
{   
    public function indexAction($page)
    {
        
        return $this->render('SiteFrontBundle:Front:index.html.twig',
                array(
                    'page'=> $page
                )
        );
    }

    public function aboutAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SiteFrontBundle:Page');
        
        $page = $repository->findBy(
                array('id' => '2')
        );
        
        return $this->render('SiteFrontBundle:Front:about.html.twig',
                array(
                    'page' => $page
                ));
    }

    public function contactAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SiteFrontBundle:Page');
        
        $page= $repository->findBy(
                array('id' => '3')
        );
        
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        $request = $this->getRequest();
        
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid())
            {
                $message = \Swift_Message::newInstance()
                        ->setSubject('Contact depuis Time2Web')
                        ->setFrom('christina.vandd@gmail.com')
                        ->setTo($this->container->getParameter('site_front.emails.contact_email'))
                        ->setBody($this->renderView('SiteFrontBundle:Page:contactEmail.html.twig', 
                                array(
                                    'enquiry' => $enquiry
                        )));
                
                $this->get('mailer')->send($message);
                
                $request->getSession()->getFlashBag()->add('success', 'Merci !  Votre email a été envoyé avec succès.');
                
                return $this->redirect($this->generateUrl('site_front_contact'));
            }
        }

        return $this->render('SiteFrontBundle:Front:contact.html.twig',
                array(
                    'page'      => $page,
                    'form'      => $form->createView()
                ));
    }
    
    /**
    * List of all categories 
    **/
    public function menuCategorieAction()
    {
        $list = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('SiteFrontBundle:Category')
                     ->findAll();
        
        return $this->render('SiteFrontBundle:Front:list_categories.html.twig', 
                array(
                    'list_categories' => $list
                )
        );
    }
    
    /**
    * Last tutorials 
    **/
    public function lastTutorialAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SiteFrontBundle:Tutorial');
        
        $tutorials = $repository->sixLast();
        
        return $this->render('SiteFrontBundle:Front:last_tutorials.html.twig',
                array(
                    'tutorials'=>$tutorials
                )
        );
    }
    
    /**
    * Searching
    **/
    public function searchAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repocat = $em->getRepository('SiteFrontBundle:Category');
        
        $categories = $repocat->selectAllCat();
        
        return $this->render('SiteFrontBundle:Front:menu.html.twig',
                array(
                    'categories'=>$categories
                ));
    }


}