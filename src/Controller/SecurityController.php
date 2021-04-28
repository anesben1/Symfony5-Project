<?php

namespace App\Controller;

use App\Entity\User;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(authenticationUtils $authenticationUtils): Response
    {
        
        {
            // if ($this->getUser()) {
            //     return $this->redirectToRoute('target_path');
            // }
    
            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();
            // last username entered by the user
            $lastUsername = $authenticationUtils->getLastUsername();
    
            return $this->render('security/login.html.twig', [
                'last_username' => $lastUsername, 
                'error' => $error]);

            return $this->render('security/login.html.twig', [
                'controller_name' => 'SecurityController',
            ]);
        }
    }

     /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('Will be intercepted before getting here');
    }

     /**
     * @Route("/register", name="app_register")
     */
    public function register(HttpFoundationRequest $request, UserPasswordEncoderInterface $passwordEncode, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $formAuthenticator)
    {
            if($request->isMethod('POST')){
                $user = new User() ; 
                $user->setEmail($request->request->get('email'));
                $user->setFirstname('Mystery');
                $user->setPassword($passwordEncode->encodePassword(
                    $user,
                    $request->request->get('password')
                ));

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

            

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $formAuthenticator,
                'main'

            );

        }

        return $this->render('security/register.html.twig');

    }
       

}