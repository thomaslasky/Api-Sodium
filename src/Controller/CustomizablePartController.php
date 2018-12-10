<?php

namespace App\Controller;

use App\Entity\CustomizablePart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CustomizablePartController extends AbstractController
{
    /**
     * @Route("/custompart/{lang}", methods={"GET"}, name="customizable_part")
     */
    public function getAllCustomParts($lang)
    {
        $customArray=[];
        $i=0;

        $customRepository = $this->getDoctrine()->getRepository(CustomizablePart::class);
        $customParts = $customRepository->findAll();

        foreach ($customParts as $customPart) {
            $customArray[$i] = array("id" => $customPart->getId(),
                                    "label" => $customPart->getLabel(),
                                    "image" => $customPart->getImage());
            switch ($lang)
            {
                case "FR":
                    $customArray[$i] += array("name" => $customPart->getNameFr());
                    break;
                case "EN":
                    $customArray[$i] += array("name" => $customPart->getNameEn());
                    break;
                case "ES":
                    $customArray[$i] += array("name" => $customPart->getNameEs());
                    break;
                default:
                    $customArray[$i] += array("name" => $customPart->getNameEn());

            }
            $options = $customPart->getOptionnalParts();
            $i++;
        }

        return $this->json(array('customParts' => $customArray,'options' => $options ));
    }
}
