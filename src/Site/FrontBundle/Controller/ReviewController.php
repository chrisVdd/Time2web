<?php

namespace Site\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Site\FrontBundle\Entity\Review;
use Site\FrontBundle\Form\ReviewType;

/**
 * Review controller.
 * @Route("/review")
 *
 */
class ReviewController extends Controller
{

    /**
     * Lists all Review entities.
     *
     * @Route("/", name="site_front_review")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        
        if (false === $this->get('security.context')->isGranted('ROLE_USER'))
        {
            throw new AccessDeniedException();
        }
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontBundle:Review')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Creates a new Review entity.
     *
     * @Route("/", name="site_front_review_create")
     * @Method("POST")
     * @Template("SiteFrontBundle:Review:new.html.twig")
     */
    public function createAction(Request $request, $tutorial_id)
    {
        
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                            ->getToken()
                            ->getUser()
                );
        
        $em = $this->getDoctrine()->getManager();
        $tutorial = $em->getRepository('SiteFrontBundle:Tutorial')->findById($tutorial_id);
        
        $entity = new Review();
        $form = $this->createCreateForm($entity, $tutorial_id);
        
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            
            $tutorial_slug = $tutorial->getSlug();
            $entity->setTutorial($tutorial);
            $entity->setUser($user);
            
            $em->persist($entity);
            $em->flush();
            
            $aclProvider = $this->get('security.acl.provider');
            $objectIdentity = ObjectIdentity::fromDomainObject($entity);
            $acl = $aclProvider->createAcl($objectIdentity);

            $securityContext = $this->get('security.context');
            $user = $securityContext->getToken()->getUser();
            $securityIdentity = UserSecurityIdentity::fromAccount($user);

            $acl->insertObjectAce($securityIdentity, MaskBuilder::MASK_OWNER);
            $aclProvider->updateAcl($acl);

            return $this->redirect($this->generateUrl('site_front_tutorial_show', array('slug' => $tutorial_slug)));
        }

        return $this->render('SiteFrontBundle:Review:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'tutorial_id' => $tutorial_id
        ));
    }

    /**
    * Creates a form to create a Review entity.
    *
    * @param Review $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Review $entity, $tutorial_id)
    {
        $form = $this->createForm(new ReviewType(), $entity, array(
            'action' => $this->generateUrl('site_front_review_create',
                    array(
                        'tutorial_id' => $tutorial_id
                    )),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', 
                array(
                    'label' => 'Noter le tutoriel',
                    'attr' => array(
                        'class' => 'btn btn-success'
                )));

        return $form;
    }

    /**
     * Displays a form to create a new Review entity.
     *
     * @Route("/new", name="site_front_review_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($tutorial_id)
    {
        $entity = new Review();
        $form   = $this->createCreateForm($entity, $tutorial_id);

        return $this->render('SiteFrontBundle:Review:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Review entity.
     *
     * @Route("/{id}", name="site_front_review_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Review')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Review entity.');
        }
        
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Review entity.
     *
     * @Route("/{id}/edit", name="site_front_review_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Review')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Review entity.');
        }

        $editForm = $this->createEditForm($entity);


        return $this->render('SiteFrontBundle:Review:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        ));
    }

    /**
    * Creates a form to edit a Review entity.
    *
    * @param Review $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Review $entity)
    {
        $form = $this->createForm(new ReviewType(), $entity, 
                array(
                    'action' => $this->generateUrl('site_front_review_update', 
                            array('id' => $entity->getId())),
                    'method' => 'PUT',
                ));
        
        $form->add('submit', 'submit', array(
            'label' => 'Modifier',
            'attr' => array('class' => 'btn btn-success')));

        $form->add('redirect_url', 'hidden', array(
            'mapped' => false,
            'data'=> $this->getRequest()->server->get('HTTP_REFERER')
        ));

        return $form;
    }
    
    /**
     * Edits an existing Review entity.
     *
     * @Route("/{id}", name="site_front_review_update")
     * @Method("PUT")
     * @Template("SiteFrontBundle:Review:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Review')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Review entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($editForm->get('redirect_url')->getData());
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    
    /**
     * Deletes a Review entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontBundle:Review')->find($id);

            if (!$entity)
            {
                throw $this->createNotFoundException('Unable to find Review entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            return $this->redirect($form->get('redirect_url')->getData());
        }
        
        return $this->redirect($this->generateUrl('site_front_review_tutorial', 
                array(
                    'id' => $id
                )));
    }
    
    /**
     * Creates a form to delete a Review entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('site_front_review_delete', 
                        array(
                            'id' => $id
                        )))
                    ->setMethod('DELETE')
                    ->add('submit', 'submit', 
                            array(
                                'label' => 'Supprimer',
                                'attr' => array(
                                    'class' => 'btn btn-danger btn-xs'
                        )))
                    ->add('redirect_url', 'hidden', 
                            array(
                                'mapped' => false,
                                'data'      => $this->getRequest()->server->get('HTTP_REFERER')
                        ))
                    ->getForm()
        ;
    }
    
    /**
    * List all Reviews for a tutorial
    */
    public function reviewByTutorialAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SiteFrontBundle:Review')->findByTutorial($id);
        
        $deleteForms = array();
        
        foreach($entities as $entity)
        {
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }
        
        return $this->render('SiteFrontBundle:Review:reviewByTutorial.html.twig',
                array(
                    'entities' => $entities,
                    'deleteForms' => $deleteForms
                ));  
    }
    
    /**
    * Abuses
    */
    public function abuseAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SiteFrontBundle:review')->find($id);
        
        $status = $entity->getStatus();
        
        if($status == 1)
        {
            $entity->setStatus(0);
        }
        else
        {
            $entity->setStatus(1);
        }
        
        $em->persist($entity);
        $em->flush();
        
        $referer = $this->getRequest()->headers->get('referer');
        
        return $this->redirect($referer);
    }
    
    /* 
    * Affiche les notations déclarer comme abusifs dans une liste de l'admin
    */
    public function liste_abuseAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SiteFrontBundle:Review');
        
        $reviews = $repository->findByAbuse();
        
        return $this->render('SiteFrontBundle:Review:abuse.html.twig',
                array(
                    'reviews'=>$reviews
                ));
    }
}