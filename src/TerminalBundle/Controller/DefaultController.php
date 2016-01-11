<?php

namespace TerminalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TerminalBundle:Default:index.html.twig');
    }
}
