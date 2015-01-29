<?php

namespace Site\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Site\FrontBundle\Entity\Tutorial;

/**
 * Tutorial controller.
 *
 */
class TutorialController extends Controller {

    /**
     * Lists all Tutorial entities.
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SiteFrontBundle:Tutorial');

        $tutorials = $repository->findAll();
        
        $format = $this->getRequest()->getRequestFormat();

        return $this->render('SiteFrontBundle:Tutorial:index.'.$format.'.twig', 
                array(
                    'tutorials' => $tutorials,
                    'lastUpdated' => $em->getRepository('SiteFrontBundle:Tutorial')
                                        ->getLatestTutorial()
                                        ->getCreatedAt()
                                        ->format(DATE_ATOM),
                    'feedId' => sha1($this->get('router')->generate('site_front_tutorial',
                            array(
                                '_format' => 'atom',
                                true
                            )))
        ));
    }

    /**
     * Finds and displays a Tutorial entity.
     * @Route("/{slug}")
     * @ParamConverter("tutorial", class="SiteFrontBundle:Tutorial",options={"id"="slug", "repository_name"="find"})
     */
    public function showAction(Tutorial $entity) {
        $em = $this->getDoctrine()->getManager();
        $slug = $entity->getSlug();
        $entity = $em->getRepository('SiteFrontBundle:Tutorial')->find($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tutorial entity.');
        }

        return $this->render('SiteFrontBundle:Tutorial:show.html.twig', array(
                    'entity' => $entity,
        ));
    }

    /**
     * List of tutorial by user
     */
    public function tutorialByUserAction() {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                        ->getToken()
                        ->getUser());
        $user_id = $user->getId();

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SiteFrontBundle:tutorial');

        $tutorials = $repo->findByUser($user_id);

        $deleteForms = array();
        
        foreach($tutorials as $tutorial)
        {
            $deleteForms[$tutorial->getId()] = $this->createDeleteForm($tutorial->getId())->createView();
        }

        return $this->render('SiteFrontBundle:Tutorial:tutorialByUser.html.twig', array(
                    'tutorials' => $tutorials,
                    'deleteForms' => $deleteForms
        ));
    }

    /*
     * List all tutorials for a category
     */

    public function tutorial_categoryAction($id) {
        $em = $this->getDoctrine()->getManager();

        $tutorials = $em->getRepository('SiteFrontBundle:Tutorial')->findAllByCat($id);

        return $this->render('SiteFrontBundle:Tutorial:tutorial_cat.html.twig', 
                array(
                    'tutorials' => $tutorials
        ));
    }

    /*
     * Search Tutorial
     */

    public function searchAction()
    {
        $request = $this->get('request');
        
        if ($request->getMethod() == 'POST')
        {
            $mot_cle = $request->request->get('mot_cle');
            $em = $this->getDoctrine()->getManager();
            $tutorials = $em->getRepository('SiteFrontBundle:Tutorial')->searchTutorial($mot_cle);

            return $this->render('SiteFrontBundle:Tutorial:search.html.twig', 
                    array(
                        'tutorials' => $tutorials,
                        'mot_cle' => $mot_cle));
        }
    }
    
    public function lastTutorialsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SiteFrontBundle:Tutorial');
        
        $tutorials = $repo->fiveLast();
        
        return $this->render('SiteFrontBundle:Tutorial:last_tutorials.html.twig',
                array(
                    'tutorials' => $tutorials
                ));
    }

    public function promoteAction()
    {
        $tutorial = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('SiteFrontBundle:Tutorial')
                         ->findOneBy(array('promote' => 1), array(),1,1);
        
        if (!$tutorial)
        {
            throw $this->createNotFoundException('Unable to find promote tutorial entity.');
        }

        return $this->render('SiteFrontBundle:Tutorial:promote_tutorial.html.twig', 
                array(
                    'tutorial' => $tutorial,
        ));
    }
}
