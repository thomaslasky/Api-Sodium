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
        
        $this->saveClientInfo($request->request->all());

        if($this->sendContactMail($request->request->all(), $mailer))
        {
            return $this->json(array('Response' => true));
        }
        else
        {
            return $this->json(array('Response' => false));  
        }
  
    }

    public function sendContactMail($data, $mailer)
    {
        $messageSubject = "[Nouveau contact client] ".$data['objet'];
        $message = (new \Swift_Message($messageSubject))
        ->setFrom($data['email'])
        ->setTo(getenv('MAIL_DEST'))
        ->setBody(
            $this->renderView(
                'emails/contact.html.twig',
                array('mail' => $data['email'],'message' => $data['message'],'objet'=> $data['objet'], 'telephone' => $data['telephone'])
            ),
            'text/html'
        );

        return($mailer->send($message));
    }

    public function saveClientInfo($data)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $client = $entityManager->getRepository(Client::class)->findOneBy(['email' => $data['email']]);
        
        if(!$client)
        {
            $client = new Client();
            $client->setEmail($data['email']);
            if(!empty($data['telephone']))
            {
                $client->setPhone($data['telephone']);
            }
            $entityManager->persist($client);
            $entityManager->flush();
        }
        else
        {
            if(!empty($data['telephone']))
            {  
                $client->setPhone($data['telephone']);
            }
            $entityManager->flush();
        }
    }
}
