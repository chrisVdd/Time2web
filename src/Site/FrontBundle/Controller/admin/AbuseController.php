<?php

namespace Site\FrontBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Site\FrontBundle\Entity\Abuse;
use Site\FrontBundle\Form\AbuseType;


/**
 * Abuse controller.
 *
 */
class AbuseController extends Controller
{

    /**
     * Lists all Abuse entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontBundle:Abuse')->findAll();
        
        $deleteForms = array();
        
        foreach($entities as $entity)
        {
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }

        return $this->render('SiteFrontBundle:Admin/Abuse:index.html.twig', 
                array(
                    'entities' => $entities,
                    'deleteForms' => $deleteForms
        ));
    }
    
    /**
     * Creates a new Abuse entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Abuse();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_abuse_show', array('id' => $entity->getId())));
        }

        return $this->render('SiteFrontBundle:Admin/Abuse:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Abuse entity.
     *
     * @param Abuse $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Abuse $entity)
    {
        $form = $this->createForm(new AbuseType(), $entity, array(
            'action' => $this->generateUrl('admin_abuse_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Abuse entity.
     *
     */
    public function newAction()
    {
        $entity = new Abuse();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiteFrontBundle:Admin/Abuse:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Abuse entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Abuse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Abuse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontBundle:Admin/Abuse:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Abuse entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Abuse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Abuse entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontBundle:Admin/Abuse:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Abuse entity.
    *
    * @param Abuse $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Abuse $entity)
    {
        $form = $this->createForm(new AbuseType(), $entity, array(
            'action' => $this->generateUrl('admin_abuse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Abuse entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Abuse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Abuse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_abuse_edit', array('id' => $id)));
        }

        return $this->render('SiteFrontBundle:Admin/Abuse:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Abuse entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontBundle:Abuse')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Abuse entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_abuse'));
    }

    /**
     * Creates a form to delete a Abuse entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_abuse_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
