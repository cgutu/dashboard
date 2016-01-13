<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Entity\User;

class ProfilController extends Controller
{
    public function profilAction()
    {
        return $this->render('UserBundle:profil:profil.html.twig');
    }
}
