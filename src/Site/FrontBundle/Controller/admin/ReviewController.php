<?php

namespace Site\FrontBundle\Controller\admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Site\FrontBundle\Entity\Review;
use Site\FrontBundle\Form\Admin\ReviewType;

/**
 * Review controller.
 *
 */
class ReviewController extends Controller
{

    /**
     * Lists all Review entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontBundle:Review')->findAll();
        
        $deleteForms = array();
        
        foreach($entities as $entity)
        {
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }

        return $this->render('SiteFrontBundle:admin/Review:index.html.twig', array(
            'entities' => $entities,
            'deleteForms' => $deleteForms
        ));
    }
    /**
     * Creates a new Review entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Review();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_review_show', 
                    array(
                        'id' => $entity->getId()
                    )));
        }

        return $this->render('SiteFrontBundle:admin/Review:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Review entity.
     *
     * @param Review $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Review $entity)
    {
        $form = $this->createForm(new ReviewType(), $entity, array(
            'action' => $this->generateUrl('admin_review_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new Review entity.
     *
     */
    public function newAction()
    {
        $entity = new Review();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiteFrontBundle:admin/Review:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Review entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Review')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Review entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontBundle:admin/Review:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Review entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Review')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Review entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontBundle:admin/Review:edit.html.twig', 
                array(
                    'entity'      => $entity,
                    'edit_form'   => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
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
                    'action' => $this->generateUrl('admin_review_update', 
                            array(
                                'id' => $entity->getId()
                            )),
                    'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mettre à jour'));

        return $form;
    }
    /**
     * Edits an existing Review entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Review')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Review entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_review', 
                    array(
                        'id' => $id
                    )));
        }

        return $this->render('SiteFrontBundle:Review:edit.html.twig', 
                array(
                    'entity'      => $entity,
                    'edit_form'   => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }
    /**
     * Deletes a Review entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontBundle:Review')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Review entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_review'));
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
            ->setAction($this->generateUrl('admin_review_delete', 
                    array(
                        'id' => $id
                )))
            ->setMethod('DELETE')
            ->add('submit', 'submit', 
                array(
                    'label' => 'Supprimer',
                    'attr' => array(
                        'class' => 'btn btn-danger')))
            ->getForm()
        ;
    }
    
}