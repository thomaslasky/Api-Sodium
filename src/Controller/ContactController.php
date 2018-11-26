<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact", methods={"POST"})
     */
    public function receiveContact(Request $request, \Swift_Mailer $mailer)
    {
        /* enregistrement du client dans la bdd*/
        $entityManager = $this->getDoctrine()->getManager();
        $client = $entityManager->getRepository(Client::class)->findOneBy(['email' => $request->get('mail')]);
        
        if(!$client)//nouveau client
        {
            $client = new Client();
            $client->setEmail($request->get('mail'));
            if(!empty($request->get('telephone')))
            {
                $client->setPhone($request->get('telephone'));
            }
            $entityManager->persist($client);
            $entityManager->flush();
        }
        else//client existant
        {
            if(!empty($request->get('telephone')))
            {  
                $client->setPhone($request->get('telephone'));
            }
            $entityManager->flush();
        }
        
        /*envoi mail*/

        $this->sendContactMail($request->request->all(), $mailer);

        return $this->json(array('name' => $request->get('name')));
        
    }

    public function sendContactMail($data, $mailer)
    {
        $message = (new \Swift_Message('New contact'))
        ->setFrom('send@example.com')
        ->setTo('hugo.mtn7@gmail.com')
        ->setBody(
            $this->renderView(
                'emails/contact.html.twig',
                array('mail' => $data['mail'],'message' => $data['message'],'objet'=> $data['objet'])
            ),
            'text/html'
        );

        $mailer->send($message);
    }
}
