<?php
namespace App\Controller;

// header('Access-Control-Allow-Origin: http://localhost:3000');
// header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");


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
    public function receivePreorder(Request $request)
    {
        $this->saveClientExtendedInfo($request->request->all());

        return $this->json(array('Response' => true));
        
        // return $this->render('preorder/index.html.twig', [
        //     'controller_name' => 'PreorderController',
        // ]);
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
}
