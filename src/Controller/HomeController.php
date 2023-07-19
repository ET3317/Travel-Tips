<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $this->getLastUsername($request);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'error' => $error,
            'last_username' => $lastUsername,
        ]);
    }
    private function getLastUsername(Request $request): ?string
    {
        if ($request->hasSession() && ($session = $request->getSession())->has('_security.last_username')) {
            return $session->get('_security.last_username');
        }

        return null;
    }
}