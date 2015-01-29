<?php

namespace Site\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Site\UserBundle\Entity\Reader;
use Site\UserBundle\Form\ReaderType;

/**
 * Reader controller.
 *
 */
class ReaderController extends Controller
{

    /**
     * Lists all Reader entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteUserBundle:Reader')->findAll();

        return $this->render('SiteUserBundle:Reader:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Reader entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Reader();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('site_reader_show', array('id' => $entity->getId())));
        }

        return $this->render('SiteUserBundle:Reader:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Reader entity.
     *
     * @param Reader $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Reader $entity)
    {
        $form = $this->createForm(new ReaderType(), $entity, array(
            'action' => $this->generateUrl('site_reader_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Reader entity.
     *
     */
    public function newAction()
    {
        $entity = new Reader();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiteUserBundle:Reader:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Reader entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteUserBundle:Reader')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reader entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteUserBundle:Reader:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Reader entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteUserBundle:Reader')->find($id);

        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Reader entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteUserBundle:Reader:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Reader entity.
    *
    * @param Reader $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Reader $entity)
    {
        $form = $this->createForm(new ReaderType(), $entity, array(
            'action' => $this->generateUrl('site_reader_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Reader entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteUserBundle:Reader')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reader entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('site_reader_edit', array('id' => $id)));
        }

        return $this->render('SiteUserBundle:Reader:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Reader entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteUserBundle:Reader')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Reader entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('site_reader'));
    }

    /**
     * Creates a form to delete a Reader entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('site_reader_delete', array('id' => $id)))
                    ->setMethod('DELETE')
                    ->add('submit', 'submit', array('label' => 'Delete'))
                    ->getForm()
        ;
    }
}
