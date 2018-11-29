<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PreorderController extends AbstractController
{
    /**
     * @Route("/preorder", name="preorder", methods={"POST"})
     */
    public function receivePreorder(Request $request, \Swift_Mailer $mailer)
    {
        $this->saveClientExtendedInfo($request->request->all());

        if($this->sendPreorderMail($request->request->all(), $mailer))
        {
            return $this->json(array('Response' => true));
        }
        else
        {
            return $this->json(array('Response' => false));  
        }

    }

    public function saveClientExtendedInfo($data)
    {
        $createClient=false;
        $entityManager = $this->getDoctrine()->getManager();
        $client = $entityManager->getRepository(Client::class)->findOneBy(['email' => $data['email']]);
        
        if(!$client)
        {
            $createClient=true;
            $client = new Client();
            $client->setEmail($data['email']);
        }
            
        if(!empty($data['telephone']))
        {
            $client->setPhone($data['telephone']);
        }
        if(!empty($data['prenom']))
        {
            $client->setName($data['prenom']);
        }
        if(!empty($data['nom']))
        {
            $client->setSurname($data['nom']);
        }
        if(!empty($data['codePostal']))
        {
            $client->setPostcode($data['codePostal']);
        }

        if($createClient)
        {
            $entityManager->persist($client);
        }

        $entityManager->flush();     
        
    }

    public function sendPreorderMail($data, $mailer)
    {
        $messageSubject = "Nouvelle précommande client";
        $message = (new \Swift_Message($messageSubject))
        ->setFrom($data['email'])
        ->setTo(getenv('MAIL_DEST'))
        ->setBody(
            $this->renderView(
                'emails/preorder.html.twig',
                array('mail' => $data['email'],'message' => $data['message'],'codePostal'=> $data['codePostal'],'nom'=> $data['nom'],'prenom'=> $data['prenom'], 'telephone' => $data['telephone'])
            ),
            'text/html'
        );

        return($mailer->send($message));
    }
}
