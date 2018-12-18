<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Text;

class TextController extends AbstractController
{

    /**
     * @Route("/text/{language}", methods={"GET"}, name="text")
     */
    public function getTextByLanguage($language)
    {
        $textRepository = $this->getDoctrine()->getRepository(Text::class);
        $texts = $textRepository->findAll();

        $textArray=[];

        foreach ($texts as $text) {
            switch ($language)
            {
                case "FR":
                    $textArray += array($text->getLabel() => $text->getFR());
                    break;
                case "EN":
                    $textArray += array($text->getLabel() => $text->getEN());
                    break;
                case "ES":
                    $textArray += array($text->getLabel() => $text->getES());
                    break;
                default:
                    $textArray += array($text->getLabel() => $text->getEN());

            }
        };

        return $this->json(array('texts' => $textArray));
    }
}
