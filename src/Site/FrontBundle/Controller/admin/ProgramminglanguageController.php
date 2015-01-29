<?php

namespace Site\FrontBundle\Controller\admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Site\FrontBundle\Entity\Programminglanguage;
use Site\FrontBundle\Form\ProgramminglanguageType;

/**
 * Programminglanguage controller.
 *
 */
class ProgramminglanguageController extends Controller
{

    /**
     * Lists all Programminglanguage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontBundle:Programminglanguage')->findAll();
        
        $deleteForms = array();
        
        foreach($entities as $entity)
        {
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }

        return $this->render('SiteFrontBundle:admin/Programminglanguage:index.html.twig', 
                array(
                    'entities' => $entities,
                    'deleteForms' => $deleteForms
        ));
    }
    /**
     * Creates a new Programminglanguage entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Programminglanguage();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_programminglanguage_show', 
                    array(
                        'id' => $entity->getId()
            )));
        }

        return $this->render('SiteFrontBundle:admin/Programminglanguage:new.html.twig', 
                array(
                    'entity' => $entity,
                    'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Programminglanguage entity.
     *
     * @param Programminglanguage $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Programminglanguage $entity)
    {
        $form = $this->createForm(new ProgramminglanguageType(), $entity, 
                array(
                    'action' => $this->generateUrl('admin_programminglanguage_create'),
                    'method' => 'POST',
        ));

        $form->add('submit', 'submit', 
                array(
                    'label' => 'Créer'
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Programminglanguage entity.
     *
     */
    public function newAction()
    {
        $entity = new Programminglanguage();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiteFrontBundle:admin/Programminglanguage:new.html.twig', 
                array(
                    'entity' => $entity,
                    'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Programminglanguage entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Programminglanguage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Programminglanguage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontBundle:admin/Programminglanguage:show.html.twig', 
                array(
                    'entity'      => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Programminglanguage entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Programminglanguage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Programminglanguage entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontBundle:admin/Programminglanguage:edit.html.twig', 
                array(
                    'entity'      => $entity,
                    'edit_form'   => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Programminglanguage entity.
    *
    * @param Programminglanguage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Programminglanguage $entity)
    {
        $form = $this->createForm(new ProgramminglanguageType(), $entity, 
                array(
                    'action' => $this->generateUrl('admin_programminglanguage_update', 
                            array(
                                'id' => $entity->getId()
                )),
                    'method' => 'PUT',
        ));

        $form->add('submit', 'submit', 
                array(
                    'label' => 'Mettre à jour'
        ));

        return $form;
    }
    /**
     * Edits an existing Programminglanguage entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontBundle:Programminglanguage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Programminglanguage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_programminglanguage', 
                    array(
                        'id' => $id
            )));
        }

        return $this->render('SiteFrontBundle:admin/Programminglanguage:edit.html.twig', 
                array(
                    'entity'      => $entity,
                    'edit_form'   => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Programminglanguage entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontBundle:Programminglanguage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Programminglanguage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_programminglanguage'));
    }

    /**
     * Creates a form to delete a Programminglanguage entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_programminglanguage_delete', 
                    array(
                        'id' => $id
                )))
            ->setMethod('DELETE')
            ->add('submit', 'submit', 
                    array(
                        'label' => 'Supprimer',
                        'attr'  => array(
                            'class' => 'btn btn-danger')
            ))
            ->getForm()
        ;
    }
}
