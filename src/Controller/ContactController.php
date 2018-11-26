<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact", methods={"POST"})
     */
    public function receiveContact(Request $request)
    {


        return $this->json(array('name' => $request->get('name')));
        //return ['test' => [$request->get('name')]];
        // return $this->render('contact/index.html.twig', [
        //     'controller_name' => 'ContactController',
        // ]);
    }
}
