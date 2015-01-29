<?php

namespace Site\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Site\FrontBundle\Entity\Comment;
use Site\FrontBundle\Form\CommentType;

/**
 * Comment controller.
 *
 */
class CommentController extends Controller {

    /**
     * Lists all Comment entities.
     *
     */
    public function indexAction() {

        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontBundle:Comment')->findAll();
        
        $format = $this->getRequest()->getRequestFormat();

        return $this->render('SiteFrontBundle:Comment:index.'.$format.'.twig', 
                array(
                    'entities' => $entities,
                    'lastUpdated' => $em->getRepository('SiteFrontBundle:Comment')
                                        ->getLatestComment()
                                        ->getCreatedAt()
                                        ->format(DATE_ATOM),
                    'feedId' => sha1($this->get('router')->generate('site_front_comment', 
                            array(
                                '_format' => 'atom',
                                true
                            )))
        ));
    }

    /**
     * Creates a new Comment entity.
     * 
     */
    public function createAction(Request $request, $tutorial_id) {

        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                            ->getToken()
                            ->getUser()
        );

        $em = $this->getDoctrine()->getManager();
        $tutorial = $em->getRepository('SiteFrontBundle:Tutorial')->findById($tutorial_id);

        $entity = new Comment();
        $form = $this->createCreateForm($entity, $tutorial_id);

        $form->handleRequest($request);

        if ($form->isValid()) {
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

        return $this->render('SiteFrontBundle:Comment:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'tutorial_id' => $tutorial_id
        ));
    }

    /**
     * Creates a form to create a Comment entity.
     *
     * @param Comment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Comment $entity, $tutorial_id) {
        $form = $this->createForm(new CommentType(), $entity, 
                array(
                    'action' => $this->generateUrl('site_front_comment_create', 
                            array(
                                'tutorial_id' => $tutorial_id
                            )),
                    'method' => 'POST',
        ));

        $form->add('submit', 'submit', 
                array(
                    'label' => 'Poster le commentaire', 
                    'attr' => array('class' => 'btn btn-success')));

        return $form;
    }

    /**
     * Displays a form to create a new Comment entity.
     *
     */
    public function newAction($tutorial_id)
    {
        $entity = new Comment();
        $form = $this->createCreateForm($entity, $tutorial_id);

        return $this->render('SiteFrontBundle:Comment:new.html.twig', 
                array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Comment entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontBundle:Comment:show.html.twig', 
                array(
                    'entity'      => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Comment entity.
     *
     */
    public function editAction($id)
    {
        $securityContext = $this->get('security.context');
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Comment')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        if (false === $securityContext->isGranted('EDIT', $entity)){
            throw new AccessDeniedException();
        }
        
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontBundle:Comment:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Comment entity.
     *
     * @param Comment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Comment $entity) 
    {
        $form = $this->createForm(new CommentType(), $entity, array(
            'action' => $this->generateUrl('site_front_comment_update', 
                    array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Modifier',
            'attr' => array('class' => 'btn btn-success')));
        
        $form->add('redirect_url', 'hidden', array(
            'mapped' => false,
            'data'=>$this->getRequest()->server->get('HTTP_REFERER')
        ));

        return $form;
    }

    /**
     * Edits an existing Comment entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid())
        {
            $em->flush();

            return $this->redirect($editForm->get('redirect_url')->getData());
        }
        
        return $this->render('SiteFrontBundle:Comment:edit.html.twig', 
                array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView()
                ));
        
    }
    
    /**
     * Lists all Comment by tutorial.
     *
     */
    public function commentByTutorialAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SiteFrontBundle:Comment')->findByTutorial($id);
        
        $deleteForms = array();
        
        foreach($entities as $entity)
        {
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }
 
        return $this->render('SiteFrontBundle:Comment:commentByTutorial.html.twig', 
                array(
                    'entities' => $entities,
                    'deleteForms' => $deleteForms
        ));
    }
    
    /**
     * Deletes a Comment entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $securityContext = $this->get('security.context');
        
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontBundle:Comment')->find($id);
            
            if (false === $securityContext->isGranted('DELETE', $entity))
            {
                throw new AccessDeniedException();
            }

            if (!$entity)
            {
                throw $this->createNotFoundException('Unable to find Comment entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            return $this->redirect($form->get('redirect_url')->getData());
        }
        
        return $this->redirect($this->generateUrl('site_front_comment_tutorial', 
                array(
                    'id' => $id
                )));
    }
 
    /**
     * Creates a form to delete a Comment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('site_front_comment_delete', 
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
     * Abuses
     */
    public function abuseAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SiteFrontBundle:Comment')->find($id);

        $status = $entity->getStatus();

        if ($status == 1) {
            $entity->setStatus(0);
        } else {
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

    public function liste_abuseAction() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SiteFrontBundle:Comment');

        $comments = $repository->findByAbuse();

        return $this->render('SiteFrontBundle:Comment:abuse.html.twig', 
                array(
                    'comments' => $comments
        ));
    }
    
    public function lastCommentsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SiteFrontBundle:Comment');
        
        $comments = $repo->fiveLast();
        
        return $this->render('SiteFrontBundle:Comment:last_comments.html.twig',
                array(
                    'comments' => $comments
                ));
    }

}
