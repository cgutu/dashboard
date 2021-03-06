<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use UserBundle\Form\UserType;
use UserBundle\Entity\Role;
use UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
        // 1) build the form
        $user = new User();
        $role = new Role();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $role->setName($user->getUsername());
            $role->setRole('USER');
            $user->addRole($role);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('login_route');
        }


return $this->render('UserBundle:Registration:register.html.twig',  array('form' => $form->createView()));
    }

    public function addUser(Request $request, User $user, Role $role){

        $request = Request::create(
            'http://5.196.44.136/wyndTapi/api/user/add/', 
            'POST', 
            array('username' => $user->getUsername(),
                  'password' => $user->getPlainPassword(),
                  'email' => $user->getEmail()
            )
        );

    }
}