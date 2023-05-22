<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Security\Csrf\CsrfToken;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login", methods={"GET","POST"})
     */
    public function login(AuthenticationUtils $authenticationUtils, Request $request, UserPasswordEncoderInterface $passwordEncoder, CsrfTokenManagerInterface $csrfTokenManager): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
    
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
    
        // generate a CSRF token
        $csrfToken = $csrfTokenManager->getToken('authenticate')->getValue();
    
        // create the login form
        $form = $this->createFormBuilder()
            ->add('_username', TextType::class, [
                'label' => 'Nom d\'utilisateur',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez votre nom d\'utilisateur',
                    'required' => 'required',
                    'autofocus' => 'autofocus',
                ],
            ])
            ->add('_password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez votre mot de passe',
                    'required' => 'required',
                ],
            ])
            ->add('_csrf_token', HiddenType::class, [
                'mapped' => false,
                'data' => $csrfToken,
            ])
            ->getForm();
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Validate CSRF token
            $submittedToken = $form->get('_csrf_token')->getData();
            if ($csrfTokenManager->isTokenValid(new CsrfToken('authenticate', $submittedToken))) {
                // Process the login
                $username = $form->get('_username')->getData();
                $password = $form->get('_password')->getData();
    
                // Your authentication logic here
            } else {
                // Invalid CSRF token
                throw new \Exception('Invalid CSRF token.');
            }
        }
    
        return $this->render('login.html.twig', [
            'form' => $form->createView(),
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
    

    /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout()
    {
        // This method can be empty - it will be intercepted by the logout key on your firewall
    }

    /**
     * @Route("/session-test", name="session_test")
     */
    public function sessionTest(Request $request): Response
    {
        $session = $request->getSession();

        // Check if our test key exists in the session
        if ($session->has('test_key')) {
            // If it does, get the value
            $value = $session->get('test_key');
        } else {
            // If not, set the value
            $value = 'Test value';
            $session->set('test_key', $value);
        }

        // Return the value in the response
        return new Response($value);
    }
}
