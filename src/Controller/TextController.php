<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Text;

class TextController extends AbstractController
{

    /**
     * @Route("/text/{page}", methods={"GET"}, name="text")
     */
    public function getTextByPage($page)
    {
        $textRepository = $this->getDoctrine()->getRepository(Text::class);
        $texts = $textRepository->findBy(['page'=>$page]);

        return $this->json(array('Response' => $texts));
    }
}
