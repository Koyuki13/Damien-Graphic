<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
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
      $form = $this->createForm(ContactType::class);
      $form->handleRequest($request);
      if ($form->isSubmitted()) {
         $data = $form->getData();
         $email = (new Email())
            ->from('your_email@example.com')
            ->to('your_email@example.com')
            ->subject('Une nouvelle série vient d\'être publiée !')
            ->html($this->renderView("contact/email/notifications.html.twig", [
               'data' => $data
            ]), "utf-8");

         $mailer->send($email);

         return $this->redirectToRoute('home');
      }

      return $this->render("contact/contact.html.twig", [
         'form' => $form->createView(),
      ]);
   }
}
