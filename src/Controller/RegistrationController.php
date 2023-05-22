<?php

namespace App\Controller;

use App\Entity\User;
use App\Validator\Constraints\StrongPassword;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegistrationController extends AbstractController
{
    private $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, AuthenticationUtils $authenticationUtils): Response
    {
        // create a new user object
        $user = new User();

        // handle the form submission
        $form = $this->createFormBuilder($user)
            ->add('username')
            ->add('email')
            ->add('password', null, [
                'constraints' => new StrongPassword(),
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            // save the user to the database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // redirect to the login page
            return $this->redirectToRoute('app_login');
        } else {
            // validate the user manually
            $errors = $this->validator->validate($user, null, ['registration']);
            if (count($errors) > 0) {
                $errorMessages = [];
                foreach ($errors as $error) {
                    $errorMessages[] = $error->getMessage();
                }
                $form->addError(new FormError(implode(', ', $errorMessages)));
            }

            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();

            // render the registration form
            return $this->render('register.html.twig', [
                'form' => $form->createView(),
                'error' => $error,
                'errors' => $form->getErrors(true, true),
            ]);
        }
    }
}
