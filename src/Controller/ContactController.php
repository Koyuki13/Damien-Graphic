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

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $email = (new TemplatedEmail())
                ->from('your_email@example.com')
                ->to('your_email@example.com')
                ->subject('Un nouveau message vient d\'arriver!')

                // path of the Twig template to render
                ->htmlTemplate('contact/email/notifications.html.twig')

                // pass variables (name => value) to the template
                ->context([
                    'data' => $data,
                ])
            ;
            $mailer->send($email);
            $entityManager = $this->getDoctrine()->getManager();


            return $this->redirectToRoute('home');
        }

        return $this->render("contact/contact.html.twig", [
            'form' => $form->createView(),
        ]);
    }
//$defaultData = ['message' => 'Type your message here'];
//$form = $this->createFormBuilder($defaultData)
//->add('name', TextType::class)
//->add('email', EmailType::class)
//->add('message', TextareaType::class)
//->add('send', SubmitType::class)
//->getForm();
//
//$form->handleRequest($request);
//
//if ($form->isSubmitted() && $form->isValid()) {
//// data is an array with "name", "email", and "message" keys
//$data = $form->getData();
//}
//
//// ... render the form
//}
}
