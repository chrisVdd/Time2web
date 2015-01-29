<?php

namespace Site\FrontBundle\Controller\user;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Site\FrontBundle\Entity\Favorite;
use Site\FrontBundle\Form\FavoriteType;

/**
 * Favorite controller.
 *
 */
class FavoriteController extends Controller
{

    /**
     * Lists all Favorite entities.
     *
     */
    public function indexAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontBundle:Favorite')->findAll();

        return $this->render('SiteFrontBundle:user/Favorite:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    /**
     * Creates a new Favorite entity.
     *
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
        
        $entity = new Favorite();
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

            return $this->redirect($this->generateUrl('site_front_tutorial_show', 
                    array(
                        'slug' => $tutorial_slug
            )));
        }

        return $this->render('SiteFrontBundle:user/Favorite:new.html.twig', 
                array(
                    'entity'        => $entity,
                    'form'          => $form->createView(),
                    'tutorial_id'   => $tutorial_id
        ));
    }

    /**
     * Creates a form to create a Favorite entity.
     *
     * @param Favorite $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Favorite $entity, $tutorial_id)
    {
        $form = $this->createForm(new FavoriteType(), $entity, 
                array(
                    'action' => $this->generateUrl('user_favorite_create', 
                            array(
                                'tutorial_id' => $tutorial_id
                            )),
                    'method' => 'POST',
        ));

        $form->add('submit', 'submit', 
                array(
                    'label' => 'Ajouter aux favoris', 
                    'attr' => array('class' => 'btn btn-warning')));

        return $form;
    }

    /**
     * Displays a form to create a new Favorite entity.
     *
     */
    public function newAction($tutorial_id)
    {
        $favorite = new Favorite();
        $form   = $this->createCreateForm($favorite, $tutorial_id);

        return $this->render('SiteFrontBundle:user/Favorite:new.html.twig', 
                array(
                    'favorite'  => $favorite,
                    'form'      => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Favorite entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Favorite')->findOneBy(
                array(
                    'id' => $id
        ));
        
        var_dump($entity);
        exit();

        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Favorite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontBundle:user/Favorite:show.html.twig', 
                array(
                    'entity'      => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Favorite entity.
     *
     */
    public function editAction($id)
    {
        $securityContext = $this->get('security.context');
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Favorite')->find($id);
        
        if (false === $securityContext->isGranted('EDIT', $entity)){
            throw new AccessDeniedException();
        }

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Favorite entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontBundle:user/Favorite:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Favorite entity.
    *
    * @param Favorite $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Favorite $entity)
    {
        $form = $this->createForm(new FavoriteType(), $entity, 
                array(
                    'action' => $this->generateUrl('user_favorite_update', 
                            array(
                                'id' => $entity->getId()
                )),
                    'method' => 'PUT',
        ));

        $form->add('submit', 'submit', 
                array(
                    'label' => 'Modifier',
                    'attr'  => array('class' => 'btn btn-success')
        ));
        
        $form->add('redirect_url', 'hidden', 
                array(
                    'mapped' => false,
                    'data'=>$this->getRequest()->server->get('HTTP_REFERER')
        ));

        return $form;
    }
    /**
     * Edits an existing Favorite entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Favorite')->find($id);

        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Favorite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid())
        {
            $em->flush();

            return $this->redirect($editForm->get('redirect_url')->getData());
        }

        return $this->render('SiteFrontBundle:user/Favorite:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Deletes a Favorite entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $securityContext = $this->get('security.context');
        
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontBundle:Favorite')->find($id);
            
            if (false === $securityContext->isGranted('DELETE', $entity))
            {
                throw new AccessDeniedException();
            }

            if (!$entity)
            {
                throw $this->createNotFoundException('Unable to find Favorite entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user_favorite_by_user'));
    }

    /**
     * Creates a form to delete a Favorite entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_favorite_delete', 
                    array(
                        'id' => $id
            )))
            ->setMethod('DELETE')
            ->add('submit', 'submit', 
                    array(
                        'label' => 'Supprimer des favoris',
                        'attr'  => array(
                            'class' => 'btn btn-danger'
                        )
            ))
            ->add('redirect_url', 'hidden', 
                    array(
                        'mapped' => false,
                        'data'   => $this->getRequest()->server->get('HTTP_REFERER')   
            ))
            ->getForm()
        ;
    }
    
    /**
     * List of favorite by user and tutorial
     */
    public function favoriteByUserandTutorialAction($tutorial_id)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                            ->getToken()
                            ->getUser());
        $user_id = $user->getId();

        $em = $this->getDoctrine()->getManager();
        $favorite = $em->getRepository('SiteFrontBundle:Favorite')->findByUserAndTutorial($user_id, $tutorial_id);
        
        return $this->render('SiteFrontBundle:user/Favorite:favoriteByUserAndTutorial.html.twig', 
                array(
                    'favorite'      => $favorite,
                    'tutorial_id' => $tutorial_id
        )); 
    }
    
    /**
     * List of favorite by user
     */
    public function favoriteByUserAction()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                            ->getToken()
                            ->getUser());
        $user_id = $user->getId();

        $em = $this->getDoctrine()->getManager();
        $favorites = $em->getRepository('SiteFrontBundle:Favorite')->findByUser($user_id);
        
        $deleteForms = array();
        
        foreach($favorites as $favorite)
        {
            $deleteForms[$favorite->getId()] = $this->createDeleteForm($favorite->getId())->createView();
        }
        
        return $this->render('SiteFrontBundle:user/Favorite:favoriteByUser.html.twig', 
                array(
                    'favorites' => $favorites,
                    'deleteForms' => $deleteForms
                    
        )); 
    }
}
