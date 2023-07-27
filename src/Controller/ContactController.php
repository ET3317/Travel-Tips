<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
  /*  #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $email = (new Email())
                ->from($formData['email'])
                ->to('you@example.com') // Remplacez par votre adresse e-mail de réception
                ->subject('Nouveau message depuis le site')
                ->text($formData['message']);
            $mailer->send($email);

            $this->addFlash('success', 'Votre message a été envoyé avec succès !');

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }*/
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
      /*      $name = $data['name'];*/
            $address = $data['email'];
            $message = $data['message'];

            $email = (new Email())
                ->from($address)
                ->to('admin@admin.com')
                ->subject($objet)
                ->text($message);

            $mailer->send($email);
        }
        return $this->render('contact/index.html.twig', [
            'formContact' => $form,
        ]);
    }
}
