<?php

namespace HomepageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function homeAction()
    {
        return $this->render('HomepageBundle:homepage:home.html.twig');
    }
}
