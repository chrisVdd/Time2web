<?php

namespace Site\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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

        return $this->render('SiteFrontBundle:Abuse:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Abuse entity.
     *
     * @Route("/", name="site_front_abuse_create")
     * @Method("POST")
     * @Template("SiteFrontBundle:Abuse:new.html.twig")
     */
    public function createAction(Request $request, $comment_id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $comment = $em->getRepository('SiteFrontBundle:Comment')->findById($comment_id);
        
        $entity = new Abuse();
        $form = $this->createCreateForm($entity, $comment_id);
        
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            
            $entity->setComment($comment);
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($form->get('redirect_url')->getData());
        }

        return $this->render('SiteFrontBundle:Abuse:new.html.twig', 
                array(
                    'entity' => $entity,
                    'form'   => $form->createView(),
                    'comment_id' => $comment_id
        ));
    }

    /**
     * Creates a form to create a Abuse entity.
     *
     * @param Abuse $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Abuse $entity, $comment_id)
    {
        $form = $this->createForm(new AbuseType(), $entity, 
                array(
                    'action' => $this->generateUrl('site_front_abuse_create', 
                            array(
                                'comment_id' => $comment_id
                            )),
                    'method' => 'POST',
        ));

        $form->add('submit', 'submit', 
                array(
                    'label' => 'Signaler comme abusif',
                    'attr'  => array('class' => 'btn btn-success')));
        
        $form->add('redirect_url', 'hidden', array(
            'mapped' => false,
            'data'=>$this->getRequest()->server->get('HTTP_REFERER')
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Abuse entity.
     * 
     * @Route("/new", name="site_front_abuse_new")
     * @Method("GET")
     * @Template()
     *
     */
    public function newAction($comment_id)
    {
        $entity = new Abuse();
        $form   = $this->createCreateForm($entity, $comment_id);

        return $this->render('SiteFrontBundle:Abuse:new.html.twig', array(
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

        return $this->render('SiteFrontBundle:Abuse:show.html.twig', array(
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

        return $this->render('SiteFrontBundle:Abuse:edit.html.twig', array(
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
            'action' => $this->generateUrl('site_front_abuse_update', array('id' => $entity->getId())),
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

            return $this->redirect($this->generateUrl('site_front_abuse_edit', array('id' => $id)));
        }

        return $this->render('SiteFrontBundle:Abuse:edit.html.twig', array(
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

        return $this->redirect($this->generateUrl('site_front_abuse'));
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
            ->setAction($this->generateUrl('site_front_abuse_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
