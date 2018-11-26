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
    public function receiveContact(Request $request)
    {
        /* enregistrement du client dans la bdd*/

        $entityManager = $this->getDoctrine()->getManager();
        $client = $entityManager->getRepository(Client::class)->findOneBy(['email' => $request->get('mail')]);
        
        if(!$client)
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
        else
        {
            if(!empty($request->get('telephone')))
            {  
                $client->setPhone($request->get('telephone'));
            }
            $entityManager->flush();
        }
        

        /*envoi mail*/


        return $this->json(array('name' => $request->get('name')));
        
    }
}
