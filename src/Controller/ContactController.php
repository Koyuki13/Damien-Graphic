<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{

   /**
    * @Route("/contact", name="contact")
    * @param Request         $request
    * @param MailerInterface $mailer
    * @return RedirectResponse|Response
    * @throws TransportExceptionInterface
    */
   public function contact(Request $request, MailerInterface $mailer)
   {
      $contact = new Contact();
      $form = $this->createForm(ContactType::class, $contact);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
         $data = $form->getData();
         $email = (new Email())
            ->from('noreply@damiengraphic.com')
            ->to('louvrierdam@gmail.com')
            ->subject('Nouvelle demande de contact !')
            ->html($this->renderView("contact/email/notifications.html.twig", [
               'data' => $data
            ]), "utf-8");

         $mailer->send($email);
         $this->addFlash('success', 'Votre email a bien été envoyé');
         return $this->redirectToRoute('home');
      }

      return $this->render("contact/contact.html.twig", [
         'form' => $form->createView(),
      ]);
   }
}
