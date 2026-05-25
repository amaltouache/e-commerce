<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class AuthController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
    $error = $authenticationUtils->getLastAuthenticationError();
    $lastEmail = $authenticationUtils->getLastUsername();

    return $this->render('auth/login.html.twig', [
        'last_email' => $lastEmail,
        'error' => $error,
    ]);
    }

    #[Route('/register', name: 'register')]
    public function register(Request $request, RegistrationService $registrationService): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $registrationService->register($user, $form->get('plainPassword')->getData());
            return $this->redirectToRoute('login');
        }

        return $this->render('auth/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }

    #[Route('/logout', name: 'logout')]
    public function logout(): void
    {
    throw new \LogicException('This should never be reached.');
    }
}
