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
        $domain = getenv('DOMAIN_NAME');
        $imgPath = getenv('IMG_PATH');

        $customArray=[];
        $i=0;

        $customRepository = $this->getDoctrine()->getRepository(CustomizablePart::class);
        $customParts = $customRepository->findAll();

        foreach ($customParts as $customPart) {
            $customArray[$i] = array("id" => $customPart->getId(),
                                    "label" => $customPart->getLabel(),
                                    "image" => 'http://'.$domain.'/'.$imgPath.$customPart->getImage());
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

            $optionArray=[];
            $j=0;
            foreach($options as $option){
                $optionArray[$j] =array("id" => $option->getId(),
                                    "label" => $option->getLabel(),
                                    "price" => $option->getPrice(),
                                    "image" => ($option->getImage() ? 'http://'.$domain.'/'.$imgPath.$option->getImage():null),
                                    "imageGlobal" => ($option->getImageGlobal() ? 'http://'.$domain.'/'.$imgPath.$option->getImageGlobal():null));
            
                switch ($lang)
                {
                    case "FR":
                        $optionArray[$j] += array("name" => $option->getNameFr(),"desc" => $option->getDescFr());
                        break;
                    case "EN":
                        $optionArray[$j] += array("name" => $option->getNameEn(),"desc" => $option->getDescEn());
                        break;
                    case "ES":
                        $optionArray[$j] += array("name" => $option->getNameEs(),"desc" => $option->getDescEs());
                        break;
                    default:
                        $optionArray[$j] += array("name" => $option->getNameEn(),"desc" => $option->getDescEn());
    
                }

                $j++;

                
            }

            $customArray[$i] += array("options" => $optionArray);

            $i++;
        }

        return $this->json(array('customParts' => $customArray));
    }
}
