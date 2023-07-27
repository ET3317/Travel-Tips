<?php

namespace App\Controller;

use App\Entity\Tips;
use App\Form\TipsType;
use App\Repository\TipsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(AuthenticationUtils $authenticationUtils, Request $request, TipsRepository $tipsRepository): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $this->getLastUsername($request);
        $tips = $tipsRepository->findAll();
        $tip = new Tips();
        $form = $this->createForm(TipsType::class, $tip);

        return $this->render('home/index.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,
            'tips' => $tips,
            'form' => $form->createView(),
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