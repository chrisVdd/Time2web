<?php

namespace Site\UserBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseController;

class SecurityController extends BaseController
{
    public function loginBisAction()
    {
        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');

        return $this->container->get('templating')->renderResponse('SiteUserBundle:Security:login.html.twig',
                array(
                    'last_username' => null,
                    'error'         => null,
                    'csrf_token'    => $csrfToken
        ));
    }

    
    protected function renderLogin(array $data)
    {
        $requestAttributes = $this->container->get('request')->attributes;
        $params = $this->container->getParameter('site_user');
        $route = $requestAttributes->get('_route');
        
        if(!isset($params['login_routes'][$route])){
            throw new \Exception('La route de connexion '. $route . 'n\'est pas définie.');
        }
                
        $template = $params['login_routes'][$route]['template'];
        $data['login_check_route'] = $params['login_routes'][$route]['login_check_route'];

        return $this->container->get('templating')->renderResponse($template, $data);
    }
}