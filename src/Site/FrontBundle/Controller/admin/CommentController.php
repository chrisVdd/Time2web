<?php
 
namespace Site\FrontBundle\Controller\admin;
 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
 
use Site\FrontBundle\Entity\Comment;
use Site\FrontBundle\Form\admin\CommentType;
 
/**
 * Comment controller.
 * 
 * @Route("/admin/comment")
 *
 */
class CommentController extends Controller
{
 
    /**
     * Lists all Comment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
 
        $entities = $em->getRepository('SiteFrontBundle:Comment')->findAll();
        
        $deleteForms = array();
        
        foreach($entities as $entity)
        {
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }
 
        return $this->render('SiteFrontBundle:admin/Comment:index.html.twig', 
                array(
                    'entities' => $entities,
                    'deleteForms' => $deleteForms
        ));
    }
    
    /**
     * Creates a new Comment entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Comment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
 
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
 
            return $this->redirect($this->generateUrl('admin_comment_show', 
                    array(
                        'id' => $entity->getId()
                    )));
        }
 
        return $this->render('SiteFrontBundle:admin/Comment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
 
    /**
     * Creates a form to create a Comment entity.
     *
     * @param Comment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Comment $entity)
    {
        $form = $this->createForm(new CommentType(), $entity, array(
            'action' => $this->generateUrl('admin_comment_create'),
            'method' => 'POST',
        ));
 
        $form->add('submit', 'submit', array('label' => 'Créer'));
 
        return $form;
    }
 
    /**
     * Displays a form to create a new Comment entity.
     *
     */
    public function newAction()
    {
        $entity = new Comment();
        $form   = $this->createCreateForm($entity);
 
        return $this->render('SiteFrontBundle:admin/Comment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
 
    /**
     * Finds and displays a Comment entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
 
        $entity = $em->getRepository('SiteFrontBundle:Comment')->find($id);
 
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }
 
        $deleteForm = $this->createDeleteForm($id);
 
        return $this->render('SiteFrontBundle:admin/Comment:show.html.twig', 
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
        $em = $this->getDoctrine()->getManager();
 
        $entity = $em->getRepository('SiteFrontBundle:Comment')->find($id);
 
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }
 
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
 
        return $this->render('SiteFrontBundle:admin/Comment:edit.html.twig', 
                array(
                    'entity'      => $entity,
                    'edit_form'   => $editForm->createView(),
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
        $form = $this->createForm(new CommentType(), $entity, 
                array(
                    'action' => $this->generateUrl('admin_comment_update', 
                            array(
                                'id' => $entity->getId()
                            )),
                    'method' => 'PUT',
        ));
 
        $form->add('submit', 'submit', 
                array(
                    'label' => 'Mettre à jour',
                    'attr' => 
                        array(
                            'class' => 'btn btn-success'
                        )
                    ));
        
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
    public function updateAction(Request $request, $id)
    {
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
 
            return $this->redirect($this->generateUrl('admin_comment_edit', 
                    array(
                        'id' => $id
                    )));
        }
 
        return $this->render('SiteFrontBundle:admin/Comment:edit.html.twig', 
                array(
                    'entity'      => $entity,
                    'edit_form'   => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }
     
    /**
     * Deletes a Comment entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontBundle:Comment')->find($id);

            if (!$entity)
            {
                throw $this->createNotFoundException('Unable to find Comment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }
        
        return $this->redirect($this->generateUrl('admin_comment'));
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
                    ->setAction($this->generateUrl('admin_comment_delete', 
                    array(
                        'id' => $id
                )))
            ->setMethod('DELETE')
            ->add('submit', 'submit', 
                array(
                    'label' => 'Delete',
                    'attr' => array(
                                'class' => 'btn btn-danger'
                    )))
            ->getForm()
        ;
    }
    
}