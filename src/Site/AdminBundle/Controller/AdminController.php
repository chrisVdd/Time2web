<?php

namespace Site\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('SiteAdminBundle:Admin:index.html.twig');
    }
    
    public function loginAction() {
        return $this->render('SiteAdminBundle:Admin:login.html.twig');
    }
}
