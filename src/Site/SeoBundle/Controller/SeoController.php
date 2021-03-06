<?php

namespace Site\SeoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Site\SeoBundle\Entity\Seo;
use Site\SeoBundle\Form\SeoType;

/**
 * Seo controller.
 *
 */
class SeoController extends Controller
{

    /**
     * Lists all Seo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteSeoBundle:Seo')->findAll();

        return $this->render('SiteSeoBundle:Seo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Seo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Seo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('seo_show', array('id' => $entity->getId())));
        }

        return $this->render('SiteSeoBundle:Seo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Seo entity.
     *
     * @param Seo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Seo $entity)
    {
        $form = $this->createForm(new SeoType(), $entity, array(
            'action' => $this->generateUrl('seo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Seo entity.
     *
     */
    public function newAction()
    {
        $entity = new Seo();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiteSeoBundle:Seo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Seo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteSeoBundle:Seo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteSeoBundle:Seo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Seo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteSeoBundle:Seo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteSeoBundle:Seo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Seo entity.
    *
    * @param Seo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Seo $entity)
    {
        $form = $this->createForm(new SeoType(), $entity, array(
            'action' => $this->generateUrl('seo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Seo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteSeoBundle:Seo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('seo_edit', array('id' => $id)));
        }

        return $this->render('SiteSeoBundle:Seo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Seo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteSeoBundle:Seo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Seo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('seo'));
    }

    /**
     * Creates a form to delete a Seo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    
    public function seoAction()
    {
        $em = $this->getDoctrine()->getManager();

        $seo = $em->getRepository('SiteSeoBundle:Seo')->findAll();

        return $this->render('SiteSeoBundle:Seo:show.html.twig', 
                array('seo' => $seo));
    }
}
