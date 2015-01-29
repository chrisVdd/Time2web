<?php

namespace Site\FrontBundle\Controller\user;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Site\FrontBundle\Entity\Tutorial;
use Site\FrontBundle\Form\TutorialType;

/**
 * Tutorial controller.
 *
 */
class TutorialController extends Controller
{

    /**
     * Lists all Tutorial entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontBundle:Tutorial')->findAll();

        return $this->render('SiteFrontBundle:Tutorial:index.html.twig', 
                array(
                    'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Tutorial entity.
     *
     */
    public function showAction(Tutorial $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $slug = $entity->getSlug();
        $entity = $em->getRepository('SiteFrontBundle:Tutorial')->find($slug);

        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Tutorial entity.');
        }

        $deleteForm = $this->createDeleteForm($slug);

        return $this->render('SiteFrontBundle:Tutorial:show.html.twig', 
                array(
                    'entity'      => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * List of tutorial by User
     */
    public function tutorialByUserAction()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());
        $user_id = $user->getId();
        
        $em = $this->getDoctrine()->getManager();
        $reposerv = $em->getRepository('SiteFrontBundle:Tutorial');
        
        $tutorials = $reposerv->findByUser($user_id);

        $deleteForms = array();
        
        foreach($tutorials as $tutorial)
        {
            $deleteForms[$tutorial->getSlug()] = $this->createDeleteForm($tutorial->getSlug())->createView();
        }

        
        return $this->render('SiteFrontBundle:user/Tutorial:tutorialByUser.html.twig',
                array(
                    'tutorials' => $tutorials,
                    'deleteForms' => $deleteForms
                ));  
    }
    
    /**
     * Creates a new Tutorial entity.
     *
     */
    public function createAction(Request $request)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername(
                    $this->container->get('security.context')
                         ->getToken()
                         ->getUser()
                );

        $entity = new Tutorial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $entity->setUser($user);
            
            $em->persist($entity);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('success', 'Votre tutoriel a bien été ajouté.');
            
            $aclProvider = $this->get('security.acl.provider');
            $objectIdentity = ObjectIdentity::fromDomainObject($entity);
            $acl = $aclProvider->createAcl($objectIdentity);

            $securityContext = $this->get('security.context');
            $user = $securityContext->getToken()->getUser();
            $securityIdentity = UserSecurityIdentity::fromAccount($user);

            $acl->insertObjectAce($securityIdentity, MaskBuilder::MASK_OWNER);
            $aclProvider->updateAcl($acl);

            return $this->redirect($this->generateUrl('site_front_tutorial_show', 
                    array(
                        'slug' => $entity->getSlug()
                    )
            ));
        }

        return $this->render('SiteFrontBundle:user/Tutorial:new.html.twig', 
			array(
				'entity' => $entity,
				'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Tutorial entity.
     *
     * @param Tutorial $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tutorial $entity)
    {
        $form = $this->createForm(new TutorialType(), $entity, array(
            'action' => $this->generateUrl('user_tutorial_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', 
            array(
                'label' => 'Créer le tutoriel',
                'attr'  => array(
                    'class' => 'btn btn-success btn-responsive')
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Tutorial entity.
     *
     */
    public function newAction()
    {
        $entity = new Tutorial();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiteFrontBundle:user/Tutorial:new.html.twig', 
                array(
                    'entity' => $entity,
                    'form'   => $form->createView(),
                ));
    }

    /**
     * Displays a form to edit an existing Tutorial entity.
     *
     */
    public function editAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Tutorial')->findOneBy(array('slug' => $slug));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tutorial entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($slug);

        return $this->render('SiteFrontBundle:user/Tutorial:edit.html.twig', 
                array(
                    'entity'      => $entity,
                    'edit_form'   => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
    * Creates a form to edit a Tutorial entity.
    *
    * @param Tutorial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tutorial $entity)
    {
        $form = $this->createForm(new TutorialType(), $entity, 
                array(
                    'action' => $this->generateUrl('user_tutorial_update', 
                            array(
                                'slug' => $entity->getSlug()
                            )),
                    'method' => 'PUT',
        ));

        $form->add('submit', 'submit', 
                array(
                    'label' => 'Mettre à jour',
                    'attr' => array(
                        'class' => 'btn btn-success btn reponsive'
                    )
        ));

        return $form;
    }
    
    /**
     * Edits an existing Tutorial entity.
     *
     */
    public function updateAction(Request $request, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Tutorial')->find($slug);

        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Tutorial entity.');
        }

        $deleteForm = $this->createDeleteForm($slug);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid())
        {
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', 'Votre tutoriel a été modifié.');
            
            return $this->redirect($this->generateUrl('user_tutorial_by_user'));
        }
        
        return $this->render('SiteFrontBundle:user/Tutorial:edit.html.twig', 
                array(
                    'entity'      => $entity,
                    'edit_form'   => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Deletes a Tutorial entity.
     *
     */
    public function deleteAction(Request $request, $slug)
    {
        $securityContext = $this->get('security.context');
        
        $form = $this->createDeleteForm($slug);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontBundle:Tutorial')->find($slug);
            
            if (false === $securityContext->isGranted('DELETE', $entity))
            {
                throw new AccessDeniedException();
            }
            
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tutorial entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user_tutorial_by_user'));
    }

    /**
     * Creates a form to delete a Tutorial entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($slug)
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('user_tutorial_delete', 
                            array('slug' => $slug)))
                    ->setMethod('DELETE')
                    ->add('submit', 'submit', 
                            array(
                                'label' => 'Supprimer',
                                'attr' => array(
                                    'class' => 'btn btn-danger btn-responsive btn-block'
                    )))
                    ->getForm()
        ;
    }
}
